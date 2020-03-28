@extends("layouts.admin.admin")

@section("content")
<div class="container">
    <div class="col-md-9 auto-mar">
        <!-- Website Overview -->
        <div class="panel panel-default ">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Edit User</h3>
        </div>
        <div class="panel-body auto-mar">
            <form action="{{ url("/user/{$user->id}") }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}" autofocus>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" id="password" class="form-control" name="password" value="{{ $user->password }}">
            </div>
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="password" id="confirm_password" class="form-control" name="password_confirmation" value="{{ $user->password }}">
            </div>
            <div class="form-group ">
                    <label>Role:</label>
                        <select name="role" class="form-control">
                            <option value="0">...</option>
            
                            @isset($roles)
                                @foreach($roles as $role)
                                    <option
                                            value="{{ $role->role_id }}"
            
                                            @if(old('role')==$user->role_id)
                                            selected="selected"
                                            @endif
            
                                    >
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            @endisset
            
                        </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnUser" class="btn btn-default" value="Submit">
                </div>
            </form>
        </div>
        </div>

    </div>
</div>
@endsection