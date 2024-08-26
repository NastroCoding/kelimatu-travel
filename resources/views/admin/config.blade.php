@extends('layouts.admin')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 animate__animated animate__fadeInDown animate__faster"
                role="alert">
                <span class="font-medium">{{ $error }}</span>
            </div>
        @endforeach
    @endif
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 animate__animated animate__fadeInDown animate__faster"
            role="alert">
            <span class="font-medium">Sukses!</span> {{ session('success') }}
        </div>
    @endif
    <h1 class="text-3xl">Konfigurasi</h1>

    <div class="grid grid-cols-1 gap-6 mb-8 mt-8">
        <button id="background-button" class="bg-green-800 text-white px-4 py-2 rounded">Preview Background Halaman
            Depan</button>
        <div id="background-container" class="hidden mt-2 animate__animated animate__fadeIn animate__faster">
            <button type="button" data-modal-target="jumbotron-modal" data-modal-toggle="jumbotron-modal"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Jumbotron</button>
            <div class="relative h-screen flex items-center justify-center mt-5">
                <div class="absolute inset-0 bg-center bg-no-repeat bg-cover filter blur z-1"
                    style="background-image: url('{{ Storage::url($configs->img_jumbotron) }}');">
                </div>
                <div class="main-left mx-[5%] mt-24 bg-opacity-60 rounded-2xl p-10">
                    <p class="font-bold text-white drop-shadow-[2px_2px_2px_rgba(0,0,0,1)] text-xl">Rasakan kedamaian di
                        Tanah Suci
                        bersama Kami</p>
                    <h1
                        class="title-brand lg:text-6xl md:text-5xl text-3xl my-3 drop-shadow-[2px_2px_0px_rgba(255,255,255,0.9)]">
                        Kelimatu <br> <span><u>Travel & Tours</u></span>
                    </h1>
                    <p class="font-bold text-white drop-shadow-[2px_2px_2px_rgba(0,0,0,1)]">Umroh adalah perjalanan hati dan
                        jiwa.
                        Bersama kami, wujudkan umroh impian Anda dengan penuh
                        kenyamanan</p>
                    <a href="/about-us" class="about-anchor"><button
                            class="bg-transparent border-2 border-white py-4 px-1 text-center text-white inline-block text-lg rounded-full w-2/5 mx-auto transition duration-200 hover:bg-[#b70fb9] hover:border-white hover:text-white mt-5 font-bold max-[600px]:text-sm max-[600px]:py-2 drop-shadow-[2px_2px_2px_rgba(0,0,0,1)]">Profil
                            Kami</button></a>
                </div>

                <div class="main-right mt-28 mb-8">
                    <img src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}"
                        class="w-10/12 drop-shadow-[2px_2px_0px_rgba(255,255,255,0.9)]" alt="">
                </div>
                <style>
                    .aura-div {
                        box-shadow: 0 0 20px 10px rgba(255, 255, 255, 0.25),
                            0 0 40px 20px rgba(255, 255, 255, 0.25),
                            0 0 60px 30px rgba(255, 255, 255, 0.25),
                            0 0 80px 40px rgba(255, 255, 255, 0.25);
                    }

                    .glow-effect {
                        box-shadow: 0 0 15px rgba(255, 255, 255, 0.8), 0 0 5px rgba(255, 255, 255, 0.6), 0 0 7px rgba(255, 255, 255, 0.4);
                    }


                    .title-brand {
                        color: #b70fb9;
                        font-family: "Merriweather";
                        font-weight: black;
                    }

                    .title-brand span {
                        font-family: "Merriweather";
                        color: #671282;
                    }

                    .main-left,
                    .main-right {
                        flex: 1;
                        padding: 20px;
                        z-index: 2;
                    }

                    .main-left {
                        max-width: 75%;
                    }

                    .main-right {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }

                    .custom-background {
                        background: linear-gradient(#b70fb9, #671282);
                        border-radius: 100px 1000px 100px 2100px;
                        height: 100%;
                        max-width: 450px;
                        z-index: 1;
                        transition: 0.2s;
                        box-shadow: rgba(0, 0, 0, 0.35) 0px 54px 55px,
                            rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
                            rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
                    }
                </style>
            </div>
            <button type="button" data-modal-target="quote_modal" data-modal-toggle="quote_modal"
                class="mt-5 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Quotes</button>
            <div class="relative h-96 flex items-center justify-center mt-5">
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
                </div>
            </div>
        </div>
        <button id="content-button" class="bg-green-800 text-white px-4 py-2 rounded">Preview Konten Halaman Depan</button>
        <div id="content-container" class="hidden mt-2 animate__animated animate__fadeIn animate__faster">
            <section class="bg-gray-700">
                <button type="button" data-modal-target="content-modal" data-modal-toggle="content-modal"
                    class=" m-6 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Edit
                    konten</button>
                <!-- First Section -->
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 flex flex-col lg:flex-row-reverse items-start">
                    <div
                        class="bg-gray-700 rounded-lg border border-gray-200 shadow-2xl dark:border-gray-700 p-8 md:p-12 mb-8 lg:w-1/2 lg:mb-0 lg:ml-8">
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
                        class="bg-gray-700 shadow-2xl rounded-lg border border-gray-200 dark:border-gray-700 p-8 md:p-12 mb-8 lg:w-1/2 lg:mb-0 lg:mr-8">
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
        </div>
        <button id="preview-button" class="bg-green-800 text-white px-4 py-2 rounded">Preview Barang Halaman Depan</button>
        <div id="image-container" class="hidden mt-2 animate__animated animate__fadeIn animate__faster">
            <button type="button" data-modal-target="male-modal" data-modal-toggle="male-modal"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Tambah</button>
            <div class="w-11/12 mx-auto p-10">
                <div class="container mx-auto">
                    <h1 class="text-3xl font-bold text-center mb-8">Perlengkapan Umroh</h1>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        @foreach ($items as $item)
                            <div class="slider-item flex flex-col items-center relative">
                                <a class="delete-btn trash-button absolute top-2 right-2 flex items-center justify-center bg-black bg-opacity-50 rounded-full p-2 cursor-pointer hover:bg-white hover:text-red-700 transition text-white"
                                    data-modal-target="delete-modal" data-id="{{ $item->id }}"
                                    data-modal-toggle="delete-modal">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <div class="w-36 h-36 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                        class="w-36 h-36 rounded-full">
                                </div>
                                <p class="text-center"><b>{{ $item->caption }}</b></p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <button id="slideshow-button" class="bg-green-800 text-white px-4 py-2 rounded">Slideshow Halaman Depan</button>
        <div id="slideshow-container" class="hidden mt-2 animate__animated animate__fadeIn animate__faster">
            <button type="button" data-modal-target="slideshow-modal" data-modal-toggle="slideshow-modal"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Tambah</button>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($slideshows->sortByDesc('created_at') as $slideshow)
                    <div class="relative">
                        <img class="h-auto max-w-full rounded-lg" src="{{ Storage::url($slideshow->image) }}"
                            alt="">
                        <a class="delete-btn-slide trash-button absolute top-2 right-2 flex items-center justify-center bg-black bg-opacity-50 rounded-full p-2 cursor-pointer hover:bg-white hover:text-red-700 transition text-white"
                            data-modal-target="delete-modal-slide" data-id="{{ $slideshow->id }}"
                            data-modal-toggle="delete-modal-slide">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <h2 class="text-xl font-semibold mb-5">Video Profil / Intro</h2>
    <button id="change-embed-button"
        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        Change or Add Embed
    </button>

    <form action="/admin/config/update/{{ $configs->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- EMBED --}}

        <div class="flex flex-col items-center space-y-4">
            <div id="embed-preview" class="w-full max-w-md p-4 bg-gray-100 border border-gray-300 rounded-md">
                <iframe id="embed-frame" class="w-full h-60 border-none" src="{{ $configs->embed }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>


        <!-- content modal -->
        <div id="content-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
            class="animate__animated animate__fadeIn animate__faster hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Konten
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="content-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="input-group">
                            <div class="mb-2">
                                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Judul Konten
                                    1</label>
                                <input type="text" id="small-input" name="title_info"
                                    placeholder="Masukkan Judul Konten"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                    @if ($configs->title_info) value="{{ $configs->title_info }}" @endif>
                            </div>
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Konten 1</label>
                            <textarea id="message" rows="9"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis konten..." name="info">
                            @if ($configs->info)
{{ $configs->info }}
@endif
                            </textarea>
                            <input accept="image/*" name="img_info"
                                class="mt-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file_input_item"
                                type="file">
                            <div class="preview_item mt-2">
                                @if ($configs->img_info)
                                    <img src="{{ Storage::url($configs->img_info) }}" alt=""
                                        class="max-w-s max-h-64 rounded-lg">
                                @endif
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="mb-2">
                                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Judul Konten
                                    2</label>
                                <input type="text" id="small-input" name="title_info2"
                                    placeholder="Masukkan Judul Konten"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                    @if ($configs->title_info2) value="{{ $configs->title_info2 }}" @endif>
                            </div>
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Konten 2</label>
                            <textarea id="message" rows="9"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis konten..." name="info2">
                            @if ($configs->info2)
{{ $configs->info2 }}
@endif
                            </textarea>
                            <input accept="image/*" name="img_info2" id="file_input_item2"
                                class="mt-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file_input_item"
                                type="file">
                            <div class="preview_item2 mt-2" id="preview_item2">
                                <!-- Image preview will be inserted here -->
                                @if ($configs->img_info2)
                                    <img src="{{ Storage::url($configs->img_info2) }}" alt=""
                                        class="max-w-s max-h-64 rounded-lg">
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button data-modal-hide="content-modal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Edit</button>
                        <button data-modal-hide="content-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumbotron modal -->
        <div id="jumbotron-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
            class="animate__animated animate__fadeIn animate__faster hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">

                        <h3 class="text-xl font-semibold text-gray-900">
                            Jumbotron
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="jumbotron-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <input accept="image/*" name="img_jumbotron"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="file_input_item" type="file">
                        <div id="preview_item" class="mt-2">
                            <!-- Image preview will be inserted here -->
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button data-modal-hide="jumbotron-modal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Upload</button>
                        <button data-modal-hide="jumbotron-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- kontak modal -->
        <div id="quote_modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
            class="animate__animated animate__fadeIn animate__faster hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Kontak
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="quote_modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <input accept="image/*" name="img_quote"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="file_input_item3" type="file">
                        <div id="preview_item3" class="mt-2">
                            <!-- Image preview will be inserted here -->
                            @if ($configs->img_quote)
                                <img src="{{ Storage::url($configs->img_quote) }}" alt=""
                                    class="max-w-xs max-h-64 rounded-lg">
                            @endif
                        </div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Quotes</label>
                        <textarea id="message" rows="4" name="quote"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Isi Quotes anda disini...">
@if ($configs->quote)
{{ $configs->quote }}
@endif
</textarea>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button data-modal-hide="quote_modal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Upload</button>
                        <button data-modal-hide="quote_modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Embed URL Modal --}}
        <div id="embed-modal" data-modal-backdrop="static"
            class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded-md shadow-lg w-full max-w-sm">
                <h2 class="text-lg font-semibold mb-4">Insert Embed Link</h2>
                <input id="embed-url-input" type="text" placeholder="Enter YouTube URL" onchange="EmbedUrl()"
                    class="w-full p-2 border border-gray-300 rounded-md mb-4">
                <input type="hidden" name="embed" id="embed_upload">
                <div class="flex justify-end space-x-2">
                    <button id="submit-embed-url" type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Submit
                    </button>
                    <button id="close-embed-modal"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50">
                        Cancel
                    </button>
                </div>
            </div>
        </div>

        {{-- END EMBED --}}

        <div class="grid grid-cols-2 md:grid-cols-2 gap-6 mb-8 mt-8">
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fa-solid fa-paper-plane"></i>
                </div>
                <h2 class="text-xl font-semibold mb-5">Visi</h2>
                <textarea
                    class="block transition p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Write your thoughts here..." rows="9" name="visi">{{ $configs->visi }}</textarea>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fa-solid fa-paper-plane"></i>
                </div>
                <h2 class="text-xl font-semibold mb-5">Misi</h2>
                <textarea
                    class="block transition p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Write your thoughts here..." rows="9" name="misi">{{ $configs->misi }}</textarea>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fa-solid fa-paper-plane"></i>
                </div>
                <h2 class="text-xl font-semibold mb-5">Sejarah</h2>
                <textarea
                    class="block transition p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Write your thoughts here..." rows="9" name="history">{{ $configs->history }}</textarea>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fa-solid fa-paper-plane"></i>
                </div>
                <h2 class="text-xl font-semibold mb-5">Link Map</h2>
                <textarea
                    class="block transition p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Write your thoughts here..." rows="9" name="map">{{ $configs->map }}</textarea>
                <p class="mt-2 hover:underline text-blue-700"><a href="https://imgur.com/a/ochLoi2">Tutorial Mengambil
                        Link
                        Map</a></p>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h2 class="text-xl font-semibold mb-5">Alamat</h2>
                <textarea
                    class="block transition p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Write your thoughts here..." rows="3" name="address">{{ $configs->address }}</textarea>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <h2 class="text-xl font-semibold mb-5">Jam Operasional</h2>
                <textarea
                    class="block transition p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Write your thoughts here..." rows="3" name="operational">{{ $configs->operational }}</textarea>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fas fa-envelope"></i>
                </div>
                <h2 class="text-xl font-semibold">G-Mail</h2>
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900">Your
                    Email</label>
                <div class="relative mb-6">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 16">
                            <path
                                d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                            <path
                                d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                        </svg>
                    </div>
                    <input type="text" id="input-group-1"
                        class="bg-gray-50 border transition border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                        placeholder="name@flowbite.com" value="{{ $configs->gmail }}" name="gmail">
                </div>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h2 class="text-xl font-semibold">WhatsApp 1</h2>
                <label for="phone-input" class="block mb-2 text-sm font-medium text-gray-900">Phone
                    number:</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 19 18">
                            <path
                                d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                        </svg>
                    </div>
                    <input type="number" id="phone-input" aria-describedby="helper-text-explanation"
                        class="transition bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                        placeholder="123-456-7890" value="0{{ $configs->whatsapp_num }}" required name="whatsapp_num" />
                </div>
                <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500">Select a phone number
                    that matches the format.</p>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h2 class="text-xl font-semibold">WhatsApp 2</h2>
                <label for="phone-input" class="block mb-2 text-sm font-medium text-gray-900">Phone
                    number:</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 19 18">
                            <path
                                d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                        </svg>
                    </div>
                    <input type="number" id="phone-input" aria-describedby="helper-text-explanation"
                        class="transition bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                        placeholder="123-456-7890" value="0{{ $configs->whatsapp_num }}" required name="whatsapp_num" />
                </div>
                <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500">Select a phone number
                    that matches the format.</p>
            </div>

            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fab fa-facebook"></i>
                </div>
                <h2 class="text-xl font-semibold">Facebook</h2>
                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </span>
                    <input type="text" id="website-admin"
                        class="rounded-none transition rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 "
                        placeholder="@elonmusk" value="{{ $configs->facebook }}" name="facebook">
                </div>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fab fa-youtube"></i>
                </div>
                <h2 class="text-xl font-semibold">Youtube</h2>
                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </span>
                    <input type="text" id="website-admin"
                        class="rounded-none transition rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 "
                        placeholder="@elonmusk" value="{{ $configs->youtube }}" name="youtube">
                </div>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fab fa-instagram"></i>
                </div>
                <h2 class="text-xl font-semibold">Instagram</h2>
                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </span>
                    <input type="text" id="website-admin"
                        class="rounded-none transition rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 "
                        placeholder="@elonmusk" value="{{ $configs->instagram }}" name="instagram">
                </div>
            </div>
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fab fa-tiktok"></i>
                </div>
                <h2 class="text-xl font-semibold">Tiktok</h2>
                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </span>
                    <input type="text" id="website-admin"
                        class="rounded-none transition rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 "
                        placeholder="@elonmusk" value="{{ $configs->tiktok }}" name="tiktok">
                </div>

            </div>

        </div>
        <button type="submit"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 transition">Simpan
            perubahan</button>
    </form>
    <!-- Male modal -->
    <div id="male-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
        class="animate__animated animate__fadeIn animate__faster hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">

                    <h3 class="text-xl font-semibold text-gray-900">
                        Tambah barang
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="male-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="/admin/config/items" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <div>
                            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Barang</label>
                            <input type="text" id="small-input" name="name"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <input accept="image/*" name="image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="file_input_item" type="file">
                        <div id="preview_item" class="mt-2">
                            <!-- Image preview will be inserted here -->
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button data-modal-hide="male-modal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Upload</button>
                        <button data-modal-hide="male-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Slideshow modal -->
    <div id="slideshow-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
        class="animate__animated animate__fadeIn animate__faster hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Tambah gambar slideshow
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="slideshow-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="/admin/config/slideshow" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <label for="file_input_slide" class="block mb-2 text-sm font-medium text-gray-900">Tambah
                            gambar</label>
                        <input accept="image/*" name="image[]"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="file_input_slide" type="file" multiple>
                        <div id="preview_slide" class="mt-2 space-y-2">
                            <!-- Image previews will be inserted here -->
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button data-modal-hide="slideshow-modal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Upload</button>
                        <button data-modal-hide="slideshow-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete modal -->
    <div id="delete-modal" aria-hidden="true" data-modal-backdrop="static"
        class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Hapus
                    </h3>
                    <button type="button"
                        class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="delete-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p>Apakah anda yakin untuk menghapus data ini?</p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <a class="text-white transition bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        id="deleteButton">Hapus</a>
                    <button data-modal-hide="delete-modal" type="button"
                        class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div id="delete-modal-slide" aria-hidden="true" data-modal-backdrop="static"
        class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Hapus
                    </h3>
                    <button type="button"
                        class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="delete-modal-slide">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p>Apakah anda yakin untuk menghapus data ini?</p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <a class="text-white transition bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        id="deleteButtonSlide">Hapus</a>
                    <button data-modal-hide="delete-modal-slide" type="button"
                        class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                var configId = $(this).data('id');
                var deleteUrl = '/admin/config/item/delete/' + configId;
                $('#deleteButton').attr('href', deleteUrl);
            });

            $('.delete-btn-slide').click(function() {
                var configId = $(this).data('id');
                var deleteUrl = '/admin/config/slideshow/delete/' + configId;
                $('#deleteButtonSlide').attr('href', deleteUrl);
            });

            function readURL(input, previewElement) {
                if (input.files) {
                    for (let i = 0; i < input.files.length; i++) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            let img = $('<img>').attr('src', e.target.result).addClass(
                                'max-w-xs max-h-64 rounded-lg');
                            $(previewElement).append(img);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }

            $('#file_input_item').change(function() {
                $('#preview_item').empty(); // Clear previous images
                readURL(this, '#preview_item');
            });

            $('#file_input_item2').change(function() {
                $('#preview_item2').empty(); // Clear previous images
                readURL(this, '#preview_item2');
            });

            $('#file_input_item2').change(function() {
                $('#preview_item2').empty(); // Clear previous images
                readURL(this, '#preview_item2');
            });

            $('#file_input_slide').change(function() {
                $('#preview_slide').empty(); // Clear previous images
                readURL(this, '#preview_slide');
            });
        });

        let currentIndex = 0;

        document.getElementById('change-embed-button').addEventListener('click', function() {
            document.getElementById('embed-modal').classList.remove('hidden');
        });

        document.getElementById('close-embed-modal').addEventListener('click', function() {
            document.getElementById('embed-modal').classList.add('hidden');
        });

        function EmbedUrl() {
            const url = document.getElementById('embed-url-input').value;
            const videoId = url.split('v=')[1]?.split('&')[0];
            if (videoId) {
                const embedUrl = `https://www.youtube.com/embed/${videoId}`;
                document.getElementById('embed-frame').src = embedUrl;
                document.getElementById('embed_upload').value = embedUrl;
            } else {
                alert('Invalid YouTube URL');
            }
        };

        document.addEventListener('DOMContentLoaded', () => {
            const previewButton = document.getElementById('preview-button');
            const imageContainer = document.getElementById('image-container');

            const slideButton = document.getElementById('slideshow-button');
            const slideContainer = document.getElementById('slideshow-container');

            const contentButton = document.getElementById('content-button');
            const contentContainer = document.getElementById('content-container');

            const backgroundButton = document.getElementById('background-button');
            const backgroundContainer = document.getElementById('background-container');

            let previewOpen = 'no'
            let slideOpen = 'no'
            let contentOpen = 'no'
            let backgroundOpen = 'no'

            slideButton.addEventListener('click', () => {
                if (slideOpen == 'no') {
                    slideContainer.classList.remove('hidden');
                    slideOpen = 'yes';
                } else if (slideOpen == 'yes') {
                    slideContainer.classList.add('hidden');
                    slideOpen = 'no'
                }
            });

            previewButton.addEventListener('click', () => {
                if (previewOpen == 'no') {
                    imageContainer.classList.remove('hidden');
                    previewOpen = 'yes';
                } else if (previewOpen == 'yes') {
                    imageContainer.classList.add('hidden');
                    previewOpen = 'no'
                }
            });

            contentButton.addEventListener('click', () => {
                if (contentOpen == 'no') {
                    contentContainer.classList.remove('hidden');
                    contentOpen = 'yes';
                } else if (contentOpen == 'yes') {
                    contentContainer.classList.add('hidden');
                    contentOpen = 'no';
                }
            })

            backgroundButton.addEventListener('click', () => {
                if (backgroundOpen == 'no') {
                    backgroundContainer.classList.remove('hidden');
                    backgroundOpen = 'yes';
                } else if (backgroundOpen == 'yes') {
                    backgroundContainer.classList.add('hidden');
                    backgroundOpen = 'no';
                }
            });

            setInterval(slideRight, 3000);
        });

        function previewImage(event) {
            const input = event.target;
            const previewContainer = input.nextElementSibling;

            // Clear previous preview
            previewContainer.innerHTML = '';

            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('max-w-xs', 'max-h-64', 'rounded-lg');
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        }

        // Add event listener to the initial file input
        document.querySelector('.file_input_item').addEventListener('change', function(event) {
            previewImage(event);
        });
    </script>
@endsection
