<nav class="sticky top-0 bg-white shadow-sm z-20">
    <div class="container-fit flex gap-5 justify-between items-center py-5">
        <a href="{{ route('home') }}">
            <img src="{{ asset('full-logo.png') }}" alt="logo" class="h-5 md:h-8 object-cover" />
        </a>
        <div class="flex gap-3 md:gap-7 items-center font-medium">
            <div class="hidden md:flex gap-7 items-center">
                <a href="{{ url('/') . '#about-us' }}">Tentang Kami</a>
                <a href="{{ url('/') . '#services' }}">Layanan</a>
                <a href="{{ url('/') . '#faq' }}">FAQ</a>
                <a href="{{ url('/') . '#contact' }}">Contact</a>
            </div>
            @auth
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="flex gap-2 items-center">
                    @if(auth()->user()->foto)
                    <img src="{{ auth()->user()->foto }}" alt="user photo" class="w-8 h-8 object-cover rounded-full" />
                    @else
                    <div class="w-8 h-8 rounded-full grid place-content-center bg-gray-300 overflow-hidden">
                        <i class="ri-user-fill"></i>
                    </div>
                    @endif
                    <p class="hidden sm:block">Hi, {{ auth()->user()->nama_lengkap }}</p>
                    <i class="ri-arrow-down-s-linehidden sm:block"></i>
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 mt-2 rounded w-52">
                    <li><a href="{{ route('profile') }}"><i class="ri-user-fill"></i> <span>Profil</span></a></li>
                    <li><button type="button" onclick="logout.showModal()" class="text-error"><i class="ri-logout-box-r-line"></i> <span>Keluar</span></button></li>
                </ul>
            </div>
            @else
            <div class="flex gap-3 md:gap-5 items-center">
                <a href="{{ route('registration-page') }}" class="btn btn-sm btn-primary btn-outline">Register</a>
                <a href="{{ route('login-page') }}" class="btn btn-sm btn-primary">Login</a>
            </div>
            @endauth
            <div class="dropdown dropdown-end md:hidden">
                <div tabindex="0" role="button" class="btn btn-square btn-outline btn-primary btn-sm">
                    <i class="ri-menu-line"></i>
                </div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 mt-2 rounded w-52">
                    <li><a href="{{ url('/') . '#about-us' }}">Tentang Kami</a></li>
                    <li><a href="{{ url('/') . '#services' }}">Layanan</a></li>
                    <li><a href="{{ url('/') . '#faq' }}">FAQ</a></li>
                    <li><a href="{{ url('/') . '#contact' }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<x-modal.logout />
