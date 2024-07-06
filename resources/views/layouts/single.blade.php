@include('header')
@auth
@include('navbar')
@endauth
<div class="h-screen flex items-center justify-center">
    @yield('content')
</div>

@include('no-footer')