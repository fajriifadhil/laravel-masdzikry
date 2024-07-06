@extends('layouts.single')

@section('content')
<form action="{{ route('login') }}" method="POST" class="shadow-lg p-8 rounded-lg">
    @csrf
    @method('POST')

    <img src="{{ asset('full-logo.png') }}" alt="logo" class="h-8 object-cover" />

    <p class="text-sm text-gray-500 mt-6">Selamat Datang!</p>
    <h1 class="h-section mb-6">Login</h1>

    <div class="flex flex-col gap-1">
        <label for="email" class="text-sm font-medium">Email</label>
        <input type="email" name="email" id="email" placeholder="Masukan Email" class="input input-bordered {{ isset($error_email) ?? 'input-error' }} sm:min-w-[30rem]" value="{{ isset($email) ? $email : '' }}" />
    </div>
    @if(isset($error_email))
    <p class="mt-2 text-error text-sm">{{ $error_email }}</p>
    @endif

    <div class="flex flex-col gap-1 mt-4">
        <label for="password" class="text-sm font-medium">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukan Password" class="input input-bordered {{ isset($error_password) ?? 'input-error' }} sm:min-w-[30rem]" value="{{ isset($password) ? $password : '' }}" />
    </div>
    <div class="flex flex-wrap gap-3">
        @if(isset($error_password))
        <p class="mt-2 text-error text-sm">{{ $error_password }}</p>
        @endif
        <a href="{{ route('forgot-password-page') }}" class="text-gray-400 text-sm block w-fit ml-auto mt-2">Forgot Password</a>
    </div>

    <div class="text-center my-5">
        <button type="submit" class="btn btn-primary btn-rounded-full"><span>LOGIN</span> <i class="ri-arrow-right-line"></i></button>
    </div>

    <p class="text-gray-400 text-sm text-center">Belum memiliki Akun? <a href="{{ route('registration-page') }}" class="text-blue-500 hover:link">Register</a></p>
</form>
@endsection
