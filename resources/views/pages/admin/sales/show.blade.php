@extends('layouts.admin')

@section('content')
<h1 class="h-section mb-14">Penjualan</h1>

<div class="bg-white rounded-lg border">
    <div class="p-6">
        <a href="{{ route('sales.index') }}" class="font-semibold text-2xl">
            <i class="ri-arrow-left-line"></i>
            <span>Detail Penjualan</span>
        </a>
    </div>

    <hr />

    <div class="p-8">
        <div class="grid grid-flow-row md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
                <p class="text-sm font-medium">Status</p>
                @if ($transaction->status == 'BERHASIL')
                <p class="badge bg-green-200 text-success font-medium badge-lg mt-1">Dibayar</p>
                @elseif ($transaction->status == 'GAGAL')
                <p class="badge bg-red-200 text-error font-medium badge-lg mt-1">Gagal / Dibatalkan</p>
                @elseif ($transaction->status == 'KADALUARSA')
                <p class="badge bg-red-200 text-error font-medium badge-lg mt-1">Kadaluarsa</p>
                @else
                <p class="badge bg-orange-200 text-orange-500 font-medium badge-lg mt-1">Menunggu Pembayaran</p>
                @endif
            </div>
            <div class="input-group">
                <label>Layanan</label>
                <input type="text" value="{{ $transaction->layanan }}" disabled />
            </div>
            <div class="input-group">
                <label>Dibayar Pada</label>
                <input type="text" value="{{ $transaction->dibayar_pada ? $transaction->dibayar_pada : '-' }}" disabled />
            </div>
            <div class="input-group">
                <label>Nama Lengkap</label>
                <input type="text" value="{{ $transaction->nama_pelanggan }}" disabled />
            </div>
            <div class="input-group">
                <label>Paket</label>
                <input type="text" value="Paket {{ $transaction->no_paket }}" disabled />
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" value="{{ $transaction->email_pelanggan }}" disabled />
            </div>
            <div class="input-group">
                <label>No. Handphone</label>
                <input type="text" value="{{ $transaction->nomor_pelanggan }}" disabled />
            </div>
            <div class="input-group">
                <label>Tipe Pembayaran</label>
                <input type="text" value="{{ $transaction->nama_metode }}" disabled />
            </div>
            <div class="input-group">
                <label>Jumlah</label>
                <input type="text" value="Rp {{ number_format($transaction->harga, 2, ',', '.') }}" disabled />
            </div>
        </div>
    </div>
</div>
@endsection