@extends("layouts.admin.admin")

@section("content")
<div class="container">
    <div class="col-md-9">
        <!-- Website Overview -->
        <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Add User</h3>
        </div>
        <div class="panel-body">
            <form action="{{ url("/user") }}" method="POST">
                {{ csrf_field() }}
            <div class="form-group">
                <label>Name:</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" autofocus>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" id="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="password" id="confirm_password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group ">
                    <label>Role:</label>
                        <select name="role" class="form-control">
                            <option value="0">...</option>
            
                            @isset($roles)
                                @foreach($roles as $role)
                                    <option
                                            value="{{ $role->role_id }}"
            
                                            @if(old('role')==$role->role_id)
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