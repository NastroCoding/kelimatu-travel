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
    <h1 class="text-3xl">Testimoni</h1>
    <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button"
        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 transition mb-2 focus:outline-none">Tambah
        Testimoni</button>

    <!-- Main modal -->
    <div id="add-modal" aria-hidden="true" data-modal-backdrop="static"
        class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Tambah Testimoni
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
                <form method="post" action="/admin/testimony/post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                                foto</label>
                            <input
                                class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="file_input" name="image" type="file" accept="image/*">
                                <span class="text-red-700 text-sm font-medium">* disarankan foto dengan aspek rasio 4:3 atau 1:1</span>
                            <img id="image_preview" class="mt-4 hidden w-3/5 rounded-lg" />
                        </div>
                        <div class="mb-5">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama <span
                                    class="text-red-700">*</span></label>
                            <input type="text" id="nama" name="name" placeholder="Masukkan Nama"
                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="caption" class="block mb-2 text-sm font-medium text-gray-900 ">Caption</label>
                            <input type="text" id="caption" name="caption"
                                placeholder="Masukkan Caption, contoh : Influencer"
                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>
                        <div class="mb-5">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Testimoni <span
                                    class="text-red-700">*</span></label>
                            <textarea id="message" rows="4" name="description"
                                class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan Testimoni"></textarea>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button type="submit"
                            class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                            Testimoni</button>
                        <button data-modal-hide="add-modal" type="button"
                            class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
        <!-- Testimonial Card 3 -->
        @foreach ($testimonials->sortByDesc('created_at') as $testimony)
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-gray-200 mb-4">
                    <img src="{{ $testimony->image ? Storage::url($testimony->image) : 'https://via.placeholder.com/100' }}"
                        alt="" class="w-full h-full object-cover">
                </div>
                <h3 class="font-semibold">{{ $testimony->name }}</h3>
                <p class="text-gray-500">{{ $testimony->caption }}</p>
                <div class="text-2xl text-gray-500 mb-4">
                    <i class="fas fa-quote-left"></i>
                </div>
                <p class="text-gray-700 mb-4">
                    {{ $testimony->description }}
                </p>
                <div class="flex mt-4 md:mt-6">
                    <button href="#" data-modal-target="edit-modal-{{ $testimony->id }}"
                        data-modal-toggle="edit-modal-{{ $testimony->id }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition">Edit</button>
                    <a href="#" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                        data-id="{{ $testimony->id }}"
                        class="delete-btn py-2 px-4 ms-2 text-sm font-medium text-white focus:outline-none bg-red-700 rounded-lg border border-gray-200 hover:bg-red-800 focus:z-10 focus:ring-4 focus:ring-gray-100 transition">Hapus</a>
                </div>
            </div>

            <!-- Edit modal -->
        @endforeach
    </div>
    @foreach ($testimonials as $testimony)
        <div id="edit-modal-{{ $testimony->id }}" aria-hidden="true" data-modal-backdrop="static"
            class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Edit Testimoni
                        </h3>
                        <button type="button"
                            class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="edit-modal-{{ $testimony->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Tutup</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="post" action="/admin/testimony/update/{{ $testimony->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                                    foto</label>
                                <input
                                    class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                    id="file_input" name="image" type="file" accept="image/*">
                                <input type="hidden" name="old_image" value="{{ $testimony->image }}">
                                <img id="image_preview" class="mt-4 w-3/5 rounded-lg"
                                    src="{{ Storage::url($testimony->image) }}" />
                                <span class="text-red-700 text-sm font-medium">* disarankan foto dengan aspek rasio 4:3 atau 1:1</span>
                            </div>
                            <div class="mb-5">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama <span
                                        class="text-red-700">*</span></label>
                                <input type="text" id="nama" name="name" placeholder="Masukkan Nama"
                                    class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required value="{{ $testimony->name }}" />
                            </div>
                            <div class="mb-5">
                                <label for="caption"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Caption</label>
                                <input type="text" id="caption" name="caption"
                                    placeholder="Masukkan Caption, contoh : Influencer" value="{{ $testimony->caption }}"
                                    class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                            </div>
                            <div class="mb-5">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Testimoni
                                    <span class="text-red-700">*</span></label>
                                <textarea id="message" rows="4" name="description"
                                    class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan Testimoni">{{ $testimony->description }}</textarea>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                            <button type="submit"
                                class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit
                                Testimoni</button>
                            <button data-modal-hide="edit-modal-{{ $testimony->id }}" type="button"
                                class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


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
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
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
                    <a type="button" id="deleteButton"
                        class="text-white transition bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Hapus</a>
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
                var deleteUrl = '/admin/testimony/delete/' + teamId;
                $('#deleteButton').attr('href', deleteUrl);
            });
        })
        document.getElementById('file_input').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('image_preview');
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
