@include('header')
<div class="flex justify-start bg-slate-100">
    @include('sidebar')
    <div class="p-4 py-6 md:p-8 md:py-10 w-full">
        @yield('content')
    </div>
</div>

@include('no-footer')