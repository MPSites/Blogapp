<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{url("/admin")}}">Dashboard</a></li>
        <li><a href="{{url("/adminUsers")}}">Users</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Welcome, {{Auth::user()->name}}</a></li>
        <li><a href="{{url("/dashboard")}}">Go back</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>