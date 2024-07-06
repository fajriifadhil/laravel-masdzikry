@extends('layouts.single')

@section('content')
<form action="{{ route('forgot-password.send-otp') }}" method="POST" class="shadow-lg p-8 rounded-lg">
    @csrf
    @method('POST')

    <img src="{{ asset('full-logo.png') }}" alt="logo" class="h-8 object-cover" />

    <h1 class="h-section my-6">Forgot Password</h1>

    <p class="font-medium text-sm text-gray-400 mb-4 max-w-96">Kami akan mengirimkan OTP untuk mengatur ulang Password Anda</p>

    <div class="flex flex-col gap-1">
        <label for="email" class="font-medium text-sm">Email</label>
        <input type="email" name="email" id="email" placeholder="Masukan Email" class="input input-bordered {{ isset($error_email) ? 'input-error' : '' }} sm:min-w-96" value="{{ isset($email) ? $email : '' }}" />
    </div>
    @if(isset($error_email))
    <p class="mt-2 text-error text-sm max-w-96">{{ $error_email }}</p>
    @endif
    <div class="text-center mt-6">
        <button type="submit" class="btn btn-primary btn-rounded-full"><span>SEND</span> <i class="ri-arrow-right-line"></i></button>
    </div>

</form>
@endsection
