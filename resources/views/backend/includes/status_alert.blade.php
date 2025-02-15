<script>
    $(document).on('click','.change-status', function (e) {
        e.preventDefault();
        var status  = $(this).attr('value');
        var id      = $(this).attr('id');
        var url     = $(this).attr('cs-update-route');
        if(status == '0'){
            Swal.fire({
                html: '<div class="mt-2">' +
                    '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                    ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                    'style="width:120px;height:120px"></lord-icon>' +
                    '<div class="mt-4 pt-2 fs-15">' +
                    '<h4>Are your sure? </h4>' +
                    '<p class="text-muted mx-4 mb-0">' +
                    'Inactive data cannot be used anywhere else unless status is active</p>' +
                    '</div>' +
                    '</div>',
                showCancelButton: !0,
                confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                cancelButtonClass: "btn btn-danger w-xs mt-2",
                confirmButtonText: "Yes!",
                buttonsStyling: !1,
                showCloseButton: !0
            }).then(function(t)
            {
                t.value
                    ?
                    statusupdate(url,status,id)
                    :
                    t.dismiss === Swal.DismissReason.cancel &&
                    Swal.fire({
                        title: "Cancelled",
                        text: "Status was not changed.",
                        icon: "error",
                        confirmButtonClass: "btn btn-primary mt-2",
                        buttonsStyling: !1
                    });
            });

        }else{
            statusupdate(url,status,id);
        }

    });

    function statusupdate(url,status,id){
        $.ajax({
            url:   url,
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "status": status
            },
            success: function(response){
                var oldstatus         = (response.status == 0) ? "Active" : "Inactive";
                var newstatus               = (response.status == 0) ? "Inactive" : "Active";
                var status_url        = '{{route($base_route.'status-update')}}';
                var replacementblock  = '#status-button-'+response.id;
                var replacement = '<button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"> '
                    +
                    newstatus
                    +
                    '</button><ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">' +
                    '<li>' +
                    '<a class="dropdown-item change-status" cs-update-route="'+status_url+'" href="#" value="'+(response.status == 0 ? 1:0)+'" id="'+response.id+'">'+oldstatus+'</a>' +
                    '</li></ul>';

                Swal.fire({
                    html: '<div class="mt-2">' +
                        '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json"' +
                        'trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px">' +
                        '</lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Success !</h4>' +
                        '<p class="text-muted mx-4 mb-0">' +
                        'Status has been updated .</p>' +
                        '</div>' +
                        '</div>',
                    timerProgressBar: !0,
                    timer: 2e3,
                    showConfirmButton: !1
                });
                $(replacementblock).html('');
                $(replacementblock).html(replacement);
            },
            error: function() {
                Swal.fire({
                    html: '<div class="mt-2">' +
                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                        ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                        'style="width:120px;height:120px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Warning...! </h4>' +
                        '<p class="text-muted mx-4 mb-0">' +
                        'Could not confirm the status. Something went wrong</p>' +
                        '</div>' +
                        '</div>',
                    timerProgressBar: !0,
                    timer: 3000,
                    showConfirmButton: !1
                });
            }
        });
    }
</script>
