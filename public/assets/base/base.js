//handle form requests via ajax
$(document).ready(function() {
    reinitializeSelect2();
    loadEditor();
    loadNormalDatatable();
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
           if(error.responseJSON.errors){
               $.each(error.responseJSON.errors, function (index, error){

                   let html = document.createElement('span');
                   html.className = index + ' text-danger';
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
               })
           }
       }
   })
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

