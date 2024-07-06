@extends('layouts.single')

@section('content')
<div class="shadow-lg p-8 rounded-lg">
    <img src="{{ asset('full-logo.png') }}" alt="logo" class="h-8 object-cover mb-8" />

    <div for="photo" class="border-4 border-blue-500 rounded-full overflow-hidden w-32 h-32 flex items-center justify-center mx-auto">
        <i class="ri-check-fill text-8xl text-blue-500"></i>
    </div>
    <div class="text-center mt-8">
        <p class="text-gray-400 mb-5">Selamat! Akun anda telah berhasil dibuat...!</p>

        <div class="text-center">
            <a href="{{ route('login-page') }}" class="btn btn-primary btn-rounded-full"><span>LOGIN</span> <i class="ri-arrow-right-line"></i></a>
        </div>
    </div>
</div>
@endsection
