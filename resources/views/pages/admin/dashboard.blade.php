@extends('layouts.admin.admin')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="list-group">
        <a href="{{url("/admin")}}" class="list-group-item active main-color-bg">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
        </a>
        <a href="{{url("/adminUsers")}}" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users </a>
      </div>

      <div class="well">
        <h4>Disk Space Used</h4>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                60%
        </div>
      </div>
      <h4>Bandwidth Used </h4>
      <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
              40%
      </div>
    </div>
      </div>
    </div>
    <div class="col-md-9">
      <!-- Website Overview -->

        <!-- Latest Users -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Latest Users</h3>
          </div>
          <div class="panel-body">
            @if(count($users) > 0)
              <table class="table table-striped table-hover">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Joined</th>
                </tr>
                @foreach ($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                  </tr>
                @endforeach
              </table>
            @else
              <p>No users found</p>
            @endif
          </div>
        </div>
        <nav>
          {{ $users->fragment('posts')->render() }}
      </nav>
  </div>
</div>
@endsection