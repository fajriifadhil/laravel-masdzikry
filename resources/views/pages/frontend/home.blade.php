@extends('layouts.frontend')

@section('content')
<section id="hero" class="bg-primary text-primary-content">
    <div class="container-fit py-20 md:py-36 text-center">
        <h1 class="text-4xl md:text-6xl font-bold" data-aos="fade-in" data-aos-duration="2500">Mas Dzikry</h1>
        <p class="text-2xl font-medium mt-8 mb-10" data-aos="fade-in" data-aos-duration="2500">Penyedia layanan digital
            professional dan terpercaya di Indonesia.
        </p>

        <ul class="flex flex-wrap gap-5 md:gap-10 items-center justify-center text-2xl font-medium">
            <li data-aos="fade-in" data-aos-duration="2500" data-aos-delay="500">
                <i class="ri-checkbox-circle-fill"></i> <span>Aman</span>
            </li>
            <li data-aos="fade-in" data-aos-duration="2500" data-aos-delay="1000">
                <i class="ri-checkbox-circle-fill"></i> <span>Harga Terjangkau</span>
            </li>
            <li data-aos="fade-in" data-aos-duration="2500" data-aos-delay="1500">
                <i class="ri-checkbox-circle-fill"></i> <span>Bergaransi</span>
            </li>
        </ul>
    </div>
</section>

<!-- ABOUT -->
<section id="about-us" class="container-fit section">
    <h1 class="h-section text-center mb-10" data-aos="fade-up" data-aos-duration="1500">Tentang Kami</h1>
    <div class="flex flex-col gap-4" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="1000">
        <p class="p-section">
            Perkenalkan, Mas Dzikry adalah agency digital asal Surabaya yang menyediakan berbagai layanan seputar
            digital marketing terkait press release media nasional dan optimasi website online.
        </p>
        <p class="p-section">Saya sendiri bernama
            lengkap Moch Dzikry Nur Alam yang merupakan pendiri website masdzikry.com yang bertanggung jawab serta
            mengelola semua jasa digital marketing yang tersedia. </p>
        <p class="p-section">Bisa dibilang saya
            termasuk freelance yang berfokus pada layanan digital marketing yang bekerjasama secara resmi dengan banyak
            media nasional ternama.</p>

        <p class="p-section">Dalam pengerjaan berbagai
            jasa yang tersedia di Mas Dzikry, kami bekerja secara team untuk memberikan pelayanan yang terbaik.</p>

        <p class="p-section">Kami memiliki 6 layanan
            utama untuk membantu meningkatkan bisnis Anda, yaitu press release
            media nasional, jasa verified akun instagram centang biru, content placement, backlink media nasional
            berkualitas, install elementor pro dan optimasi DA PA website.</p>
        <p class="p-section">Berbekal pengalaman yang
            cukup dan pemahaman yang cakap, kami siap membantu mengoptimalkan
            bisnis Anda di mesin pencarian Google.</p>
    </div>
</section>

<!-- WHY US -->
<section id="why-us" class="container-fit section">
    <h1 class="h-section text-center mb-10" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">Mengapa
        Harus Mas Dzikry</h1>

    <div class="grid grid-flow-row sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-16">
        <div class="text-center" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="1000">
            <h2 class="text-primary font-semibold text-xl mb-6">Pengalaman dan Keahlian</h2>
            <i class="ri-star-half-fill text-6xl text-primary"></i>
            <p class="text-justify mt-6 text-gray-500 leading-8">
                Kami terus mengikuti perkembangan tren dan algoritma terbaru di dunia online untuk memastikan bahwa
                strategi yang kami terapkan adalah yang paling efektif.
            </p>
        </div>
        <div class="text-center" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="1500">
            <h2 class="text-primary font-semibold text-xl mb-6">Kerjasama dengan Media Nasional</h2>
            <i class="ri-shake-hands-fill text-6xl text-primary"></i>
            <p class="text-justify mt-6 text-gray-500 leading-8">
                Salah satu keunggulan utama kami adalah kerjasama yang solid dengan banyak media nasional ternama.
            </p>
        </div>
        <div class="text-center" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="2000">
            <h2 class="text-primary font-semibold text-xl mb-6">Layanan Terlengkap </h2>
            <br>
            <i class="ri-article-fill text-6xl text-primary"></i>
            <p class="text-justify mt-6 text-gray-500 leading-8">
                Kami terus mengikuti perkembangan tren dan algoritma terbaru di dunia online untuk memastikan bahwa
                strategi yang kami terapkan adalah yang paling efektif.
            </p>
        </div>
        <div class="text-center" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="2500">
            <h2 class="text-primary font-semibold text-xl mb-6">Tim Profesional</h2>
            <br>
            <i class="ri-shield-check-fill text-6xl text-primary"></i>
            <p class="text-justify mt-6 text-gray-500 leading-8">
                Kami beroperasi sebagai sebuah tim yang terdiri dari individu yang berpengalaman dan kompeten dalam
                bidang digital marketing. Kami bekerja sama untuk memberikan pelayanan yang terbaik kepada Anda.
            </p>
        </div>
    </div>
</section>

<!-- LAYANAN -->
<section id="services" class="container-fit section">
    <h1 class="h-section text-center mb-8" data-aos="fade-up" data-aos-duration="1500">Layanan</h1>

    <p class="p-section mb-12 text-gray-500 font-medium text-center" data-aos="fade-up" data-aos-duration="1500">
        Tersedia beragam layanan digital professional.</p>

    <div class="grid grid-flow-row sm:grid-cols-2 md:grid-cols-3 gap-8">
        <a href="{{ route('press-release') }}" class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg"
            data-aos="fade-right" data-aos-duration="1500" data-aos-delay="500">
            <div class="bg-primary text-primary-content rounded-full h-12 w-12 grid place-content-center">
                <i class="ri-megaphone-line text-xl"></i>
            </div>
            <h2 class="font-semibold mt-4 mb-2 text-lg">Press Release</h2>
            <p class="text-gray-500 leading-8">Layanan untuk mempublikasikan berbagai informasi sesuai kebutuhan Anda di
                beragam media nasional ternama.</p>

            <p class="text-blue-500 mt-4"><span>Learn more</span> <i class="ri-arrow-right-s-line"></i></p>
        </a>

        <a href="{{ route('verify-instagram') }}" class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg"
            data-aos="fade-right" data-aos-duration="1500" data-aos-delay="1000">
            <div class="bg-primary text-primary-content rounded-full h-12 w-12 grid place-content-center">
                <i class="ri-instagram-line text-xl"></i>
            </div>
            <h2 class="font-semibold mt-4 mb-2 text-lg">Verifikasi Instagram</h2>
            <p class="text-gray-500 leading-8">Layanan untuk mendapatkan centang biru instagram menggunakan metode
                optimasi dan press release media nasional.</p>

            <p class="text-blue-500 mt-4"><span>Learn more</span> <i class="ri-arrow-right-s-line"></i></p>
        </a>

        <a href="{{ route('content-placement') }}" class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg"
            data-aos="fade-right" data-aos-duration="1500" data-aos-delay="1500">
            <div class="bg-primary text-primary-content rounded-full h-12 w-12 grid place-content-center">
                <i class="ri-google-fill text-xl"></i>
            </div>
            <h2 class="font-semibold mt-4 mb-2 text-lg">Content Placement</h2>
            <p class="text-gray-500 leading-8">Layanan berbasis SEO (Search Engine Optimization) untuk mempromosikan
                website dan bisnis Anda di mesin pencarian Google.</p>

            <p class="text-blue-500 mt-4"><span>Learn more</span> <i class="ri-arrow-right-s-line"></i></p>
        </a>

        <a href="{{ route('backlink-media') }}" class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg"
            data-aos="fade-right" data-aos-duration="1500" data-aos-delay="500">
            <div class="bg-primary text-primary-content rounded-full h-12 w-12 grid place-content-center">
                <i class="ri-link text-xl"></i>
            </div>
            <h2 class="font-semibold mt-4 mb-2 text-lg">Backlink Media Nasional</h2>
            <p class="text-gray-500 leading-8">Layanan untuk mempublikasikan berbagai informasi sesuai kebutuhan Anda di
                beragam media nasional ternama disertai link aktif.</p>

            <p class="text-blue-500 mt-4"><span>Learn more</span> <i class="ri-arrow-right-s-line"></i></p>
        </a>

        <a href="{{ route('web-optimization') }}" class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg"
            data-aos="fade-right" data-aos-duration="1500" data-aos-delay="1000">
            <div class="bg-primary text-primary-content rounded-full h-12 w-12 grid place-content-center">
                <i class="ri-node-tree text-xl"></i>
            </div>
            <h2 class="font-semibold mt-4 mb-2 text-lg">Optimasi DA PA</h2>
            <p class="text-gray-500 leading-8">Layanan untuk meningkatkan skor domain authority dan page authority
                website dengan aman.</p>

            <p class="text-blue-500 mt-4"><span>Learn more</span> <i class="ri-arrow-right-s-line"></i></p>
        </a>

        <a href="{{ route('elementor-pro') }}" class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg"
            data-aos="fade-right" data-aos-duration="1500" data-aos-delay="1500">
            <div class="bg-primary text-primary-content rounded-full h-12 w-12 grid place-content-center">
                <i class="ri-article-line text-xl"></i>
            </div>
            <h2 class="font-semibold mt-4 mb-2 text-lg">Elementor Pro</h2>
            <p class="text-gray-500 leading-8">Layanan untuk instalasi plugin elementor pro pada website wordpress
                secara resmi dan cepat dengan harga terjangkau.</p>

            <p class="text-blue-500 mt-4"><span>Learn more</span> <i class="ri-arrow-right-s-line"></i></p>
        </a>
    </div>
</section>

<!-- TESTIMONY -->
<section id="testimony" class="container-fit section relative overflow-hidden">
    <h1 class="h-section text-center mb-20" data-aos="fade-up" data-aos-duration="2000">Testimoni Pelanggan</h1>
    <br>
    <div class="swiper relative overflow-visible">
        <div class="bg-gray-200 w-[80%] left-1/2 -translate-x-1/2 rounded-lg top-1/2 -translate-y-1/2 h-96 absolute">
        </div>
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide bg-white p-8 rounded-lg border shadow-md">
                <p class="my-3 text-gray-500">Pengalaman berbelanja di website Mas Dzikry sangat menyenangkan. Pembayaran mudah</p>
                <div class="flex gap-3 items-center">
                    <div class="rounded-full w-10 h-10 object-cover overflow-hidden">
                        <img src= "{{ asset('avatar.png') }}" alt="profile"
                            class="h-full w-full object-cover" />
                    </div>
                    <div>
                        <h3 class="font-semibold">A**i P*a**ma</h3>
                    </div>
                </div>
            </div>

            <div class="swiper-slide bg-white p-8 rounded-lg border shadow-md">
                <p class="my-3 text-gray-500">Sangat professional dan cepat saat mengerjakan berbagai project publikasi media yang saya butuhkan</p>
                <div class="flex gap-3 items-center">
                    <div class="rounded-full w-10 h-10 object-cover overflow-hidden">
                        <img src= "{{ asset('avatar.png') }}" alt="profile"
                            class="h-full w-full object-cover" />
                    </div>
                    <div>
                        <h3 class="font-semibold">Rahmat</h3>
                    </div>
                </div>
            </div>

            <div class="swiper-slide bg-white p-8 rounded-lg border shadow-md">
                <p class="my-3 text-gray-500">Layanan dan dukungan dari tim Mas Dzikry sangat membantu bisnis dan perusahaan saya </p>
                <div class="flex gap-3 items-center">
                    <div class="rounded-full w-10 h-10 object-cover overflow-hidden">
                        <img src= "{{ asset('avatar.png') }}" alt="profile"
                            class="h-full w-full object-cover" />
                    </div>
                    <div>
                        <h3 class="font-semibold">D*w* K*r***a</h3>
                    </div>
                </div>
            </div>

            <div class="swiper-slide bg-white p-8 rounded-lg border shadow-md">
                <p class="my-3 text-gray-500">Saya sangat puas dengan layanan yang ditawarkan. Proses transaksi sangat cepat dan aman</p>
                <div class="flex gap-3 items-center">
                    <div class="rounded-full w-10 h-10 object-cover overflow-hidden">
                        <img src= "{{ asset('avatar.png') }}" alt="profile"
                            class="h-full w-full object-cover" />
                    </div>
                    <div>
                        <h3 class="font-semibold">Rina</h3>
                    </div>
                </div>
            </div>

        </div>
        <div class="swiper-pagination"></div>

        <div class="absolute z-10 top-1/2 -translate-y-1/2 flex justify-between px-5 left-0 right-0 gap-5">
            <button type="button" class="swiper-back btn btn-primary btn-rounded-full btn-circle">
                <i class="ri-arrow-left-s-line"></i>
            </button>
            <button type="button" class="swiper-next btn btn-primary btn-rounded-full btn-circle">
                <i class="ri-arrow-right-s-line"></i>
            </button>
        </div>
    </div>

    <script>
        function setSwiper(perView = 3) {
            const swiper = new Swiper('.swiper', {
                slidesPerView: perView,
                spaceBetween: 30,

                pagination: {
                    el: '.swiper-pagination',
                },

                navigation: {
                    nextEl: '.swiper-next',
                    prevEl: '.swiper-back',
                },

            });
        }

        const currWidth = window.innerWidth;

        if (currWidth < 1060) {
            setSwiper(1);
        } else {
            setSwiper(3);
        }

        window.addEventListener('resize', function () {
            const newWidth = window.innerWidth;

            if (newWidth < 1060) {
                setSwiper(1);
            } else {
                setSwiper(3);
            }
        });
    </script>
</section>

<!-- PARTNER -->
<section id="partner" class="container-fit section">
    <h1 class="h-section text-center mb-10" data-aos="fade-up" data-aos-duration="2000">Partner Kami</h1>
    <p class="p-section text-center text-gray-500" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="500">
        Total 70 media nasional dan lokal telah bekerja sama secara resmi
        yang siap melakukan press release dengan professional. Lebih dari 500 klien telah kami layani, mulai dari
        blogger, UMKM, start up hingga perusahaan Nasional.</p>
    <!-- <div class="grid grid-flow-row sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-0 md:gap-5">
            <img src="{{ asset('partner/5.png') }}" alt="partner" class="mx-auto" />
            <img src="{{ asset('partner/4.png') }}" alt="partner" class="mx-auto" />
            <img src="{{ asset('partner/3.png') }}" alt="partner" class="mx-auto" />
            <img src="{{ asset('partner/2.png') }}" alt="partner" class="mx-auto" />
            <img src="{{ asset('partner/1.png') }}" alt="partner" class="mx-auto" />
        </div> -->
    <div class="flex overflow-hidden">
        <div class="flex animate-loop-scroll space-x-6">
            <img loading="lazy" src="{{ asset('partner/5.png') }}" alt="partner" class="mx-auto max-w-none" />
            <img loading="lazy" src="{{ asset('partner/4.png') }}" alt="partner" class="mx-auto max-w-none" />
            <img loading="lazy" src="{{ asset('partner/3.png') }}" alt="partner" class="mx-auto max-w-none" />
            <img loading="lazy" src="{{ asset('partner/2.png') }}" alt="partner" class="mx-auto max-w-none" />
            <img loading="lazy" src="{{ asset('partner/1.png') }}" alt="partner" class="mx-auto max-w-none" />
        </div>
        <div class="flex animate-loop-scroll space-x-6" aria-hidden="true">
            <img loading="lazy" src="{{ asset('partner/5.png') }}" alt="partner" class="mx-auto max-w-none" />
            <img loading="lazy" src="{{ asset('partner/4.png') }}" alt="partner" class="mx-auto max-w-none" />
            <img loading="lazy" src="{{ asset('partner/3.png') }}" alt="partner" class="mx-auto max-w-none" />
            <img loading="lazy" src="{{ asset('partner/2.png') }}" alt="partner" class="mx-auto max-w-none" />
            <img loading="lazy" src="{{ asset('partner/1.png') }}" alt="partner" class="mx-auto max-w-none" />
        </div>
    </div>
</section>

<!-- FAQ -->
<section id="faq" class="container-fit section">
    <h1 class="h-section text-center mb-10">Frequently Asked Questions</h1>
    <div class="collapse collapse-arrow border-b rounded-none">
        <input type="checkbox" name="my-accordion-2" />
        <div class="collapse-title text-xl font-medium">
            Apakah Mas Dzikry berbentuk perusahaan?
        </div>
        <div class="collapse-content">
            <p>Tidak, masdzikry.com saat ini dikelola oleh saya sendiri dan team dalam mengerjakan berbagai layanan yang tersedia.</p>
        </div>
    </div>
    <div class="collapse collapse-arrow border-b rounded-none">
        <input type="checkbox" name="my-accordion-2" />
        <div class="collapse-title text-xl font-medium">
            Sudah tersedia di kota mana saja?
        </div>
        <div class="collapse-content">
            <p>Kediri dan Surabaya. Lebih dari itu, kita bisa menghandle berbagai project digital marketing di seluruh daerah Indonesia, tidak terbatas kota-kota tertentu.</p>
        </div>
    </div>
    <div class="collapse collapse-arrow border-b rounded-none">
        <input type="checkbox" name="my-accordion-2" />
        <div class="collapse-title text-xl font-medium">
            Apa website ini bekerjasama dengan pihak media nasional secara resmi?
        </div>
        <div class="collapse-content">
            <p>Yup, kami bekerjasama dengan berbagai media nasional ternama secara resmi dan bukan jalur ilegal. Selain itu, kami memiliki garansi penuh apabila layanan tidak terbit atau terdapat kesalahan yang lainnya dari pihak media.</p>
        </div>
    </div>
    <div class="collapse collapse-arrow border-b rounded-none">
        <input type="checkbox" name="my-accordion-2" />
        <div class="collapse-title text-xl font-medium">
            Sudah berapa lama Mas Dzikry mendirikan layanan digital ini?
        </div>
        <div class="collapse-content">
            <p>Sejak tahun 2017 hingga sekarang. Kami berkomitmen penuh untuk memberikan pelayanan yang terbaik dan belajar dari pengalaman sebelumnya.</p>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact" class="container-fit section">
    <h1 class="h-section text-center mb-10" data-aos="fade-up" data-aos-duration="1500">Contact</h1>

    <p class="p-section text-gray-500 mb-10 text-center" data-aos="fade-in" data-aos-duration="1500"
        data-aos-delay="1000">Jika Anda memiliki pertanyaan, permintaan khusus, atau ingin
        berbicara dengan kami lebih lanjut tentang bagaimana kami dapat membantu meningkatkan bisnis Anda, jangan ragu
        untuk menghubungi kami. Kami senang dapat membantu Anda.</p>

    <div class="flex gap-8 justify-center items-center">
        <div class="flex items-center gap-3 font-medium text-sm" data-aos="fade-right" data-aos-duration="1500"
            data-aos-delay="1500">
            <i class="ri-phone-line text-3xl"></i>
            <div>
                <h2>PHONE</h2>
                <p>08981530661</p>
            </div>
        </div>
        <div class="flex items-center gap-3 font-medium text-sm" data-aos="fade-right" data-aos-duration="2000"
            data-aos-delay="1500">
            <i class="ri-mail-open-line text-3xl"></i>
            <div>
                <h2>EMAIL</h2>
                <p>halo@masdzikry.com</p>
            </div>
        </div>
    </div>
</section>
@endsection
