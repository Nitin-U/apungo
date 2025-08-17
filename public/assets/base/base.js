//handle form requests via ajax
$(document).ready(function() {
    loadEditor();
    loadNormalDatatable();
    reinitializeSelect2();
    initializedFlatPickr();
});

function loadNormalDatatable(){
    let selector =  $('#NormalDataTable');
    if(selector.length > 0){
        dataTable = $(selector).DataTable({
            paging: true,
            searching: true,
            ordering:  true,
            lengthMenu: [[10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]],
        });
    }
}

function loadEditor(){
    let selector =  $('.ck-editor');
    if(selector.length > 0){
        $(selector).each(function () {
            CKEDITOR.replace($(this).prop('id'),{
                allowedContent: true
            });
        });
    }
}

function reinitializeSelect2(){
    let select2 =  $('.select2');
    if(select2.length > 0){
        if(document.getElementById('offcanvasRight')){
            $('.select2').select2({$dropdownParent:'#offcanvasRight'});
        }else{
            $('.select2').select2();
        }
    }
}

function initializedFlatPickr(){
    $('.flatpickr-input').flatpickr({
        dateFormat: "d/m/Y", // Customize the format as needed
        monthSelectorType: "static",
        yearSelectorType: "static",
        minDate: "today",
        onReady: function (selectedDates, dateStr, instance) {
            addClearButton(instance); // Ensure the clear button is added
        },
        onChange: function (selectedDates, dateStr, instance) {
            addClearButton(instance); // Ensure the clear button stays after date change
        }
    });

    $('.start_date_filter').flatpickr({
        dateFormat: "d/m/Y", // Customize the format as needed
        monthSelectorType: "static",
        yearSelectorType: "static",
        onReady: function (selectedDates, dateStr, instance) {
            addClearButton(instance); // Ensure the clear button is added
        },
        onChange: function (selectedDates, dateStr, instance) {
            addClearButton(instance); // Ensure the clear button stays after date change
        }
    });
}

function addClearButton(instance) {
    let clearButton = instance.calendarContainer.querySelector(".flatpickr-clear");
    if (!clearButton) {
        let clearBtn = document.createElement("button");
        clearBtn.className = "flatpickr-clear";
        clearBtn.innerHTML = "Clear";
        clearBtn.type = "button";
        clearBtn.addEventListener("click", function () {
            instance.clear(); // Clears the date field
        });
        instance.calendarContainer.appendChild(clearBtn);
    }
}

$(document).on('submit','form.submit_form', function (e){
   e.preventDefault();
    let form  = $(this);
    let button = $(this).find("[type=submit]");

   button.prop('disabled', true);

   if (typeof CKEDITOR !== "undefined"){
       for (instance in CKEDITOR.instances){
           CKEDITOR.instances[instance].updateElement();
       }
   }

    let selector =  $('.ck-editor');
    if(selector.length > 0){
        $(selector).each(function () {
            var editor_data = CKEDITOR.instances[$(this).prop('id')].getData();
            $('#'+$(this).prop('id')).text(editor_data);
        });
    }

   let route = $(this).attr('action');
   let method = $(this).attr('method');
   let data = new FormData(this);

   $.ajax({
       url:route,
       data:data,
       method:method,
       dataType:"JSON",
       cache:false,
       contentType:false,
       processData: false,
       success: function (url){
           window.location.href = url;
       },
       error: function (error){
           button.prop("disabled", false);
           $('span.text-danger').remove();
           form.find('#all-errors').remove();
           if(error.responseJSON.errors){
               // Build the error list HTML
               let allErrorMessages = $('<div id="all-errors" class="mt-2 w-100 text-danger font-13"><ul class="mb-0"></ul></div>');
               let ul = allErrorMessages.find('ul');

               $.each(error.responseJSON.errors, function (index, error){
                   ul.append('<li>' + error[0] + '</li>');

                   let html = document.createElement('span');
                   html.className = index + ' text-danger font-12';
                   html.innerText = error[0];

                   if (form.find("[name='" + index + "[]']").length) {
                       form.find("[name='" + index + "[]']").after(html);
                   } else if (form.find("[name='" + index.split('.')[0] + "[]']").length) {
                       form.find("[name='" + index.split('.')[0] + "[]']")[index.split('.')[1]].after(html);
                   } else if (form.find("[name='" + index.split('.')[0] + "[" + index.split('.')[1] + "]']").length) {
                       form.find("[name='" + index.split('.')[0] + "[" + index.split('.')[1] + "]']").after(html);
                   } else if (form.find("[name='" + index.split('.')[0] + "[" + index.split('.')[1] + "][]']").length) {
                       form.find("[name='" + index.split('.')[0] + "[" + index.split('.')[1] + "][]']")[index.split('.')[2]].after(html);
                   } else {
                       form.find("[name='" + index + "']:first").after(html);
                   }

                   // Find the first outer div inside the form that wraps the submit button
                   let buttonWrapper = form.find('.hstack').closest('div');
                   if (buttonWrapper.length) {
                       buttonWrapper.before(allErrorMessages);
                   }
               });
           }
       }
   });
});

$(document).on('click','.cs-remove-data', function (e) {
    e.preventDefault();
    var url = $(this).attr('cs-delete-route');
    var id = $(this).attr('data-value');
    $.ajax({
        url: url,
        type: "DELETE",
        cache: false,
        data: {
            "_token": $('meta[name="_token"]').attr('content'),
            "id": id,
        },
        success: function (url){
            window.location.href = url;
        },
        error: function (e){
            console.log(e);
        }
    });
});

