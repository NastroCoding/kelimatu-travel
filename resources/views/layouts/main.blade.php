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
    <link rel="shortcut icon" href="{{ URL::asset('dist/assets/ico/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('dist/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/5cedab7152.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="bg-[#d7cbbf] p-4 shadow-md" id="nav">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center justify-center">
                <!-- Container with background color and opacity -->
                <div class="bg-[#d7cbbf] bg-opacity-70 rounded-md p-1">
                    <!-- Logo with original classes -->
                    <img class="w-8 sm:w-10 md:w-12 lg:w-16 xl:w-18 max-w-full max-h-full h-auto"
                        src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}" alt="Kelimatu Travel & Tours Logo">
                </div>
            </div>
            <!-- Links -->
            <div class="hidden lg:flex space-x-4 text-center relative">
                <a href="/"
                    class="text-[#671282] font-bold transition duration-150 ease-in-out hover:text-[#b70fb9]">Beranda</a>

                <!-- About with Dropdown -->
                <div class="relative group">
                    <a href="/about-us"
                        class="text-[#671282] font-bold duration-150 ease-in-out hover:text-[#b70fb9] inline-block">Profil</a>
                    <div
                        class="absolute left-0 mt-2 w-40 bg-white rounded-md hover:rounded-md transition shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-150 ease-in-out z-10">
                        <a href="/about-us#visimisi"
                            class="block px-4 py-2 text-sm text-[#671282] rounded-md hover:rounded-md font-bold hover:text-[#fff] transition hover:bg-[#671282]">Visi
                            & Misi</a>
                        <a href="/about-us#sejarah"
                            class="block px-4 py-2 text-sm text-[#671282] rounded-md hover:rounded-md font-bold hover:text-[#fff] transition hover:bg-[#671282]">Sejarah</a>
                        <a href="/about-us#galeri"
                            class="block px-4 py-2 text-sm text-[#671282] rounded-md hover:rounded-md font-bold hover:text-[#fff] transition hover:bg-[#671282]">Galeri</a>
                        <a href="/about-us#tim"
                            class="block px-4 py-2 text-sm text-[#671282] rounded-md hover:rounded-md font-bold hover:text-[#fff] transition hover:bg-[#671282]">Tim</a>
                    </div>
                </div>

                <a href="/services"
                    class="text-[#671282] font-bold transition duration-150 ease-in-out hover:text-[#b70fb9]"> Paket Layanan </a>
                <a href="/contact-us"
                    class="text-[#671282] font-bold transition duration-150 ease-in-out hover:text-[#b70fb9]">Kontak</a>
            </div>
            <!-- Hamburger Menu Button -->
            <div class="lg:hidden">
                <button id="menu-button" class="text-[#671282] focus:outline-none">
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
            <a href="/" class="text-[#671282] font-bold transition hover:text-[#b70fb9]">Beranda</a>

            <!-- About with Dropdown -->
            <div class="relative">
                <button id="about-button"
                    class="text-[#671282] font-bold transition hover:text-[#b70fb9]">Profil</button>
                <div id="about-dropdown"
                    class="hidden flex flex-col space-y-2 mt-2 bg-[#d7cbbf] rounded-md shadow-lg p-2">
                    <a href="/about-us" class="text-[#671282] font-bold transition hover:text-[#b70fb9]">Visi & Misi</a>
                    <a href="/about-us#sejarah"
                        class="text-[#671282] font-bold transition hover:text-[#b70fb9]">Sejarah</a>
                    <a href="/about-us#galeri"
                        class="text-[#671282] font-bold transition hover:text-[#b70fb9]">Galeri</a>
                    <a href="/about-us#tim" class="text-[#671282] font-bold transition hover:text-[#b70fb9]">Tim</a>
                </div>
            </div>

            <a href="#" class="text-[#671282] font-bold transition hover:text-[#b70fb9]"> Paket Layanan </a>
            <a href="/contact-us" class="text-[#671282] font-bold transition hover:text-[#b70fb9]">Kontak</a>
        </div>
    </nav>

    <section id="hero">
        @yield('container')
    </section>

    <button type="button" data-twe-ripple-init data-twe-ripple-color="light"
        class="!fixed bottom-5 end-5 hidden rounded-full bg-[#671282] p-3 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-[#b70fb9] hover:shadow-lg focus:bg-[#b70fb9] focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#b70fb9] active:shadow-lg z-10"
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
            <div class="container mx-auto flex flex-col md:flex-row items-center md:items-start justify-between space-y-6 md:space-y-0">
                <!-- Logo and Company Name -->
                <div class="flex flex-col items-center md:items-start">
                    <img src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}" alt="Kelimatu Travel & Tours" class="w-24 mb-4">
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
                    <p>Senin-Jumat, 09.00 - 18.00<br>
                    Sabtu, 09.00 - 18.00<br>
                    Minggu, 09.00 - 12.00</p>
                    <p class="mt-2">
                        {{ $configs->address }}
                    </p>
                </div>
        
                <!-- Social Media Links -->
                <div class="text-center md:text-left">
                    <h2 class="text-xl font-semibold mb-2">Follow Us</h2>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="https://www.instagram.com/{{ $configs->instagram }}/" class="hover:text-gray-300 text-2xl font-bold">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/62{{ $configs->whatsapp_num }}" class="hover:text-gray-300 text-2xl font-bold">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="mailto:{{ $configs->gmail }}" class="hover:text-gray-300 text-2xl font-bold">
                            <i class="fa-brands fa-google"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://flowbite.com/" class="hover:underline">Kelimatu</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd"
                                d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 21 16">
                            <path
                                d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                        </svg>
                        <span class="sr-only">Discord community</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 17">
                            <path fill-rule="evenodd"
                                d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.853.069 4.094 4.094 0 0 0 3.827 2.824A8.32 8.32 0 0 1 0 14.353 11.689 11.689 0 0 0 6.29 16c7.547 0 11.675-6.2 11.675-11.579 0-.175-.005-.352-.013-.529A8.18 8.18 0 0 0 20 1.892Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 .276a9.725 9.725 0 0 0-3.086 18.938c.487.09.67-.213.67-.474 0-.233-.008-.846-.013-1.66-2.73.593-3.305-1.319-3.305-1.319-.442-1.12-1.08-1.418-1.08-1.418-.884-.603.067-.59.067-.59.976.069 1.488 1.002 1.488 1.002.867 1.484 2.276 1.055 2.83.807.09-.628.339-1.055.617-1.297-2.179-.248-4.467-1.086-4.467-4.84 0-1.07.379-1.946 1.002-2.633-.1-.247-.435-1.245.096-2.596 0 0 .82-.26 2.686.998a9.308 9.308 0 0 1 2.445-.328c.829.004 1.666.111 2.445.328 1.866-1.258 2.684-.998 2.684-.998.533 1.351.198 2.35.097 2.596.623.687 1.002 1.563 1.002 2.633 0 3.764-2.292 4.587-4.476 4.83.348.297.662.88.662 1.775 0 1.28-.012 2.31-.012 2.625 0 .263.181.567.673.471A9.725 9.725 0 0 0 10 .276Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">GitHub account</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 0a10 10 0 1 0 7.087 2.913A10.01 10.01 0 0 0 10 0Zm0 3.644a6.367 6.367 0 1 1-6.367 6.367A6.367 6.367 0 0 1 10 3.644Zm0 1.907a4.46 4.46 0 1 0 4.46 4.46A4.46 4.46 0 0 0 10 5.551Zm0 1.283a3.177 3.177 0 1 1-3.177 3.177A3.177 3.177 0 0 1 10 6.834Zm6.371-.32a1.04 1.04 0 1 0 1.04 1.04 1.04 1.04 0 0 0-1.04-1.04Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Dribbble account</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    
</body>
<script src="https://kit.fontawesome.com/a05b563fe6.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script>
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
