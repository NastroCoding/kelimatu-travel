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
    <h1 class="text-3xl">Aktifitas</h1>
    <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button"
        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 transition mb-2 focus:outline-none">Tambah
        Aktifitas</button>
    <div class="mx-auto grid grid-cols-2 gap-4 items-center mb-10">
        @foreach ($activities as $activity)
            @php
                $images = json_decode($activity->image, true);
            @endphp
            <div class="max-w-xl bg-white border border-white rounded-lg shadow-xl mb-5">
                <div id="gallery-{{ $activity->id }}" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        @if (is_array($images) && !empty($images))
                            @foreach ($images as $index => $image)
                                <div class="hidden duration-700 ease-in-out @if ($index == 0) active @endif"
                                    data-carousel-item>
                                    <img src="{{ asset('storage/' . $image) }}"
                                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="Activity Image {{ $index + 1 }}">
                                </div>
                            @endforeach
                        @else
                            <div class="duration-700 ease-in-out active" data-carousel-item>
                                <img src="https://via.placeholder.com/600x400?text=No+Image+Available"
                                    class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="No Image Available">
                            </div>
                        @endif
                    </div>
                    @if (is_array($images) && count($images) > 1)
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    @endif
                </div>

                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{ $activity->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">{{ $activity->description }}</p>
                    <div class="flex justify-between">
                        <p class="mb-3 font-normal text-xs text-gray-700">Ditulis Oleh: {{ $activity->trademark }}
                        </p>
                        <p class="mb-3 font-normal text-xs text-gray-700">
                            {{ \Carbon\Carbon::parse($activity->date)->format('d F Y') }}</p>
                    </div>

                    <button href="#" data-modal-target="edit-modal{{ $activity->id }}"
                        data-modal-toggle="edit-modal{{ $activity->id }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Edit
                    </button>
                    <a href="#" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                        data-id="{{ $activity->id }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center 
                        text-white bg-red-700 hover:bg-red-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 delete-btn">
                        Delete
                    </a>
                    <a href="/activity/{{ $activity->slug }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 hover:bg-green-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Preview
                    </a>
                </div>
            </div>
        @endforeach

        <!-- Add more cards as needed -->
    </div>
    @foreach ($activities as $activity)
        @php
            $images = json_decode($activity->image, true);
        @endphp
        <!-- Edit modal -->
        <div id="edit-modal{{ $activity->id }}" aria-hidden="true" data-modal-backdrop="static"
            class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Edit Aktifitas
                        </h3>
                        <button type="button"
                            class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="edit-modal{{ $activity->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Tutup</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form id="edit-activity-form-{{ $activity->id }}" method="post"
                        action="/admin/activity/edit/{{ $activity->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input_edit">Upload
                                    foto</label>
                                <input
                                    class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                    id="file_input_edit" name="image[]" type="file" accept="image/*" multiple>
                                <span class="text-red-700 text-sm font-medium">* disarankan foto dengan aspek rasio
                                    16:9</span><br>
                                <span class="text-red-700 text-sm font-medium">* upload maksimal 3 foto</span>
                                <div id="image_preview_edit" class="mt-4 w-3/5 rounded-lg">
                                    @if ($activity->image)
                                        @foreach (json_decode($activity->image, true) as $image)
                                            <div class="relative mb-2 inline-block">
                                                <img src="{{ asset('storage/' . $image) }}" width="100">
                                                <button type="button" data-image-path="{{ $image }}"
                                                    class="delete-image-button absolute top-0 right-0 bg-red-500 text-white rounded-full px-2 py-1">X</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul
                                    Aktifitas<span class="text-red-700">*</span></label>
                                <input type="text" id="judul" name="title"
                                    placeholder="Masukkan Judul Aktifitas"
                                    class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $activity->title }}" required />
                            </div>
                            <div class="mb-5">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi
                                    Aktifitas<span class="text-red-700">*</span></label>
                                <textarea id="message" rows="4" name="description"
                                    class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan Deskripsi Aktifitas" required>{{ $activity->description }}</textarea>
                            </div>
                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Topik<span
                                        class="text-red-700">*</span></label>
                                <input type="text" name="topic_title" placeholder="Masukkan Judul Topik"
                                    class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $activity->topic_title }}" required />
                                <label class="block my-2 text-sm font-medium text-gray-900">Subtopik</label>
                                <input type="text" name="topic_subtopic" placeholder="Masukkan Subtopik"
                                    class="mb-1 transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $activity->topic_subtitle }}" required />
                                <label class="block my-2 text-sm font-medium text-gray-900">Deskripsi Topik</label>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Topik</label>
                                <div id="editor-container-edit-{{ $activity->id }}"
                                    class="h-40 bg-gray-50 border border-gray-300 rounded-lg mb-5">{!! $activity->topic_description !!}
                                </div>
                                <input type="hidden" name="topic_description"
                                    id="hidden-description-edit-{{ $activity->id }}" />
                            </div>
                            <div class="flex justify-between mt-5">
                                <div class="mb-5">
                                    <label for="penulis"
                                        class="block mb-2 text-sm font-medium text-gray-900">Penulis</label>
                                    <input type="text" id="penulis" name="author" placeholder="Masukkan Nama"
                                        class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ $activity->trademark }}" required />
                                </div>
                                <div class="mb-5">
                                    <label for="tanggal"
                                        class="block mb-2 text-sm font-medium text-gray-900">Tanggal<span
                                            class="text-red-700">*</span></label>
                                    <input type="date" id="tanggal" name="date" placeholder="Masukkan Tanggal"
                                        class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ $activity->date }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                            <button type="submit"
                                class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>
                            <button data-modal-hide="edit-modal{{ $activity->id }}" type="button"
                                class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Main modal -->
    <div id="add-modal" aria-hidden="true" data-modal-backdrop="static"
        class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Tambah Aktifitas
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
                <form id="add-activity-form" method="post" action="/admin/activity/post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input_add">Upload
                                foto</label>
                            <input
                                class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="file_input_add" name="image[]" type="file" accept="image/*" multiple>
                            <span class="text-red-700 text-sm font-medium">* disarankan foto dengan aspek rasio
                                16:9</span><br>
                            <span class="text-red-700 text-sm font-medium">* upload maksimal 3 foto</span>
                            <div id="image_preview_add" class="mt-4 hidden w-3/5 rounded-lg"></div>
                        </div>
                        <div class="mb-5">
                            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul
                                Aktifitas<span class="text-red-700">*</span></label>
                            <input type="text" id="judul" name="title" placeholder="Masukkan Judul Aktifitas"
                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi
                                Aktifitas<span class="text-red-700">*</span></label>
                            <textarea id="message" rows="4" name="description"
                                class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan Deskripsi Aktifitas"></textarea>
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Topik<span
                                    class="text-red-700">*</span></label>
                            <input type="text" name="topic_title" placeholder="Masukkan Judul Topik"
                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                            <label class="block my-2 text-sm font-medium text-gray-900">Subtopik</label>
                            <input type="text" name="topic_subtopic" placeholder="Masukkan Subtopik"
                                class="mb-1 transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                            <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Topik</label>
                            <div id="editor-container-add" class="h-40 bg-gray-50 border border-gray-300 rounded-lg mb-5">
                            </div>
                            <input type="hidden" name="topic_description" id="hidden-description-add" />
                        </div>
                        <div class="flex justify-between mt-5">
                            <div class="mb-5">
                                <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900">Penulis</label>
                                <input type="text" id="penulis" name="author" placeholder="Masukkan Nama"
                                    class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required />
                            </div>
                            <div class="mb-5">
                                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal<span
                                        class="text-red-700">*</span></label>
                                <input type="date" id="tanggal" name="date" placeholder="Masukkan Tanggal"
                                    class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required />
                            </div>
                        </div>
                    </div>
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
                    <a class="text-white transition bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        id="deleteButton">Hapus</a>
                    <button data-modal-hide="delete-modal" type="button"
                        class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                var teamId = $(this).data('id');
                var deleteUrl = '/admin/activity/delete/' + teamId;
                $('#deleteButton').attr('href', deleteUrl);
            });

            $("#file_input_add").on("change", function() {
                const files = $("#file_input_add")[0].files;
                const previewContainer = $("#image_preview_add");
                const warningMessage = $("#file_warning");

                if (files.length > 3) {
                    previewContainer.addClass('hidden');
                    warningMessage.removeClass('hidden');
                    alert("You can select only 3 images");
                    $(this).val(''); // Clear the file input
                } else {
                    warningMessage.addClass('hidden');
                    previewContainer.html('');
                    if (files.length > 0) {
                        previewContainer.removeClass('hidden');
                        Array.from(files).forEach(file => {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const img = $('<img>').attr('src', e.target.result).addClass(
                                    'w-full rounded-lg mb-4');
                                previewContainer.append(img);
                            }
                            reader.readAsDataURL(file);
                        });
                        $("#imageUploadForm").submit(); // Submit the form if 3 or fewer files are selected
                    } else {
                        previewContainer.addClass('hidden');
                    }
                }
            });

            $("#file_input_edit").on("change", function() {
                const files = $("#file_input_edit")[0].files;
                const previewContainer = $("#image_preview_edit");
                const warningMessage = $("#file_warning_edit");

                if (files.length > 3) {
                    previewContainer.addClass('hidden');
                    warningMessage.removeClass('hidden');
                    alert("You can select only 3 images");
                    $(this).val(''); // Clear the file input
                } else {
                    warningMessage.addClass('hidden');
                    previewContainer.html('');
                    if (files.length > 0) {
                        previewContainer.removeClass('hidden');
                        Array.from(files).forEach(file => {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const img = $('<img>').attr('src', e.target.result).addClass(
                                    'w-full rounded-lg mb-4');
                                previewContainer.append(img);
                            }
                            reader.readAsDataURL(file);
                        });
                    } else {
                        previewContainer.addClass('hidden');
                    }
                }
            });

            // Initialize Quill for add form
            if (document.getElementById('editor-container-add')) {
                var quillAdd = new Quill('#editor-container-add', {
                    theme: 'snow'
                });

                document.getElementById('add-activity-form').addEventListener('submit', function() {
                    document.getElementById('hidden-description-add').value = quillAdd.root.innerHTML;
                });
            }

            @foreach ($activities as $activity)
                var quillEdit{{ $activity->id }} = new Quill('#editor-container-edit-{{ $activity->id }}', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                'header': [1, 2, false]
                            }],
                            ['bold', 'italic', 'underline'],
                            [{
                                'list': 'ordered'
                            }, {
                                'list': 'bullet'
                            }],
                            ['link', 'image']
                        ]
                    }
                });

                quillEdit{{ $activity->id }}.on('text-change', function() {
                    var htmlContent = quillEdit{{ $activity->id }}.root.innerHTML;
                    $('#hidden-description-edit-{{ $activity->id }}').val(htmlContent);
                });
            @endforeach
        });
    </script>
@endsection
