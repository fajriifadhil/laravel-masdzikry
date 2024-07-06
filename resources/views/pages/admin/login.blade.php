@extends('layouts.single')

@section('content')
<form action="{{ route('admin-login') }}" method="POST" class="shadow-lg p-8 rounded-lg">
    @csrf
    @method('POST')

    <img src="{{ asset('full-logo.png') }}" alt="logo" class="h-8 object-cover" />

    <p class="text-gray-400 text-sm mb-6 mt-3">Silakan masukkan informasi pengguna Anda.</p>

    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Masukan Email" class="sm:min-w-80" value="{{ isset($email) ? $email : '' }}" />
    </div>
    @if(isset($error_email))
    <p class="mt-2 text-error text-sm">{{ $error_email }}</p>
    @endif

    <div class="input-group mt-4">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukan Password" class="sm:min-w-80" value="{{ isset($password) ? $password : '' }}" />
    </div>
    @if(isset($error_password))
    <p class="mt-2 text-error text-sm">{{ $error_password }}</p>
    @endif

    <button type="submit" class="btn btn-primary mt-5 btn-block">Masuk</button>

</form>
@endsection
