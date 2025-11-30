<script>
    @if(Session::has('success'))
            Toastify({
                newWindow: !0,
                text: "{{ session('success') }}",
                gravity: 'top',
                position: 'right',
                stopOnFocus: !0,
                duration: 5000,
                close: "close",
                className: "bg-success mt-5" }).showToast();
    @endif
    @if(Session::has('error'))
        Toastify({
            newWindow: !0,
            text: "{{ session('error') }}",
            gravity: 'top',
            position: 'right',
            stopOnFocus: !0,
            duration: 5000,
            close: "close",
            className: "bg-danger mt-5" }).showToast();
    @endif
</script>
