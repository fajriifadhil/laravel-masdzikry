@extends('layouts.frontend')

@section('content')
<section class="container-fit section-md">
    <h1 class="h-section mb-10">Jasa Content Placement Website, Murah dan Berkualitas</h1>

    <div>
        <p class="p-section">
            Kini, kami menyediakan jasa content placement murah di situs ber-authority tinggi yang mampu meningkatkan kualitas website Anda dari segi SEO (off-page). Meskipun memiliki harga murah, kami menyediakan media placement berkualitas yang turut memperhatikan kinerja dan kualitas situs yang tersedia.
        </p>
        <p class="p-section my-6">
            Pemilihan jasa backlink atau content placement yang tepat mampu membuat rank website Anda dapat perlahan naik dengan aman dan optimal. Jasa placement hadir untuk Anda dalam mendongkrak ranking pada keyword tertentu yang memiliki tingkat persaingan tinggi.
        </p>
        <p class="p-section">Berbicara mengenai SEO, melakukan content placement di situs sembarang dapat membawa dampak negatif di situs yang Anda kelola. Sehingga, Anda perlu teliti dalam menaruh backlink di berbagai situs di internet. Maka dari itu, jika dirasa bingung mengenai hal ini, jangan ragu untuk menggunakan layanan kami.</p>
    </div>
</section>

<section class="container-fit section-md">
    <h1 class="h-section mb-10">Apa Itu Content Placement?</h1>
    <p class="p-section">
        CP atau singkatan dari content placement merupakan tindakan untuk menerbitkan artikel (review, ulasan, informasi, tutorial dll) di situs tertentu yang didalamnya terdapat backlink yang mengarah ke keyword spesifik. Umumnya memiliki harga bervariasi (berbayar) yang tergantung dari setiap pemilik website.
    </p>
    <p class="p-section my-6">
        Content placement dinilai efektif untuk menaikkan ranking suatu website karena memiliki authority yang tinggi, dengan kata lain website yang digunakan untuk content placement harus berkualitas dan terpercaya di mata mesin pencarian google. Website berkategori media nasional adalah salah satunya.
    </p>
    <p class="p-section">Akan tetapi, beriklan disertai backlink di media nasional memerlukan budget yang bisa dibilang tidak sedikit. Mulai dari 1.5 jutaan. Sehingga sebagai alternatif, Anda bisa menggunakan website lain yang memiliki authority tinggi.</p>
</section>

<section class="container-fit section-md">
    <h1 class="h-section text-center mb-10">Harga Jasa Content Placement</h1>

    <div class="grid grid-flow-row sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 1</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 300.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>1 Website</li>
                <li>Bebas Pilih Website</li>
                <li>Include Artikel</li>
                <li>Report Hasil</li>
                <li>2 - 4 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 16]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>

        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 2</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 3.000.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>10 Website</li>
                <li>Bebas Pilih Website</li>
                <li>Include Artikel</li>
                <li>Report Hasil</li>
                <li>4 - 7 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 17]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>

        <div class="border-2 p-8 rounded-lg text-center">
            <h2 class="font-semibold text-xl">Paket 3</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-primary my-2">Rp. 9.000.000</h3>

            <ul class="flex flex-col gap-4 my-6">
                <li>30 Website</li>
                <li>Bebas Pilih Website</li>
                <li>Include Artikel</li>
                <li>Report Hasil</li>
                <li>7 - 10 Hari Kerja</li>
            </ul>

            <a href="{{ route('payment.detail', ['package' => 18]) }}" class="btn btn-primary btn-block">Pilih</a>
        </div>
    </div>
</section>
@endsection