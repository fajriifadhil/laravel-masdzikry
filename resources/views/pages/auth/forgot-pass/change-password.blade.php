@extends('layouts.single')

@section('content')
<form action="{{ route('forgot-password.change-password') }}" method="POST" class="shadow-lg p-8 rounded-lg">
    @csrf
    @method('PUT')

    <img src="{{ asset('full-logo.png') }}" alt="logo" class="h-8 object-cover" />

    <h1 class="h-section my-6">Forgot Password</h1>

    <p class="font-medium text-sm text-gray-400 mb-4 max-w-96">Silahkan buat Password Baru</p>

    <input type="hidden" name="verify-page" value="{{ $verify_page }}" />

    <div class="flex flex-col gap-1">
        <label for="password" class="font-medium text-sm">Password Baru</label>
        <input type="password" name="password" id="password" placeholder="Masukan Password" class="input input-bordered {{ $error_password ? 'input-error' : '' }} sm:min-w-96" />
    </div>
    @if ($error_password)
    <p class="text-error mt-2 text-sm">{{ $error_password }}</p>
    @endif

    <div class="flex flex-col gap-1 mt-4">
        <label for="confirmation" class="font-medium text-sm">Konfirmasi Password Baru</label>
        <input type="password" name="confirmation" id="confirmation" placeholder="Konfirmasi Password" class="input input-bordered {{ $error_password ? 'input-error' : '' }} sm:min-w-96" />
    </div>
    @if ($error_password)
    <p class="text-error mt-2 text-sm">{{ $error_password }}</p>
    @endif

    <div class="text-center mt-5">
        <button type="submit" class="btn btn-primary btn-rounded-full"><span>NEXT</span> <i class="ri-arrow-right-line"></i></button>
    </div>

</form>
@endsection
