$( ".remove_trash" ).on("submit", function(e) {
    e.preventDefault();
    Swal.fire({
        html: '<div class="mt-2">' +
            '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
            ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
            'style="width:120px;height:120px"></lord-icon>' +
            '<div class="mt-4 pt-2 fs-15">' +
            '<h4>Are your sure? </h4>' +
            '<p class="text-muted mx-4 mb-0">' +
            'This data will be removed permanently and cannot be recovered</p>' +
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
            $(".remove_trash")[0].submit()
            :
            t.dismiss === Swal.DismissReason.cancel &&
            Swal.fire({
                title: "Cancelled",
                text: "User status was not changed.",
                icon: "error",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
    });


});

dataTable = $('#trashDataTable').DataTable({
    paging: true,
    searching: true,
    ordering:  true,
    lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
});
