    @extends('layouts.main')
    @section('container')
        <section id="visimisi">
            <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 mb-10">
                <div class="relative h-60 flex items-center justify-center">
                    <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                        style="background-image: url('{{ URL::asset('dist/assets/img/mecca-background2.jpg') }}');">
                    </div>
                    <h1
                        class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-center text-white md:text-3xl lg:text-4xl z-10">
                        Visi & Misi Kelimatu Travel
                    </h1>
                </div>
            </div>

            <div class="about-wrapper mx-auto">

                <div class="md:flex">
                    <div class="text-sejarah shadow-xl mx-1 bg-gray-700 p-8 rounded-lg ">
                        <h1 class="text-3xl text-white font-bold text-center my-2"> Visi </h1>
                        <hr>
                        <p class="text-lg text-white text-center">Menjadi penyelenggara umroh terdepan dengan fasilitas
                            terbaik,
                            mengutamakan nilai spiritual dan kepuasan layanan kepada Tamu
                            Allah.</p>
                    </div>
                    <div class="text-sejarah shadow-xl mx-1 bg-gray-700 p-8 rounded-lg mt-5 md:mt-0">
                        <h1 class="text-3xl text-white font-bold text-center my-2"> Misi </h1>
                        <hr>
                        <p class="text-lg text-white mb-2">- Memberikan layanan terbaik, nyaman, kompetitif dan
                            memuaskan bagi jamaah.</p>
                        <p class="text-lg text-white mb-2">- Melakukan edukasi pemahaman kepada masyarakat dalam
                            memilih penyelenggara umroh haji yang baik dan benar.</p>
                        <p class="text-lg text-white mb-2">- Memberikan sentuhan nilai spiritual kepada jemaah.</p>
                        <p class="text-lg text-white mb-2">- Menjaga dan merawat silaturahmi kepada jemaah pasca
                            kepulangan dari Tanah Suci.</p>
                    </div>
                </div>

                <div class="p-4 rounded-lg md:p-8 bg-gradient-to-b from-gray-700 to-[#671282] mt-5" id="stats" role="tabpanel"
                    aria-labelledby="stats-tab">
                    <h1 class="text-3xl text-white font-bold text-center my-2"> Nilai Nilai Kelimatu </h1>
                    <dl
                        class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-5 dark:text-white sm:p-8">
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-3xl font-extrabold"><i class="fa-solid fa-user-tie"></i></dt>
                            <dd class="text-white font-extrabold">Profesional</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-3xl font-extrabold"><i class="fa-solid fa-scale-balanced"></i></dt>
                            <dd class="text-white font-extrabold">Adil Peduli</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-3xl font-extrabold"><i class="fa-solid fa-handshake"></i></dt>
                            <dd class="text-white font-extrabold">Jujur</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-3xl font-extrabold"><i class="fa-solid fa-gear"></i></dt>
                            <dd class="text-white font-extrabold">Integritas</dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt class="mb-2 text-3xl font-extrabold"><i class="fa-solid fa-lock"></i></dt>
                            <dd class="text-white font-extrabold">Komitmen</dd>
                        </div>
                    </dl>
                </div>
        </section>

        <section id="sejarah">
            <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 my-10">
                <div class="relative h-60 flex items-center justify-center">
                    <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                        style="background-image: url('{{ URL::asset('dist/assets/img/mecca-background3.jpg') }}');">
                    </div>
                    <h1
                        class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-center text-white md:text-3xl lg:text-4xl z-10">
                        Sejarah Pendirian Kelimatu Travel & Tours
                    </h1>
                </div>
            </div>

            <div class="about-wrapper mx-auto">
                <div class="sejarah-wrap lg:flex my-5">
                    <div class="picture">
                        <img src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}" class="w-full mx-auto"
                            width="75%" alt="">
                    </div>
                    <div
                        class="text-sejarah shadow-xl bg-gray-700 border border-gray-200 dark:border-gray-700 p-8 rounded-lg ">
                        <p class="text-lg text-white">Pada akuisisi saham PT. EPW, pengurus baru PT. EPW telah mengubah
                            branding
                            nama
                            menjadi "Kelimatu Travel &
                            Tours", dengan domisili yang tetap, serta memiliki izin PPIU (Penyelenggara Perjalanan Ibadah
                            Umroh)
                            dari
                            Kementerian Agama RI dengan nomor 12860016215810006. Perusahaan ini fokus pada penyediaan produk
                            perjalanan
                            ibadah umroh.</p>
                    </div>
                </div>
                <div
                    class="text-white shadow-xl text-logo text-lg text-sejarah bg-gradient-to-b from-gray-700 to-[#671282] border border-gray-200 dark:border-gray-700 p-8 rounded-lg">
                    <h1>Arti Logo :</h1>
                    <p class="py-1">- WARNA UNGU MAGENTA, memiliki nilai positif, berjiwa
                        artistik, bijaksana, dan intuitif, dekat dan senang memikirkan
                        masalah spiritual dalam kehidupan.</p>
                    <p class="py-1">- LAMBANG, huruf K (double) melambangkan kebersamaan dan
                        persatuan.</p>
                    <p class="py-1">- Tulisan “KELIMATU”, adalah branding nama dari PT. Emaar
                        Pesona Wisata (EPW). Kelimatu (Kalimat ; Bahasa Arab)
                        memiliki arti kesatuan perasaan dan ungkapan dalam bentuk
                        kata/tulisan. Dan atau Kelimatu bisa disingkat sebagai
                        Keluarga Alumni SMPN 57.</p>
                    <p class="py-1">- Travel & Tours, adalah bentuk usaha perjalanan travel & tours
                        berupa umroh, haji dan wisata halal lainnya.</p>
                </div>
            </div>
        </section>

        <section id="tim">
            <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 my-10">
                <div class="relative h-60 flex items-center justify-center">
                    <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                        style="background-image: url('{{ URL::asset('dist/assets/img/person-background.jpg') }}');">
                    </div>
                    <h1
                        class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white text-center md:text-3xl lg:text-4xl z-10">
                        Tim
                    </h1>
                </div>
            </div>
            <div class="about-wrapper mx-auto flex">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                        <div class="max-w-sm bg-gray-700 rounded shadow">
                            <a href="#">
                                <img class="rounded-t-lg" src="{{ URL::asset('dist/assets/img/kabah-background.jpg') }}"
                                    alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Pak Jayadi
                                    </h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Sebagai ....</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endsection
