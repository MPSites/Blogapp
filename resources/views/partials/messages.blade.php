@if(count($errors) > 0)
    <ul class="alert alert-danger msg">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

@if(session('success'))
    <div class="alert alert-success msg">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger msg">
        {{session('error')}}
    </div>
@endif