@extends('layouts.frontend')

@section('content')
<div class="container-fit py-5 mt-5 lg:bg-primary rounded-lg">
    <h1 class="font-bold text-3xl bg-primary p-5 lg:p-0 rounded-lg lg:bg-none text-white">Selesaikan Pembayaran</h1>
</div>

<form action="{{ route('payment.create-transaction') }}" method="POST" class="container max-w-6xl mx-auto px-5 lg:px-0 py-8 md:py-16 flex gap-8 md:gap-20 flex-wrap">
    @csrf
    @method('POST')

    <input type="hidden" name="package-id" value="{{ $package->id }}" />
    <!-- {{$package->id}} -->
    <div class="flex-grow">
        <h2 class="font-medium text-3xl">Ringkasan Jasa Paket {{ $package->layanan }}</h2>

        <div class="my-8 rounded-xl border border-blue-500 bg-blue-200 p-6 flex justify-between gap-5 sm:gap-10 md:gap-20 font-semibold text-2xl">
            <h3>Paket {{ $package->no_paket }}</h3>

            <p>Rp.{{ number_format($package->harga, 0, '', '.') }}</p>
        </div>

        <p class="font-semibold mb-2 text-lg"><i class="ri-chat-check-fill"></i> <span>Solusi satu untuk semua</span></p>
        <ul>
            @foreach ($contents as $content)
            <li><i class="ri-check-line text-success"></i> <span>{{ $content['nama'] }}</span></li>
            @endforeach
        </ul>
    </div>

    <div class="border shadow-md rounded-lg p-6">
        <h2 class="font-semibold">Metode Pembayaran</h2>

        <button type="button" id="choose-payment-btn" onclick="payment_modal.showModal()" class="mt-1.5 text-left btn btn-outline btn-block">
            Pilih Metode Pembayaran
        </button>
        <hr class="border-black my-4" />
        <div class="text-sm flex gap-5 justify-between">
            <p>Harga Paket {{ $package->no_paket }}</p>
            <p class="font-medium">Rp.{{ number_format($package->harga, 0, '', '.') }}</p>
        </div>
        <hr class="border-black my-4" />
        <div class="text-lg flex gap-5 justify-between">
            <p class="font-semibold">Total</p>
            <p class="font-bold text-success">Rp.{{ number_format($package->harga, 0, '', '.') }}</p>
        </div>

        <button type="submit" class="btn btn-primary btn-block my-4">Buat Tagihan Pembayaran</button>

        <p class="text-justify text-sm md:max-w-80">
            Dengan melakukan tagihan pembayaran, Anda setuju dengan <a href="" class="text-blue-500 font-medium hover:link">Ketentuan Penggunaan</a> kami dan mengonfirmasi bahwa Anda telah membaca Kebijakan Privasi kami.
        </p>

    </div>
    <x-modal.choose-payment-type />
</form>

@endsection