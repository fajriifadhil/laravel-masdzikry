@extends('layouts.admin')

@section('content')
<h1 class="h-section mb-14">Pelanggan</h1>

<div class="bg-white rounded-lg border">
    <div class="p-6">
        <a href="{{ route('users.index') }}" class="font-semibold text-2xl">
            <i class="ri-arrow-left-line"></i>
            <span>Edit Pelanggan</span>
        </a>
    </div>

    <hr />

    <div class="p-8">
        <div class="grid grid-flow-row md:grid-cols-2 gap-5">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukan Email" value="{{ $user['email'] }}" disabled />
            </div>
            <div class="input-group">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" name="fullname" id="fullname" placeholder="Masukan Email" value="{{ $user['nama_lengkap'] }}" disabled />
            </div>
            <div class="input-group">
                <label for="phone-number">No. Handphone</label>
                <input type="text" name="phone-number" id="phone-number" placeholder="Masukan No. Handphone" value="{{ $user['no_telepon'] }}" disabled />
            </div>
        </div>
    </div>
</div>
@endsection