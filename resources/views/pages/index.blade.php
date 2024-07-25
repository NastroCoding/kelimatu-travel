@extends('layouts.main')
@section('container')
    <div class="jumbotron w-full mx-auto flex justify-between items-center p-5 relative transition-all duration-200" id="content">
        <div class="main-left mx-[5%] mt-24 bg-white bg-opacity-60 rounded-lg p-10 aura-div ">
            <p class="font-bold">Rasakan kedamaian di Tanah Suci bersama Kami</p>
            <h1 class="title-brand lg:text-6xl md:text-5xl text-3xl my-3 aura-text">
                Kelimatu <br> <span><u>Travel & Tours</u></span>
            </h1>
            <p class="font-bold">Umroh adalah perjalanan hati dan jiwa. Bersama kami, wujudkan umroh impian Anda dengan penuh
                kenyamanan</p>
            <a href="/about-us" class="about-anchor"><button class="bg-transparent border-2 border-black py-4 px-8 text-center text-black inline-block text-lg rounded-full w-2/5 mx-auto transition duration-200 hover:bg-[#b70fb9] hover:border-white hover:text-white mt-5 font-bold">Profil Kami</button></a>
        </div>

        <div class="main-right mt-28 mb-8">
            <img src="{{ URL::asset('dist/assets/img/kaabah.png') }}" class="custom-background" alt="">
        </div>
    </div>

    

    <div id="custom-controls-gallery" class="relative w-full mt-10 mb-6" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                    class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                    class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                    class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
                    class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg"
                    class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="">
            </div>
        </div>
        <div class="flex justify-center items-center pt-4">
            <button type="button"
                class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="text-[#b70fb9] transition hover:text-white ">
                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="text-[#b70fb9] transition hover:text-white">
                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
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
                    src="{{ URL::asset('dist/assets/img/masjid-nabawi.jpg') }}" alt="image description">
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

    <div>
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
                            class="testimonial-item flex-shrink-0 w-80 md:w-96 bg-gray-100 p-6 rounded-lg shadow-md flex flex-col items-center text-center relative min-h-[400px]">
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
