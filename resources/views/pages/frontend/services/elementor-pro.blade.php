@extends('layouts.frontend')

@section('content')
<section class="container-fit section-md">
    <h1 class="h-section mb-10">Jasa Install Plugin Elementor Pro Terbaru, Murah dan Resmi</h1>

    <div>
        <p class="p-section">Kini saya membuka jasa install plugin elementor pro resmi dan terbaru dengan harga terjangkau mulai dari 200 ribuan untuk satu domain wordpress. Walaupun murah, plugin elementor pro yang saya tawarkan sepenuhnya resmi dan aman untuk digunakan di wordpress online Anda.</p>

        <p class="p-section my-6">Penggunaan jasa install elementor pro ini bisa Anda terapkan di berbagai situs wordpress Anda dengan aman dengan versi terbaru, auto update dan bisa digunakan tanpa batas waktu tertentu (lifetime).</p>

        <p class="p-section">Perlu Anda ketahui, elementor pro adalah plugin khusus wordpress yang berfungsi sebagai builder atau alat untuk membuat design web sesuai selera. Dalam penggunaannya, plugin ini tidak perlu coding dan bisa dibilang hanya perlu drag and drop.</p>
    </div>
</section>

<section class="container-fit section-md">
    <h1 class="h-section text-center mb-10">Harga Jasa Install Plugin Elementor Pro</h1>

    <div class="grid grid-flow-row sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 1</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 150.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>1 Web WordPress</li>
                <li>Report Hasil</li>
                <li>1 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 28]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>

        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 2</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 600.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>5 Web WordPress</li>
                <li>Report Hasil</li>
                <li>2 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 29]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>

        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 3</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 1.000.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>10 Web WordPress</li>
                <li>Report Hasil</li>
                <li>3 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 30]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>
    </div>
</section>
@endsection