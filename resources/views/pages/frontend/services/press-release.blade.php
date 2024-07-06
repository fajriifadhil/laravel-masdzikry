@extends('layouts.frontend')

@section('content')

<section class="container-fit section-md">
    <h1 class="h-section mb-10">Jasa Press Release</h1>

    <div class="flex flex-col gap-4 leading-8">
        <p class="p-section">Kami menyediakan jasa press release termurah se-Indonesia untuk mempromosikan bisnis atau produk Anda ke Masyarakat luas. Walaupun murah, kami memiliki kinerja professional dengan tersedia berbagai media besar Indonesia dalam skala nasional.</p>

        <p class="p-section">Perlu diketahui, press release ialah kegiatan mempublikasi suatu informasi atau berita singkat yang diterbitkan oleh banyak media massa. Umumnya, berisi aktivitas dan informasi detail sesuai kebutuhan perusahaan.</p>

        <p class="p-section">Layanan publikasi press release kami melibatkan jurnalistik professional yang siap menerbitkan informasi dengan kualitas terbaik. Kami siap menjadi rekan bisnis terbaik Anda dengan pengalaman yang cukup dalam memperkenalkan sesuatu ke masyarakat luas.</p>
    </div>
</section>

<section class="container-fit section-md">
    <h1 class="h-section mb-10">Layanan Press Release untuk Berbagai Kebutuhan Anda</h1>

    <ul class="list-inside list-disc p-section">
        <li>Personal dan community branding.</li>
        <li>Opini publik dan klarifikasi.</li>
        <li>Liputan acara dan berbagai agenda penting.</li>
        <li>Syarat verifikasi untuk Shopee Mall.</li>
        <li>Promosi produk atau perusahaan.</li>
        <li>Syarat untuk pengajuan verified akun Instagram.</li>
        <li>Dan masih banyak lagi.</li>
    </ul>
</section>

<section class="container-fit section-md">
    <h1 class="h-section mb-10">Keunggulan Layanan Press Release Kami</h1>

    <ul class="list-inside list-disc p-section">
        <li>Kami bekerjasama secara resmi dengan berbagai Media Nasional Indonesia.</li>
        <li>Kepuasan pelanggan menjadi prioritas kami dalam memberikan pelayanan dengan cepat dan berkualitas.</li>
        <li>Dari segi harga, kami memiliki harga yang sangat terjangkau dibanding tempat yang lain.</li>
        <li>Garansi 100% uang kembali ketika gagal terbit di media pilihan Anda.</li>
        <li>Jika topik yang Anda berikan tidak melanggar ketentuan UU, kami garansi terbit.</li>
    </ul>
</section>

<section class="container-fit section-md">
    <h1 class="h-section text-center mb-10">Harga Jasa Press Release</h1>

    <div class="grid grid-flow-row sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 1</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 900.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>1 Media Online</li>
                <li>Bebas Pilih Media</li>
                <li>Include Artikel</li>
                <li>Report Hasil</li>
                <li>4 - 7 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 1]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>

        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 2</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 4.400.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>5 Media Online</li>
                <li>Bebas Pilih Media</li>
                <li>Include Artikel</li>
                <li>Report Hasil</li>
                <li>7 - 10 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 2]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>

        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 3</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 8.800.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>10 Media Online</li>
                <li>Bebas Pilih Media</li>
                <li>Include Artikel</li>
                <li>Report Hasil</li>
                <li>10 - 15 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 3]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>

        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 4</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 13.200.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>15 Media Online</li>
                <li>Bebas Pilih Media</li>
                <li>Include Artikel</li>
                <li>Report Hasil</li>
                <li>13 - 15 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 4]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>

        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 5</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 17.000.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>20 Media Online</li>
                <li>Bebas Pilih Media</li>
                <li>Include Artikel</li>
                <li>Report Hasil</li>
                <li>15 - 20 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 5]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>

        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 6</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 20.500.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>25 Media Online</li>
                <li>Bebas Pilih Media</li>
                <li>Include Artikel</li>
                <li>Report Hasil</li>
                <li>20 - 25 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 6]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>
    </div>
</section>

@endsection