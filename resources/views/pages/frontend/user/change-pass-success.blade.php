@extends('layouts.single')

@section('content')
<div>
    <div class="p-10 rounded-xl bg-slate-100 w-full md:w-72 mx-auto">
        <div for="photo" class="bg-blue-500 rounded-full overflow-hidden w-32 h-32 flex items-center justify-center mx-auto">
            <i class="ri-check-fill text-8xl text-white"></i>
        </div>
    </div>
    <div class="text-center mt-8">
        <h1 class="font-bold text-xl">Password Berhasil Diubah</h1>

        <p class="text-gray-400 mt-3">Gunakan Kata Sandi yang baru untuk Masuk ke Mas Dzikry.
        </p>
        <p class="text-gray-400 mb-5">Jangan Bagikan Kata Sandi ke siapapun ya!</p>

        <a href="{{ route('login-page') }}" class="btn btn-block btn-primary">Masuk</a>
    </div>
</div>
@endsection