<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="idevice-widthe=edge">
    <title>Kelimatu Travel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="shortcut icon" href="{{ URL::asset('dist/assets/ico/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('dist/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/5cedab7152.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="bg-gray-700">
        <nav class="bg-gradient-to-l from-[#671282] to-gray-700 p-3 shadow-xl w-11/12 mx-auto my-5 rounded-xl absolute left-1/2 transform -translate-x-1/2 top-2"
            id="nav">
            <div class="max-w-7xl mx-autor flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center justify-center">
                    <!-- Container with background color and opacity -->
                    <div class="">
                        <!-- Logo with original classes -->
                        <img class="w-8 sm:w-10 md:w-12 lg:w-16 xl:w-18 max-w-full max-h-full h-auto custom-background"
                            src="{{ URL::asset('dist/assets/img/kaabah.png') }}"
                            alt="Kelimatu Travel & Tours Logo">
                    </div>

                </div>
                <!-- Links -->
                <div class="hidden lg:flex space-x-4 text-center relative mx-3">
                    <a href="/"
                        class="text-white font-bold transition duration-150 ease-in-out hover:text-gray-200">Beranda</a>
                    <div class="relative group">
                        <a href="/activity"
                            class="text-white font-bold duration-150 ease-in-out hover:text-gray-200 inline-block">Aktifitas</a>
                        <div
                            class="absolute left-0 mt-2 w-30 bg-white rounded-md hover:rounded-md transition shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-150 ease-in-out z-10">
                            <a href="/activity#galeri"
                                class="block px-4 py-2 text-sm text-[#671282] rounded-md hover:rounded-md font-bold hover:text-[#fff] transition hover:bg-[#671282]">Galeri</a>
                            <a href="/activity#testimony"
                                class="block px-4 py-2 text-sm text-[#671282] rounded-md hover:rounded-md font-bold hover:text-[#fff] transition hover:bg-[#671282]">Testimoni</a>
                        </div>
                    </div>
                    <!-- About with Dropdown -->
                    <div class="relative group">
                        <a href="/about-us"
                            class="text-white font-bold duration-150 ease-in-out hover:text-gray-200 inline-block">Profil</a>
                        <div
                            class="absolute left-0 mt-2 w-40 bg-white rounded-md hover:rounded-md transition shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-150 ease-in-out z-10">
                            <a href="/about-us#visimisi"
                                class="block px-4 py-2 text-sm text-[#671282] rounded-md hover:rounded-md font-bold hover:text-[#fff] transition hover:bg-[#671282]">Visi
                                & Misi</a>
                            <a href="/about-us#sejarah"
                                class="block px-4 py-2 text-sm text-[#671282] rounded-md hover:rounded-md font-bold hover:text-[#fff] transition hover:bg-[#671282]">Sejarah</a>
                            <a href="/about-us#tim"
                                class="block px-4 py-2 text-sm text-[#671282] rounded-md hover:rounded-md font-bold hover:text-[#fff] transition hover:bg-[#671282]">Tim</a>
                        </div>
                    </div>

                    <a href="/services"
                        class="text-white font-bold transition duration-150 ease-in-out hover:text-gray-200"> Paket
                        Layanan </a>
                    <a href="/contact-us"
                        class="text-white font-bold transition duration-150 ease-in-out hover:text-gray-200">Kontak</a>
                </div>
                <!-- Hamburger Menu Button -->
                <div class="lg:hidden">
                    <button id="menu-button" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="lg:hidden hidden flex flex-col space-y-2 mt-4">
                <a href="/" class="text-white font-bold transition hover:text-gray-200">Beranda</a>
                <div class="relative">
                    <button id="about-button"
                        class="text-white font-bold transition hover:text-gray-200">Aktifitas</button>
                    <div id="about-dropdown"
                        class="hidden flex flex-col space-y-2 mt-2 bg-[#d7cbbf] rounded-md shadow-lg p-2">
                        <a href="/activity" class="text-white font-bold transition hover:text-gray-200">Aktifitas</a>
                        <a href="/activity#galeri"
                            class="text-white font-bold transition hover:text-gray-200">Galeri</a>
                    </div>
                </div>
                <!-- About with Dropdown -->
                <div class="relative">
                    <a id="about-button" href="/about-us"
                        class="text-white font-bold transition hover:text-gray-200">Profil</a>
                    <div id="about-dropdown"
                        class="hidden flex flex-col space-y-2 mt-2 bg-[#d7cbbf] rounded-md shadow-lg p-2">
                        <a href="/about-us" class="text-white font-bold transition hover:text-gray-200">Visi & Misi</a>
                        <a href="/about-us#sejarah"
                            class="text-white font-bold transition hover:text-gray-200">Sejarah</a>
                        <a href="/about-us#tim" class="text-white font-bold transition hover:text-gray-200">Tim</a>
                    </div>
                </div>

                <a href="/services" class="text-white font-bold transition hover:text-gray-200"> Paket Layanan </a>
                <a href="/contact-us" class="text-white font-bold transition hover:text-gray-200">Kontak</a>
            </div>
        </nav>

    </div>

    <section id="hero" class="@if ($page != 'Index') mt-36 md:mt-40 @endif">
        @yield('container')
    </section>



    <!-- Toggle Button -->
    <div class="fixed bottom-10 right-0 m-4 z-50">
        <button id="toggleButton"
            class="bg-green-500 text-white p-4 rounded-full shadow-lg flex items-center space-x-2 focus:outline-none animate__animated animate__bounceIn">
            <i class="fa-brands fa-whatsapp text-2xl"></i>
            <span>Chat Dengan Kami</span>
        </button>
    </div>

    <!-- WhatsApp Popup -->
    <div id="whatsappPopup"
        class="fixed bottom-28 right-0 m-4 flex flex-col items-end space-y-2 hidden animate__animated animate__fadeInUp z-[60]">
        <div class="bg-white shadow-lg rounded-lg p-4 flex items-center space-x-2">
            <div class="flex items-center space-x-2">
                <div class="text-green-500">
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                </div>
                <div>
                    <span class="block font-medium">CS 1</span>
                    <span class="block text-sm text-gray-500">0{{ $configs->whatsapp_num }}</span>
                </div>
            </div>
            <a href="https://wa.me/62{{ $configs->whatsapp_num }}" target="_blank"
                class="bg-green-500 text-white rounded-lg px-2 py-1">CHAT</a>
        </div>
        @if ($configs->whatsapp_num2)
            <div class="bg-white shadow-lg rounded-lg p-4 flex items-center space-x-2">
                <div class="flex items-center space-x-2">
                    <div class="text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 10h2l2-4h6l2 4h2m-6 8a9 9 0 100-18 9 9 0 000 18zm3-13.5h-6m6 0a7.5 7.5 0 01-7.5 7.5m7.5-7.5H12m0 0V12" />
                        </svg>
                    </div>
                    <div>
                        <span class="block font-medium">CS 2</span>
                        <span class="block text-sm text-gray-500">081287935940</span>
                    </div>
                </div>
                <a href="https://wa.me/081287935940" target="_blank"
                    class="bg-green-500 text-white rounded-lg px-2 py-1">CHAT</a>
            </div>
        @endif
    </div>
    
    <button type="button" data-twe-ripple-init data-twe-ripple-color="light"
        class="!fixed bottom-32 end-5 z-50 hidden rounded-full bg-[#671282] p-3 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-[#b70fb9] hover:shadow-lg focus:bg-[#b70fb9] focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#b70fb9] active:shadow-lg z-10"
        id="btn-back-to-top">
        <span class="[&>svg]:w-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
            </svg>
        </span>
    </button>

    <footer class="bg-white dark:bg-gray-900 mt-10 text-white">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div
                class="container mx-auto flex flex-col md:flex-row items-center md:items-start justify-between space-y-6 md:space-y-0">
                <!-- Logo and Company Name -->
                <div class="flex flex-col items-center md:items-start">
                    <img src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}" alt="Kelimatu Travel & Tours"
                        class="w-24 mb-4">
                    <p class="text-lg font-bold">Kelimatu Travel & Tours</p>
                </div>

                <!-- Contact Information -->
                <div class="text-center md:text-left items-center w-1/2 md:w-1/4">
                    <h2 class="text-xl font-semibold mb-2">Contact Us</h2>
                    <p>{{ $configs->address }}</p>
                    <p class="mt-2">
                        <a href="https://wa.me/62{{ $configs->whatsapp_num }}" class="flex items-center">
                            <i class="fas fa-phone-alt mr-2"></i> 0{{ $configs->whatsapp_num }}
                        </a>
                        <a href="mailto:{{ $configs->gmail }}" class="flex items-center mt-2">
                            <i class="fas fa-envelope mr-2"></i> {{ $configs->gmail }}
                        </a>
                    </p>
                </div>

                <!-- Company Information -->
                <div class="text-center md:text-left items-baseline">
                    <h2 class="text-xl font-semibold mb-2">Company</h2>
                    <p><a href="/about-us" class="hover:underline">Profil</a></p>
                    <p><a href="/services" class="hover:underline">Paket Layanan</a></p>
                    <p><a href="/contact-us" class="hover:underline">Kontak</a></p>
                </div>

                <!-- Operational Hours -->
                <div class="text-center md:text-left w-1/2 md:w-1/4">
                    <h2 class="text-xl font-semibold mb-2">Jam Operasional</h2>
                    <p class="mt-2">
                        {!! nl2br(e($configs->operational)) !!}
                    </p>
                    <p class="mt-2">
                        {{ $configs->address }}
                    </p>
                </div>

                <!-- Social Media Links -->
                <div class="text-center md:text-left">
                    <h2 class="text-xl font-semibold mb-2">Follow Us</h2>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="https://www.instagram.com/{{ $configs->instagram }}/"
                            class="hover:text-gray-300 text-2xl font-bold">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/62{{ $configs->whatsapp_num }}"
                            class="hover:text-gray-300 text-2xl font-bold">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="https://www.google.com/search?q=kelimatu+travel"
                            class="hover:text-gray-300 text-2xl font-bold">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a
                        href="https://flowbite.com/" class="hover:underline">Kelimatu</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 sm:justify-center sm:mt-0">
                    <a href="https://facebook.com/{{ $configs->facebook }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <i class="fab fa-facebook-f w-4 h-4"></i>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="https://www.tiktok.com/{{ '@' . $configs->tiktok }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <i class="fab fa-tiktok w-4 h-4"></i>
                        <span class="sr-only">Tiktok page</span>
                    </a>
                    <a href="https://www.instagram.com/{{ $configs->instagram }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <i class="fab fa-instagram w-4 h-4"></i>
                        <span class="sr-only">Instagram page</span>
                    </a>
                    <a href="https://www.youtube.com/{{ '@' . $configs->youtube }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <i class="fab fa-youtube w-4 h-4"></i>
                        <span class="sr-only">Youtube channel</span>
                    </a>
                    <a href="mailto:{{ $configs->gmail }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <i class="fa-solid fa-envelope w-4 h-4"></i>
                        <span class="sr-only">Email address</span>
                    </a>
                </div>
            </div>

        </div>
    </footer>

</body>
<script src="https://kit.fontawesome.com/a05b563fe6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
<script>
    document.getElementById('toggleButton').addEventListener('click', function() {
        var popup = document.getElementById('whatsappPopup');
        if (popup.classList.contains('hidden')) {
            popup.classList.remove('hidden');
            popup.classList.add('animate__fadeInUp');
        } else {
            popup.classList.add('hidden');
            popup.classList.remove('animate__fadeInUp');
        }
    });
    document.getElementById('menu-button').addEventListener('click', () => {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    document.getElementById('about-button').addEventListener('click', () => {
        const aboutDropdown = document.getElementById('about-dropdown');
        aboutDropdown.classList.toggle('hidden');
    });

    const mybutton = document.getElementById("btn-back-to-top");

    const scrollFunction = () => {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.classList.remove("hidden");
        } else {
            mybutton.classList.add("hidden");
        }
    };
    const backToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    };

    mybutton.addEventListener("click", backToTop);
    window.addEventListener("scroll", scrollFunction);
</script>

</html>
