@extends('layouts.main')
@section('container')
    <div class="relative h-screen md:flex w-full mx-auto justify-between items-center p-5 transition-all duration-200 bg-black">
        <div class="absolute inset-0 h-screen bg-center bg-no-repeat bg-cover filter blur z-1" @if ($configs && $configs->img_jumbotron)
            style="background-image: url('{{ Storage::url($configs->img_jumbotron) }}');"
        @endif>
            >
        </div>
            <div class="main-left mx-[5%] mt-24 bg-opacity-60 rounded-2xl p-10">
                <p class="font-bold text-white drop-shadow-[2px_2px_2px_rgba(0,0,0,1)] text-xl">Rasakan kedamaian di Tanah Suci
                    bersama Kami</p>
                <h1 class="title-brand lg:text-6xl md:text-5xl text-3xl my-3 drop-shadow-[2px_2px_0px_rgba(255,255,255,0.9)]">
                    Kelimatu <br> <span><u>Travel & Tours</u></span>
                </h1>
                <p class="font-bold text-white drop-shadow-[2px_2px_2px_rgba(0,0,0,1)]">Umroh adalah perjalanan hati dan jiwa.
                    Bersama kami, wujudkan umroh impian Anda dengan penuh
                    kenyamanan</p>
                <a href="/about-us" class="about-anchor"><button
                        class="bg-transparent border-2 border-white py-4 px-1 text-center text-white inline-block text-lg rounded-full w-2/5 mx-auto transition duration-200 hover:bg-[#b70fb9] hover:border-white hover:text-white mt-5 font-bold max-[600px]:text-sm max-[600px]:py-2 drop-shadow-[2px_2px_2px_rgba(0,0,0,1)]">Profil
                        Kami</button></a>
            </div>
    
            <div class="main-right mt-28 mb-8 hidden md:block">
                <img src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}"
                    class="w-10/12 drop-shadow-[2px_2px_0px_rgba(255,255,255,0.9)] " alt="">
            </div>
    </div>

    <div class="bg-gray-100 py-12">
        <div class="container mx-auto">
            <iframe id="embed-frame" class=" bg-gray-100 w-full md:w-10/12 h-screen border-none p-5 mx-auto"
                src="{{ $configs->embed }}" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>

    <div class="bg-gray-100 pb-12">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold text-center mb-8">Perlengkapan Umroh</h1>
            <div class="grid grid-cols-1 md:grid-cols-6 gap-6">
                @foreach ($items as $item)
                    <div class="flex flex-col items-center">
                        <div class=" w-24 h-24 lg:w-36 lg:h-36 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <img src="{{ Storage::url($item->image) }}" alt="Koper" class="w-24 h-24 lg:w-36 lg:h-36 rounded-full">
                        </div>
                        <p class="text-center"><b>{{ $item->caption }}</b></p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="mx-auto w-11/12">
        <h1 class="text-3xl font-bold text-center my-8">Aktifitas Terkini Kelimatu</h1>

        @if ($slideshows->isNotEmpty())
            <div id="controls-carousel" class="relative w-full" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96 mb-5">
                    @foreach ($slideshows as $slideshow)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ Storage::url($slideshow->image) }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="text-sky-500 hover:text-sky-700 absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center  transition justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="text-sky-500 hover:text-sky-700 absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center  transition justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        @endif

        <div class="relative flex flex-col items-center justify-center">
            @foreach ($activities->sortByDesc('date') as $activity)
                @php
                    $images = json_decode($activity->image, true);
                @endphp
                <div class="bg-gray-200 shadow-lg rounded-lg mb-5 overflow-hidden">
                    <div class="relative flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2 h-56 md:h-auto">
                            @if (is_array($images) && !empty($images))
                                <img src="{{ asset('storage/' . $images[0]) }}" class="object-cover w-full h-full lazyload"
                                    alt="Activity Image">
                            @else
                                <img src="https://via.placeholder.com/600x400?text=No+Image+Available"
                                    class="object-cover w-full h-full lazyload" alt="No Image Available">
                            @endif
                        </div>
                        <div class="w-full md:w-1/2 p-5 bg-gray-200 text-white flex flex-col justify-between">
                            <div>
                                <h5 class="mb-2 text-2xl font-bold text-black">{{ $activity->title }}</h5>
                                <p class="mb-3 text-black">{{ $activity->description }}</p>
                            </div>
                            <div class="mt-auto">
                                <div class="flex justify-between text-xs mb-3 text-black">
                                    <p>Ditulis Oleh: {{ $activity->trademark }}</p>
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp
                                    <p>{{ \Carbon\Carbon::parse($activity->date)->translatedFormat('l, d F Y') }}</p>
                                </div>
                                <a href="/activity/{{ $activity->slug }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Baca selengkapnya
                                    <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section class="bg-gray-700">
        <!-- First Section -->
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 flex flex-col lg:flex-row-reverse items-start items-center">
            <div
                class="bg-gray-800 rounded-lg border border-gray-200 shadow-2xl dark:border-gray-700 p-8 md:p-12 mb-8 lg:w-1/2 lg:mb-0 lg:ml-8">
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-3xl font-extrabold mb-2">
                    {{ $configs->title_info }}</h1>
                <p class="text-lg font-normal text-white mb-6">{!! nl2br(e($configs->info)) !!}</p>
            </div>
            <div class="lg:w-1/2 flex justify-center lg:justify-start">
                <img class="w-full h-auto max-w-full rounded-lg shadow-xl dark:shadow-gray-800 lg:h-96 object-cover"
                    src="{{ Storage::url($configs->img_info) }}" alt="image description">
            </div>
        </div>
        <!-- Second Section -->
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 flex flex-col lg:flex-row items-start">
            <div
                class="bg-gray-800 shadow-2xl rounded-lg border border-gray-200 dark:border-gray-700 p-8 md:p-12 mb-8 lg:w-1/2 lg:mb-0 lg:mr-8">
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-3xl font-extrabold mb-2">
                    {{ $configs->title_info2 }}</h1>
                <p class="text-lg font-normal text-white mb-6">{!! nl2br(e($configs->info2)) !!}</p>
            </div>
            <div class="lg:w-1/2 flex justify-center lg:justify-start">
                <img class="w-full h-auto max-w-full rounded-lg shadow-xl dark:shadow-gray-800 lg:h-96 object-cover"
                    src="{{ Storage::url($configs->img_info2) }}" alt="image description">
            </div>
        </div>
    </section>

    <div class="relative h-96 flex items-center justify-center">
        <!-- Image container with overlay -->
        <div class="relative w-full h-full">
            <img src="{{ Storage::url($configs->img_quote) }}" alt="Kaabah Banner"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>

        <!-- Text overlay -->
        <div class="absolute z-20 flex flex-col w-3/4 text-center font-black justify-center">
            <h3 class="font-serif text-white text-xl md:text-2xl">
                {{ $configs->quote }}
            </h3>
            <a href="/contact-us" class="block mt-5 mx-auto w-2/5">
                <button
                    class="bg-transparent border-2 border-white py-4 px-8 text-center text-white text-lg rounded-full transition duration-200 hover:bg-[#b70fb9] hover:border-[#b70fb9] hover:text-white font-bold max-w-[600px]:text-sm max-w-[600px]:py-2">
                    Kontak Kami
                </button>
            </a>
        </div>
    </div>
    
    <div>
        <div class="container mx-auto p-4">
            <h1 class="text-3xl font-bold text-center my-8">Testimoni Para Jama'ah</h1>
            <div class="w-5/6 mx-auto mb-10 flex flex-col">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-8 px-2 sm:px-4 md:px-10 py-8">
                    @foreach ($testimonials->sortByDesc('created_at')->take(4) as $testimonial)
                        <div
                            class="testimonial-item flex-shrink-0 w-full bg-gray-200 p-6 rounded-lg shadow-md flex flex-col items-center text-center relative min-h-[400px]">
                            <img src="{{ $testimonial->image ? Storage::url($testimonial->image) : 'https://via.placeholder.com/100' }}"
                                alt="Aqil"
                                class="lazyload w-16 h-20 rounded-full overflow-hidden border-2 border-gray-200 mb-4 object-cover">
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
                <a href="/activity#testimoni" class="mx-auto">
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Lihat Testimoni Lainnya
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
