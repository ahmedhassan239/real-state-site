
@if(Session::has('flash_message'))
    <br>
    <div class="container">
        <div class="alert alert-success" id="mes">
            {{Session::get('flash_message')}}
        </div>
    </div>

@endif