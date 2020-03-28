@include('partials.admin.head')
@include('partials.admin.nav')
@include('partials.admin.header')

    <section id="main">
      @include('partials.messages')
      @yield('content')
    </section>
    
@include('partials.admin.footer')

