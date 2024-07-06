@extends('layouts.single')

@section('content')
<form action="{{ route('register') }}" method="POST" class="shadow-lg p-8 rounded-lg">
    @csrf
    @method('POST')

    <img src="{{ asset('full-logo.png') }}" alt="logo" class="h-8 object-cover" />

    <h1 class="h-section my-6">Register</h1>

    <div class="flex flex-col gap-1">
        <label class="text-sm font-medium" for="fullname">Nama</label>
        <input type="text" name="fullname" id="fullname" placeholder="Masukan Nama" class="input input-bordered sm:min-w-96 input-registration" required />
        <p id="empty-fullname" class="hidden text-error text-sm mt-1">Nama harus diisi</p>
    </div>

    <div class="flex flex-col gap-1 my-4">
        <label class="text-sm font-medium" for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Masukan Email" class="input input-bordered sm:min-w-96 input-registration" required />
        <p id="empty-email" class="hidden text-error text-sm mt-1">Email harus diisi</p>
    </div>

    <div class="flex flex-col gap-1">
        <label class="text-sm font-medium" for="phone-number">No. Handphone</label>
        <input type="number" name="phone-number" id="phone-number" placeholder="Masukan No. Handphone" class="input input-bordered sm:min-w-96 input-registration" required />
        <p id="empty-phone-number" class="hidden text-error text-sm mt-1">No. Handphone harus diisi</p>
    </div>

    <div class="flex flex-col gap-1 mt-4">
        <label class="text-sm font-medium" for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukan Password" class="input input-bordered sm:min-w-96 input-registration" required />
        <p id="empty-password" class="hidden text-error text-sm mt-1">Password harus diisi</p>
        <p id="error-password" class="hidden text-error text-sm mt-1">Password minimal 6 karakter</p>
    </div>

    <div class="text-center my-5">
        <button id="submit-btn" type="submit" class="btn btn-primary btn-rounded-full" disabled><span>REGISTER</span> <i class="ri-arrow-right-line"></i></button>
    </div>

    <p class="text-gray-400 text-sm text-center">Sudah memiliki Akun? <a href="{{ route('login-page') }}" class="text-blue-500 hover:link">Login</a></p>
</form>

<script src="{{ asset('js/validateRegistration.js') }}"></script>

@if(session('error-account'))
<div class="alert border-b-4 fixed capitalize font-medium bottom-0 left-1/2 -translate-x-1/2 mb-10 w-fit animate-fade-in z-20">
    {{ session('error-account') }}
    <button type="button" class="close-alert btn btn-ghost btn-square btn-sm">
        <i class="ri-close-line"></i>
    </button>
</div>
@endif
@endsection
