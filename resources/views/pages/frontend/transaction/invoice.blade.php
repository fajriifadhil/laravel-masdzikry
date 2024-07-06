@extends('layouts.frontend')

@section('content')
<div class="h-[85vh] flex items-center justify-center">
    <div>
        <h1 class="font-semibold text-3xl text-center">Menunggu Pembayaran</h1>
        <p id="countdown" class="font-semibold text-3xl text-warning text-center mt-3">01 : 59 : 50</p>

        <hr class="my-7 border-black" />
        <div class="flex items-center justify-between gap-10 md:gap-20 font-medium text-lg">
            <p>Payment Method</p>
            <img src="{{ asset('payment/' . $transaction->nama_metode . '.png') }}" class="h-7 object-cover" alt="{{ $transaction->nama_metode }}" />
        </div>
        @if($transaction->tipe == "bank_transfer" || $transaction->tipe == "permata")
        <div class="flex items-center justify-between gap-10 md:gap-20 font-medium text-lg my-5">
            <p>Kode Bank</p>
            <p>{{ $transaction->kode_bank }}</p>
        </div>
        <div class="flex items-center justify-between gap-10 md:gap-20 font-medium text-lg">
            <p>Virtual Account Number</p>
            <p class="text-primary hover:link underline-offset-4 click-to-copy"><i class="ri-link"></i> <span>{{ $transaction->no_transaksi }}</span></p>
        </div>
        @elseif ($transaction->tipe == "echannel")
        <div class="flex items-center justify-between gap-10 md:gap-20 font-medium text-lg my-5">
            <p>Kode Bank</p>
            <p>{{ $transaction->kode_bank }}</p>
        </div>
        <div class="flex items-center justify-between gap-10 md:gap-20 font-medium text-lg my-5">
            <p>Biller Code</p>
            <p><span>{{ $transaction->kode_biller }}</span></p>
        </div>
        <div class="flex items-center justify-between gap-10 md:gap-20 font-medium text-lg">
            <p>Bill Key</p>
            <p class="text-primary hover:link underline-offset-4 click-to-copy"><i class="ri-link"></i> <span>{{ $transaction->no_transaksi }}</span></p>
        </div>
        @elseif ($transaction->tipe == "qris")
        <div class="flex items-center justify-between gap-10 md:gap-20 font-medium text-lg my-5">
            <p>Kode QR</p>
            {{ $qr_code }}
        </div>
        @else
        <div class="flex items-center justify-between gap-10 md:gap-20 font-medium text-lg my-5">
            <p class="capitalize">Link Pembayaran</p>
            <a href="{{ $transaction->no_transaksi }}" class="text-primary hover:link underline-offset-4 click-to-copy"><i class="ri-external-link-line"></i> <span class="capitalize">Akses Transaksi {{ $transaction->nama_metode }}</span></a>
        </div>
        @endif
        <div class="border border-black p-8 mt-7 flex flex-wrap gap-5 justify-between font-medium text-lg">
            <p>Total Tagihan</p>
            <p>Rp.{{ number_format($transaction->harga, 0, '', '.') }}</p>
        </div>

        <hr class="my-7 border-black" />

        <div class="flex gap-4">
            <a href="{{ route('payment.cancel', ['transaction' => $transaction->id_transaksi]) }}" class="btn btn-error btn-outline flex-grow">Batal</a>
            <a href="{{ url()->current() }}" class="btn btn-outline btn-primary flex-grow">Cek Status Transaksi</a>
        </div>
    </div>
</div>

<script>
    $('.click-to-copy').click(function() {
        navigator.clipboard.writeText('<?= $transaction->no_transaksi ?>');
        alert('Copied to clipboard');
    })

    const targetDate = new Date("<?= $transaction->tanggal_kadaluarsa ?>");

    // Update the countdown display every second
    const updateCountdown = function() {
        const now = new Date();
        const remainingTime = targetDate - now;

        const hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

        // Format the display string
        const countdownString = `${hours.toString().padStart(2, '0')} : ${minutes.toString().padStart(2, '0')} : ${seconds.toString().padStart(2, '0')}`;

        // Update the HTML element with the countdown string
        document.getElementById('countdown').textContent = countdownString;

        // Check if countdown has reached zero
        if (remainingTime <= 0) {
            clearInterval(intervalId);
            document.getElementById('countdown').textContent = "Transaction Expired!";
        }
    }

    // Start the countdown update loop
    const intervalId = setInterval(updateCountdown, 1000);

    // Initial update
    updateCountdown();
</script>
@endsection