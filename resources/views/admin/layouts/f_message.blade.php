
@if(Session::has('flash_message'))
    <script>
        swal("{{Session::get('flash_message')}}", {
            buttons: false,
            timer: 3000,
        });
    </script>

@endif