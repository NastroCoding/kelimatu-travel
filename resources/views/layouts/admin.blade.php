<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelimatu | {{ $page }}</title>
    <link rel="shortcut icon" href="{{ URL::asset('dist/assets/ico/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('dist/css/admin.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/5cedab7152.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <style>
        .sidebar-transition {
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body>
    <nav class="fixed top-0 z-50 w-full border-b bg-white border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3 flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="hamburger-btn" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="/" class="flex ms-2 md:me-24">
                    <img src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}" class="h-8 me-3"
                        alt="Kelimatu Logo" />
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-[#671282]">Kelimatu</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="hidden my-4 text-base list-none divide-y divide-gray-100 rounded shadow" id="dropdown-user">
                    <ul class="py-1" role="none">
                        <li>
                            <a href="/admin/inbox" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Inbox</a>
                        </li>
                        <li>
                            <a href="/admin/activity" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Aktifitas</a>
                        </li>
                        <li>
                            <a href="/admin/services" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Layanan</a>
                        </li>
                        <li>
                            <a href="/admin/gallery" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Galeri</a>
                        </li>
                        <li>
                            <a href="/admin/testimony" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Testimoni</a>
                        </li>
                        <li>
                            <a href="/admin/team" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Tim</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 w-64 h-screen pt-20 transition-transform -translate-x-full lg:translate-x-0 border-r border-gray-200 bg-white sidebar-transition"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/admin/inbox"
                        class="flex items-center p-2 text-gray-900 transition rounded-lg hover:bg-gray-100 group">
                        <i class="fa-solid fa-inbox"></i>
                        <span class="ms-3">Inbox</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/activity"
                        class="flex items-center p-2 text-gray-900 transition rounded-lg hover:bg-gray-100 group">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="ms-3">Aktifitas</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/services"
                        class="flex items-center p-2 text-gray-900 transition rounded-lg hover:bg-gray-100 group">
                        <i class="fa-solid fa-plane-departure"></i>
                        <span class="ms-3">Layanan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/gallery"
                        class="flex items-center p-2 text-gray-900 transition rounded-lg hover:bg-gray-100 group">
                        <i class="fa-solid fa-image"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/testimony"
                        class="flex items-center p-2 text-gray-900 transition rounded-lg hover:bg-gray-100 group">
                        <i class="fa-solid fa-comment"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Testimoni</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/team"
                        class="flex items-center p-2 text-gray-900 transition rounded-lg hover:bg-gray-100 group">
                        <i class="fa-solid fa-people-group"></i>
                        <span class="ms-3">Tim</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/config"
                        class="flex items-center p-2 text-gray-900 transition rounded-lg hover:bg-gray-100 group">
                        <i class="fa-solid fa-gear"></i>
                        <span class="ms-3">Konfigurasi</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 lg:ml-64 mt-20">
        @yield('content')
    </div>


    <script>
        document.getElementById('hamburger-btn').addEventListener('click', function() {
            const sidebar = document.getElementById('logo-sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</body>

</html>
