@extends('layouts.main')
@section('container')
    <div class="jumbotron" id="content">
        <div class="main-left mx-[5%] bg-white bg-opacity-60 rounded-lg p-10 aura-div">
            <p class="font-bold">Rasakan kedamaian di Tanah Suci bersama Kami</p>
            <h1 class="title-brand text-7xl my-3 aura-text">
                Kelimatu <br> <span><u>Travel & Tours</u></span>
            </h1>
            <p class="font-bold">Umroh adalah perjalanan hati dan jiwa. Bersama kami, wujudkan umroh impian Anda dengan penuh kenyamanan</p>
            <a href="/about-us" class="about-anchor"><button class="about-button mt-5 font-bold">Tentang Kami</button></a>
        </div>
        
        <div class="main-right mt-8 mb-8">
            <img src="{{ URL::asset('dist/assets/img/kaabah.png') }}" class="custom-background" alt="">
        </div>
    </div>


    <section class="bg-gray-700">
        <!-- First Section -->
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 flex flex-col lg:flex-row-reverse items-center">
            <div
                class="bg-gray-700 rounded-lg border border-gray-200 shadow-2xl dark:border-gray-700 p-8 md:p-12 mb-8 lg:w-1/2 lg:mb-0 lg:ml-8">
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-3xl font-extrabold mb-2">Umrah Adalah</h1>
                <p class="text-lg font-normal text-white mb-6">Umrah secara bahasa bisa diartikan berziarah. Sedangkan
                    menurut istilah, umroh adalah menyengaja menuju <a href="#">Ka'bah</a> untuk melaksanakan ibadah
                    tertentu.</p>
                <p class="text-lg font-normal text-white mb-6">Dalam syariat Islam, Umroh adalah berkunjung ke Baitullah
                    atau (Masjidil Haram) dengan tujuan untuk mendekatkan diri kepada Sang Khalik yakni Allah SWT dengan
                    memenuhi seluruh syarat-syaratnya, serta waktu tak ditentukan pada seperti ibadah haji.</p>
            </div>
            <div class="lg:w-1/2 flex justify-center lg:justify-start">
                <img class="w-full h-auto max-w-full rounded-lg shadow-xl dark:shadow-gray-800 lg:h-96 object-cover"
                    src="{{ URL::asset('dist/assets/img/kaabah-banner3.jpg') }}" alt="image description">
            </div>
        </div>
        <!-- Second Section -->
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 flex flex-col lg:flex-row items-center">
            <div
                class="bg-gray-700 shadow-2xl rounded-lg border border-gray-200 dark:border-gray-700 p-8 md:p-12 mb-8 lg:w-1/2 lg:mb-0 lg:mr-8">
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-3xl font-extrabold mb-2">Mengapa Harus Umroh?</h1>
                <p class="text-lg font-normal text-white mb-6">Mayoritas penduduk Indonesia adalah muslim. Sudah barang
                    tentu, setiap seorang muslim sangat
                    mendambakan dan merindukan untuk bisa pergi ke Tanah Suci melaksanakan umroh maupun haji.</p>
                <p class="text-lg font-normal text-white mb-6">Umumnya masyarakat Indonesia memilih untuk menunaikan ibadah
                    umroh terlebih dahulu, dikarenakan panjangnya antrian untuk bisa melakukan ibadah haji di Indonesia</p>
                <p class="text-lg font-normal text-white mb-6">Bagi sebagian masyarakat muslim di Indonesia melaksankan
                    ibadah umroh bukan hanya
                    diperuntukan bagi orang-orang yang mampu saja. Tapi yakinlah bahwa Allah SWT akan
                    memampukan orang-orang yang terpanggil untuk berumroh.</p>
                <p class="text-lg font-normal text-white mb-6">Untuk bisa menjadi yang terpanggil tentunya niat saja tidak
                    cukup. Kita harus awali dengan
                    memantaskan diri agar diterima dan bisa menjadi Tamu Allah. Caranya yaitu mengiringinya dengan
                    keinginan yang kuat, berdoa setiap waktu, dan ditambah dengan ikhtiar tindakan atau usaha kita
                    dalam mewujudkannya </p>
            </div>
            <div class="lg:w-1/2 flex justify-center lg:justify-start">
                <img class="w-full h-auto max-w-full rounded-lg shadow-xl dark:shadow-gray-800 lg:h-96 object-cover"
                    src="{{ URL::asset('dist/assets/img/kaabah-banner2.jpg') }}" alt="image description">
            </div>
        </div>
    </section>

    <div class="banner bg-image">
        <div class="caption">
            <h3 class="caption-header text-2xl">"Kalau Allah sudah memanggil, kalau Allah sudah mengundang, dengan cara
                apapun kita pasti akan mengunjunginya, Insyaa Allah kita akan dimudahkan hadir ke Baitullah"</h3>
            <a href="/contact-us" class="anchor-button font-bold"><button
                    class="contact-button text-white hover:text-[#b70fb9]">Kontak Kami</button></a>
        </div>
    </div>

    <div class="bg-gray-100">
        <div class="container mx-auto p-4">
            <h1 class="text-3xl font-bold text-center my-8">Testimoni Para Jama'ah</h1>

            <div class="relative flex items-center justify-center">
                <!-- Left Arrow -->
                <button id="prev" class="absolute left-5 p-2 z-10 bg-gray-300 rounded-full focus:outline-none">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <div id="carousel" class="testimonial-carousel overflow-x-auto flex gap-4 px-10 lg:px-32 py-8 snap-x">
                    @foreach ($testimonials as $testimonial)
                        <div
                            class="testimonial-item flex-shrink-0 w-80 md:w-96 bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center relative min-h-[400px]">
                            <img src="{{ $testimonial->image ? Storage::url($testimonial->image) : 'https://via.placeholder.com/100' }}"
                                alt="Aqil"
                                class="w-16 h-20 rounded-full overflow-hidden border-2 border-gray-200 mb-4 object-cover">
                            <h3 class="font-semibold">{{ $testimonial->name }}</h3>
                            <p class="text-gray-500">{{ $testimonial->caption }}</p>
                            <div class="relative mt-2">
                                <i class="fas fa-quote-left -left-10 top-0 text-2xl text-gray-500"></i>
                                <p class="text-gray-700 m-4">
                                    {{ $testimonial->description }}
                                </p>
                                <i class="fas fa-quote-right -right-10 bottom-0 text-2xl text-gray-500"></i>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right Arrow -->
                <button id="next" class="absolute right-5 p-2 z-10 bg-gray-300 rounded-full focus:outline-none">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>


    <script>
        const carousel = document.getElementById('carousel');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');

        prevButton.addEventListener('click', () => {
            carousel.scrollBy({
                left: -carousel.offsetWidth,
                behavior: 'smooth'
            });
        });

        nextButton.addEventListener('click', () => {
            carousel.scrollBy({
                left: carousel.offsetWidth,
                behavior: 'smooth'
            });
        });
    </script>
@endsection
