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
    <style>
        #loading {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
        }

        #loading-image {
            z-index: 100;
        }
    </style>
    <div id="loading">
        <div id="loading-image" class="flex items-center justify-center w-56 h-56 rounded-lg">
            <div role="status">
                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <h1 class="text-3xl">Galeri</h1>
    <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button"
        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 transition mb-2 focus:outline-none">Tambah
        Foto</button>
    <div class="about-wrapper mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @php
                $landscapeMedia = $galleries->filter(function ($gallery) {
                    return !$gallery->isPortrait();
                });

                $portraitMedia = $galleries->filter(function ($gallery) {
                    return $gallery->isPortrait();
                });
            @endphp

            @foreach ($landscapeMedia->sortByDesc('created_at') as $gallery)
                <div class="relative bg-gray-200 shadow-lg rounded-lg overflow-hidden">
                    <a href="#" class="open-modal" data-media="{{ Storage::url($gallery->media) }}"
                        data-type="{{ in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']) ? 'image' : 'video' }}">
                        @if (in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']))
                            <img class="h-auto max-w-full rounded-t-lg lazyload" src="{{ Storage::url($gallery->media) }}"
                                alt="">
                        @else
                            <video class="h-auto max-w-full rounded-t-lg" controls>
                                <source src="{{ Storage::url($gallery->media) }}"
                                    type="video/{{ pathinfo($gallery->media, PATHINFO_EXTENSION) }}">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                        <a class="delete-btn trash-button absolute top-2 right-2 flex items-center justify-center bg-black bg-opacity-50 rounded-full p-2 cursor-pointer hover:bg-white hover:text-red-700 transition text-white"
                            data-modal-target="delete-modal" data-id="{{ $gallery->id }}" data-modal-toggle="delete-modal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </a>
                    @if (!empty($gallery->description))
                        <div class="p-4">
                            <p class="text-sm text-gray-600">{{ $gallery->description }}</p>
                        </div>
                    @endif
                </div>
            @endforeach

            @foreach ($portraitMedia->sortByDesc('created_at') as $gallery)
                <div class="relative bg-gray-200 shadow-lg rounded-lg overflow-hidden">
                    <a href="#" class="open-modal" data-media="{{ Storage::url($gallery->media) }}"
                        data-type="{{ in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']) ? 'image' : 'video' }}">
                        @if (in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']))
                            <img class="h-auto max-w-full rounded-t-lg lazyload" src="{{ Storage::url($gallery->media) }}"
                                alt="">
                        @else
                            <video class="h-auto max-w-full rounded-t-lg" controls>
                                <source src="{{ Storage::url($gallery->media) }}"
                                    type="video/{{ pathinfo($gallery->media, PATHINFO_EXTENSION) }}">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                        <a class="delete-btn trash-button absolute top-2 right-2 flex items-center justify-center bg-black bg-opacity-50 rounded-full p-2 cursor-pointer hover:bg-white hover:text-red-700 transition text-white"
                            data-modal-target="delete-modal" data-id="{{ $gallery->id }}"
                            data-modal-toggle="delete-modal">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </a>
                    @if (!empty($gallery->description))
                        <div class="p-4">
                            <p class="text-sm text-gray-600">{{ $gallery->description }}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>



    <!-- Main modal -->
    <div id="add-modal" aria-hidden="true" data-modal-backdrop="static"
        class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Tambah Foto
                    </h3>
                    <button type="button"
                        class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="add-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="uploadForm" method="post" action="/admin/gallery/post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input_add">
                                Upload foto
                            </label>
                            <input
                                class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="file_input_add" name="media[]" type="file" accept="image/*,video/*" multiple>
                            <span class="text-red-700 text-sm font-medium">* disarankan foto dengan resolusi yang
                                sama</span>
                            <div id="image_previews_add" class="mt-4 flex flex-wrap gap-2 md:flex"></div>
                        </div>
                        <div class="mb-5">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                            <input type="text" id="description" name="description"
                                placeholder="Deskripsi kecil ... Contoh : Masjid Nabawi 17/8/24"
                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                            <span class="text-red-700 text-sm font-medium">* opsional</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                            <div id="progressBar" class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button type="submit"
                            class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah</button>
                        <button data-modal-hide="add-modal" type="button"
                            class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
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
                    <a class=" text-white transition bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        id="deleteButton">Hapus</a>
                    <button data-modal-hide="delete-modal" type="button"
                        class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(window).on('load', function() {
            $('#loading').hide();
        })
        $(document).ready(function() {

            $('#uploadForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function(e) {
                            if (e.lengthComputable) {
                                var percentComplete = e.loaded / e.total * 100;
                                $('#progressBar').css('width', percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    type: 'POST',
                    url: '/admin/gallery/post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#progressBar').css('width', '0%');
                        window.location.reload();
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('An error occurred during the upload: ' + textStatus);
                        console.error('Error:', errorThrown);
                        $('#progressBar').css('width', '0%');
                    }
                });
            });

            $('.delete-btn').click(function() {
                var teamId = $(this).data('id');
                var deleteUrl = '/admin/gallery/delete/' + teamId;
                $('#deleteButton').attr('href', deleteUrl);
            });

            function handleFileInputChange(event, previewContainerId) {
                const files = event.target.files;
                const previewContainer = document.getElementById(previewContainerId);
                previewContainer.innerHTML = ''; // Clear previous previews

                for (const file of files) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        let mediaElement;

                        if (file.type.startsWith('image/')) {
                            mediaElement = document.createElement('img');
                            mediaElement.src = e.target.result;
                            mediaElement.classList.add('w-3/5', 'rounded-lg');
                        } else if (file.type.startsWith('video/')) {
                            mediaElement = document.createElement('video');
                            mediaElement.src = e.target.result;
                            mediaElement.controls = true;
                            mediaElement.classList.add('w-3/5', 'rounded-lg');
                        }

                        previewContainer.appendChild(mediaElement);
                    };
                    reader.readAsDataURL(file);
                }
            }

            document.getElementById('file_input_add').addEventListener('change', function(event) {
                handleFileInputChange(event, 'image_previews_add');
            });
        });
    </script>
@endsection
