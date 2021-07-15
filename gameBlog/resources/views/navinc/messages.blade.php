@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

<!-- Return success if session succeeded -->
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<!-- Return error if session failed -->
@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif