@extends('layouts.frontend')

@section('content')
<div class="h-[85vh] flex items-center justify-center">
    <div class="border-2 rounded-xl {{ $transaction->status == 'BERHASIL' ? 'border-primary' : 'border-error' }} shadow-lg p-5 sm:p-10 md:px-20 md:py-10">
        <h1 class="font-semibold text-3xl {{ $transaction->status == 'BERHASIL' ? 'text-primary' : 'text-error' }} text-center">Pembayaran {{ $transaction->status == 'BERHASIL' ? 'Berhasil' : 'Gagal / Kadaluarsa' }}</h1>

        <div class="grid grid-flow-row md:grid-cols-2 gap-y-5 gap-x-10 md:gap-x-28 my-5 md:my-10">
            <div class="font-semibold text-lg">
                <p>Metode Pembayaran</p>
                <p class="text-gray-400">{{ $transaction->nama_metode }}</p>
            </div>
            <div class="font-semibold text-lg">
                <p>Layanan</p>
                <p class="text-gray-400">{{ $transaction->layanan }}</p>
            </div>
            <div class="font-semibold text-lg">
                <p>Total Pembayaran</p>
                <p class="text-gray-400">Rp.{{ number_format($transaction->harga, 0, '', '.') }}</p>
            </div>
            <div class="font-semibold text-lg">
                <p>ID Transaksi</p>
                <p class="text-gray-400">{{ $transaction->id_transaksi }}</p>
            </div>
        </div>

        <a href="{{ route('home') }}" class="btn btn-primary btn-block">Kembali ke Beranda</a>
    </div>
</div>
@endsection