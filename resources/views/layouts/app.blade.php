@include('partials.head')
<div id="app">
    @include('partials.nav')
    <div class="container">
        @include('partials.messages')
        @yield('content')
    </div>
</div>
@include('partials.footer')

