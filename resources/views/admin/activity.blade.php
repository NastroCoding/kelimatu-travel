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
    <div class="flex justify-center">
        <div class="md:grid gap-4 my-10 w-11/12">
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @foreach ($activities->sortByDesc('created_at') as $activity)
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
                                <input type="text" id="judul" name="title" placeholder="Masukkan Judul Aktifitas"
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
                        $("#imageUploadForm").submit();
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

            // Function to initialize Quill with YouTube embed support
            function initializeQuill(selector) {
                return new Quill(selector, {
                    theme: 'snow',
                    modules: {
                        toolbar: {
                            container: [
                                [{
                                    'header': [1, 2, false]
                                }],
                                ['bold', 'italic', 'underline'],
                                [{
                                    'list': 'ordered'
                                }, {
                                    'list': 'bullet'
                                }],
                                ['link', 'image', 'video'] // Enable video embed button
                            ],
                            handlers: {
                                'video': function() {
                                    const url = prompt('Enter YouTube URL:');
                                    if (url) {
                                        const videoId = getYouTubeVideoId(url);
                                        if (videoId) {
                                            const embedUrl = `https://www.youtube.com/embed/${videoId}`;
                                            const range = this.quill.getSelection();
                                            this.quill.insertEmbed(range.index, 'video', embedUrl);
                                        } else {
                                            alert('Invalid YouTube URL');
                                        }
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Function to extract YouTube video ID from URL
            function getYouTubeVideoId(url) {
                const regex =
                    /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
                const matches = url.match(regex);
                return matches ? matches[1] : null;
            }

            // Initialize Quill for add form
            if (document.getElementById('editor-container-add')) {
                var quillAdd = initializeQuill('#editor-container-add');

                document.getElementById('add-activity-form').addEventListener('submit', function() {
                    document.getElementById('hidden-description-add').value = quillAdd.root.innerHTML;
                });
            }

            // Initialize Quill for each edit form
            @foreach ($activities as $activity)
                var quillEdit{{ $activity->id }} = initializeQuill('#editor-container-edit-{{ $activity->id }}');

                quillEdit{{ $activity->id }}.on('text-change', function() {
                    var htmlContent = quillEdit{{ $activity->id }}.root.innerHTML;
                    $('#hidden-description-edit-{{ $activity->id }}').val(htmlContent);
                });
            @endforeach

        });
    </script>
@endsection
