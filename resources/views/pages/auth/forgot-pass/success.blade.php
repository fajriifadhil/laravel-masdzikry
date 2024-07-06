@extends('layouts.single')

@section('content')
<form action="{{ route('forgot-password.send-otp') }}" method="POST" class="shadow-lg p-8 rounded-lg">
    @csrf
    @method('POST')

    <img src="{{ asset('full-logo.png') }}" alt="logo" class="h-8 object-cover" />

    <h1 class="h-section my-6">Forgot Password</h1>

    <p class="font-medium text-sm text-gray-400 mb-6 max-w-96">Password telah diubah. sekarang Anda dapat login dengan password baru Anda</p>


    <div class="text-center mt-6">
        <a href="{{ route('login') }}" class="btn btn-primary btn-rounded-full"><span>LOGIN</span> <i class="ri-arrow-right-line"></i></a>
    </div>

</form>
@endsection
