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
    <h1 class="text-3xl">Layanan</h1>
    <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button"
        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 transition mb-2 focus:outline-none">Tambah
        Layanan</button>

    <div class="flex flex-col sm:flex-row sm:justify-evenly sm:space-x-4 space-y-4 sm:space-y-0">
        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-4">
            <!-- Card 1 -->
            @foreach ($services->sortByDesc('created_at') as $service)
                <div
                    class="bg-gradient-to-t from-gray-700 to-[#671282] border border-gray-200 rounded-lg shadow max-w-sm mx-auto sm:mx-0">
                    <img class="rounded-t-lg w-full"
                        src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}"
                        alt="" />
                    <div class="p-5">
                        <h5 class="text-2xl font-bold tracking-tight text-white text-center">{{ $service->title }}</h5>
                        <h5 class="mb-2 text-sm tracking-tight text-white text-center">{{ $service->description }}</h5>
                        <h5 class="mt-2 text-lg tracking-tight text-white text-center">Detail Paket :</h5>

                        @foreach ($details->where('service_id', $service->id) as $detail)
                            <div class="flex items-center mb-2 text-white">
                                <div class="w-6 text-center">
                                    <i class="{{ $detail->icon }} text-lg"></i>
                                </div>
                                <div class="ml-2">
                                    {{ $detail->option }}
                                </div>
                            </div>
                        @endforeach

                        <a href="#"
                            class="inline-flex justify-center w-full text-center items-center px-3 py-2 text-sm font-bold text-white bg-gray-700 shadow-xl border-2 border-gray-800 rounded-full hover:bg-[#671282] transition hover:border-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Rp {{ number_format($service->price, 0, ',', '.') }}
                        </a>
                        <div class="flex justify-center mt-4 md:mt-6">
                            <a href="#" data-modal-target="edit-modal{{ $service->id }}"
                                data-modal-toggle="edit-modal{{ $service->id }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition">Edit</a>
                            <a href="#" data-modal-target="manage-modal{{ $service->id }}"
                                data-modal-toggle="manage-modal{{ $service->id }}"
                                class="inline-flex items-center px-4 py-2 ms-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 transition">Manage</a>
                            <a href="#" data-modal-target="extralarge-modal{{ $service->id }}"
                                data-modal-toggle="extralarge-modal{{ $service->id }}"
                                class="inline-flex items-center px-4 py-2 ms-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 transition">Preview</a>
                            <a href="#" data-modal-target="delete-modal" data-id="{{ $service->id }}"
                                data-modal-toggle="delete-modal"
                                class="py-2 px-4 ms-2 text-sm font-medium text-white focus:outline-none bg-red-700 rounded-lg border border-gray-700 hover:bg-red-800 focus:z-10 focus:ring-4 focus:ring-gray-100 transition delete-btn">Hapus</a>
                        </div>
                    </div>
                </div>

                <!-- Edit modal -->
                <div id="edit-modal{{ $service->id }}" aria-hidden="true" data-modal-backdrop="static"
                    class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Edit Layanan
                                </h3>
                                <button type="button"
                                    class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                    data-modal-hide="edit-modal{{ $service->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Tutup</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form method="post" action="/admin/service/update/{{ $service->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="p-4 md:p-5 space-y-4">
                                    <div class="mb-5">
                                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                                            foto</label>
                                        <input
                                            class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                            id="file_input_edit_{{ $service->id }}" name="image" type="file"
                                            accept="image/*">
                                        <input type="hidden" name="old_image" value="{{ $service->image }}">
                                        <img id="image_preview_edit_{{ $service->id }}"
                                            src="{{ Storage::url($service->image) }}"
                                            class="mt-4 w-3/5 rounded-lg {{ $service->image ? '' : 'hidden' }}" />
                                    </div>
                                    <div class="mb-5">
                                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                            Paket
                                            <span class="text-red-700">*</span></label>
                                        <input type="text" id="title" name="title"
                                            placeholder="Masukkan Nama Paket"
                                            class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            value="{{ $service->title }}" required />
                                    </div>
                                    <div class="mb-5">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900">Deskripsi
                                            <span class="text-red-700">*</span></label>
                                        <input type="text" id="description" name="description"
                                            placeholder="Paket ini sudah termasuk... Periode dari tanggal ... sampai ..."
                                            value="{{ $service->description }}"
                                            class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                    </div>
                                    <div class="mb-5">
                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Harga
                                            <span class="text-red-700">*</span></label>
                                        <input type="number" id="price" name="price"
                                            value="{{ $service->price }}" placeholder="10000000(masukkan tanpa titik)"
                                            class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                    </div>

                                    <!-- Dynamic Options Input -->
                                    <div class="mb-5">
                                        <label for="edit-options-container-{{ $service->id }}"
                                            class="block mb-2 text-sm font-medium text-gray-900">Detail layanan</label>
                                        <div id="edit-options-container-{{ $service->id }}">
                                            @foreach ($details->where('service_id', $service->id) as $index => $detail)
                                                <div class="flex items-center mb-2">
                                                    <select class="icon-select mr-2 text-gray-900 text-sm rounded-lg p-2.5"
                                                        name="options[{{ $index }}][icon]">
                                                        <option value="fa-solid fa-plane"
                                                            {{ $detail->icon == 'fa-solid fa-plane' ? 'selected' : '' }}>✈️
                                                        </option>
                                                        <option value="fa-solid fa-hotel"
                                                            {{ $detail->icon == 'fa-solid fa-hotel' ? 'selected' : '' }}>🏨
                                                        </option>
                                                        <option value="fa-solid fa-calendar-days"
                                                            {{ $detail->icon == 'fa-solid fa-calendar-days' ? 'selected' : '' }}>
                                                            📆</option>
                                                        <option value="fa-solid fa-location-dot"
                                                            {{ $detail->icon == 'fa-solid fa-location-dot' ? 'selected' : '' }}>
                                                            📍</option>
                                                        <option value="fa-solid fa-car"
                                                            {{ $detail->icon == 'fa-solid fa-car' ? 'selected' : '' }}>🚘
                                                        </option>
                                                    </select>
                                                    <input type="hidden" name="options[{{ $index }}][id]"
                                                        value="{{ $detail->id }}">
                                                    <input type="text" name="options[{{ $index }}][option]"
                                                        placeholder="Sudah termasuk..." value="{{ $detail->option }}"
                                                        class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                                    <button type="button" onclick="removeOption(this)"
                                                        class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button"
                                            class="edit-option-btn text-white transition bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 my-1 text-center"
                                            data-service-id="{{ $service->id }}">Tambah</button>
                                    </div>

                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                    <button type="submit"
                                        class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit
                                        Layanan</button>
                                    <button data-modal-hide="edit-modal{{ $service->id }}" type="button"
                                        class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="manage-modal{{ $service->id }}" aria-hidden="true" data-modal-backdrop="static"
                    class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <form method="post" action="/admin/service/detail/add/{{ $service->id }}"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                    <h3 class="text-xl font-semibold text-gray-900">
                                        Atur Layanan
                                    </h3>
                                    <button type="button"
                                        class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="manage-modal{{ $service->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Tutup</span>
                                    </button>
                                </div>
                                <!-- Modal body -->

                                <div class="p-4 md:p-5 space-y-4">
                                    @php
                                        $serviceDetail = $service_details->where('service_id', $service->id)->first();
                                    @endphp

                                    <div class="mb-5">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                                            Deskripsi Tambahan Paket Layanan :</label>
                                        <textarea name="description" rows="2" id="description"
                                            class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Deskripsi Tambahan ... (dapat dikosongkan)">{{ $serviceDetail->description ?? '' }}</textarea>
                                    </div>
                                    <div class="mb-5">
                                        <label for="guider" class="block mb-2 text-sm font-medium text-gray-900">
                                            Nama Tour Leader :</label>
                                        <input type="text" name="guider" id="guider"
                                            class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Masukkan Nama" value="{{ $serviceDetail->guider ?? '' }}">
                                    </div>


                                    <!-- Dynamic Options Input -->
                                    <div class="mb-5">
                                        <label for="manage-options-container-{{ $service->id }}"
                                            class="block mb-2 text-sm font-medium text-gray-900">Harga <b
                                                class="font-bold">sudah</b>
                                            Termasuk :
                                            <span class="text-red-700">*</span></label>
                                        <div id="manage-options-container-{{ $service->id }}">
                                            <!-- Existing options will be here -->
                                            @php
                                                $includedIndex = 0;
                                                $excludedIndex = 0;
                                            @endphp

                                            @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                                @foreach ($all_details->where('type', '=', 'included')->where('service_detail_id', $service_detail->id) as $all_detail)
                                                    <div class="flex items-start mb-2">
                                                        <select
                                                            class="icon-select mr-2 text-gray-900 text-sm rounded-lg p-2.5"
                                                            name="included[{{ $includedIndex }}][icon]">
                                                            <option value="fa-solid fa-plane"
                                                                {{ $all_detail->icon == 'fa-solid fa-plane' ? 'selected' : '' }}>
                                                                ✈️</option>
                                                            <option value="fa-solid fa-hotel"
                                                                {{ $all_detail->icon == 'fa-solid fa-hotel' ? 'selected' : '' }}>
                                                                🏨</option>
                                                            <option value="fa-solid fa-calendar-days"
                                                                {{ $all_detail->icon == 'fa-solid fa-calendar-days' ? 'selected' : '' }}>
                                                                📆</option>
                                                            <option value="fa-solid fa-location-dot"
                                                                {{ $all_detail->icon == 'fa-solid fa-location-dot' ? 'selected' : '' }}>
                                                                📍</option>
                                                            <option value="fa-solid fa-car"
                                                                {{ $all_detail->icon == 'fa-solid fa-car' ? 'selected' : '' }}>
                                                                🚘</option>
                                                            <option value="fa-solid fa-check"
                                                                {{ $all_detail->icon == 'fa-solid fa-check' ? 'selected' : '' }}>
                                                                ✔️</option>
                                                        </select>
                                                        <div class="flex-1">
                                                            <input type="hidden"
                                                                name="included[{{ $includedIndex }}][id]"
                                                                value="{{ $all_detail->id ?? '' }}">
                                                            <input type="text"
                                                                name="included[{{ $includedIndex }}][text]"
                                                                placeholder="Sudah termasuk..."
                                                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2"
                                                                value="{{ $all_detail->text }}" />
                                                            <textarea name="included[{{ $includedIndex }}][inc_description]" rows="2"
                                                                class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                                                placeholder="Deskripsi Detail ... (dapat dikosongkan)">{{ $all_detail->description }}</textarea>
                                                        </div>
                                                        <button type="button" onclick="removeOption(this)"
                                                            class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded self-start">Hapus</button>
                                                    </div>
                                                    @php
                                                        $includedIndex++;
                                                    @endphp
                                                @endforeach
                                            @endforeach
                                        </div>
                                        <button type="button" id="manage-option-btn-{{ $service->id }}"
                                            class="text-white transition bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 my-1 text-center">
                                            Tambah Detail
                                        </button>
                                    </div>
                                    <div class="mb-5">
                                        <label for="manage-exclude-options-container-{{ $service->id }}"
                                            class="block mb-2 text-sm font-medium text-gray-900">Harga <b
                                                class="font-bold">belum</b>
                                            Termasuk :
                                            <span class="text-red-700">*</span></label>
                                        <div id="manage-exclude-options-container-{{ $service->id }}">
                                            <!-- Existing options will be here -->
                                            @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                                @foreach ($all_details->where('type', '=', 'excluded')->where('service_detail_id', $service_detail->id) as $all_detail)
                                                    <div class="flex items-start mb-2">
                                                        <select
                                                            class="icon-select mr-2 text-gray-900 text-sm rounded-lg p-2.5"
                                                            name="excluded[{{ $excludedIndex }}][icon]">
                                                            <option value="fa-solid fa-plane"
                                                                {{ $all_detail->icon == 'fa-solid fa-plane' ? 'selected' : '' }}>
                                                                ✈️</option>
                                                            <option value="fa-solid fa-hotel"
                                                                {{ $all_detail->icon == 'fa-solid fa-hotel' ? 'selected' : '' }}>
                                                                🏨</option>
                                                            <option value="fa-solid fa-calendar-days"
                                                                {{ $all_detail->icon == 'fa-solid fa-calendar-days' ? 'selected' : '' }}>
                                                                📆</option>
                                                            <option value="fa-solid fa-location-dot"
                                                                {{ $all_detail->icon == 'fa-solid fa-location-dot' ? 'selected' : '' }}>
                                                                📍</option>
                                                            <option value="fa-solid fa-car"
                                                                {{ $all_detail->icon == 'fa-solid fa-car' ? 'selected' : '' }}>
                                                                🚘</option>
                                                            <option value="fa-solid fa-xmark"
                                                                {{ $all_detail->icon == 'fa-solid fa-xmark' ? 'selected' : '' }}>
                                                                ❌</option>
                                                        </select>
                                                        <div class="flex-1">
                                                            <input type="hidden"
                                                                name="excluded[{{ $excludedIndex }}][id]"
                                                                value="{{ $all_detail->id ?? '' }}">
                                                            <input type="text"
                                                                name="excluded[{{ $excludedIndex }}][text]"
                                                                placeholder="Sudah termasuk..."
                                                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2"
                                                                value="{{ $all_detail->text }}" />
                                                            <textarea name="excluded[{{ $excludedIndex }}][exc_description]" rows="2"
                                                                class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                                                placeholder="Deskripsi Detail ... (dapat dikosongkan)">{{ $all_detail->description }}</textarea>
                                                        </div>
                                                        <button type="button" onclick="removeOption(this)"
                                                            class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded self-start">Hapus</button>
                                                    </div>
                                                    @php
                                                        $excludedIndex++;
                                                    @endphp
                                                @endforeach
                                            @endforeach
                                        </div>
                                        <button type="button" id="manage-exclude-option-btn-{{ $service->id }}"
                                            class="text-white transition bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 my-1 text-center">
                                            Tambah Detail
                                        </button>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                    <button type="submit"
                                        class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                                        Layanan</button>
                                    <button data-modal-hide="manage-modal{{ $service->id }}" type="button"
                                        class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Details modal -->
                <div id="extralarge-modal{{ $service->id }}" aria-hidden="true" data-modal-backdrop="static"
                    class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-7xl max-h-full mx-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Detail Layanan
                                </h3>
                                <button type="button"
                                    class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                    data-modal-hide="extralarge-modal{{ $service->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Tutup</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <div class="mx-auto">
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div class="text-sejarah mx-1 px-4 md:px-8 rounded-lg">
                                            <img class="h-auto max-w-full rounded-lg"
                                                src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}"
                                                width="300px" alt="image description">
                                            <h1 class="mt-3 text-3xl font-bold uppercase">{{ $service->title }}</h1>
                                            <hr class="h-px mb-6 bg-black border-0">

                                            @foreach ($details->where('service_id', $service->id) as $detail)
                                                <div class="flex items-center mb-2">
                                                    <div class="w-6 text-center">
                                                        <i class="{{ $detail->icon }} text-lg"></i>
                                                    </div>
                                                    <div class="ml-2">
                                                        {{ $detail->option }}
                                                    </div>
                                                </div>
                                            @endforeach

                                            <p class="mb-1">Tour Guide :</p>
                                            @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                                <div class="flex items-center mb-2">
                                                    <div class="w-6 text-center">
                                                        <i class="fa-solid fa-user-tag text-lg"></i>
                                                    </div>
                                                    <div class="ml-2">
                                                        {{ $service_detail->guider }}
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="text-sejarah mx-1 px-4 md:px-8 rounded-lg">
                                            <h3 class="text-xl font-bold mb-1"><i
                                                    class="fa-regular fa-circle-check mr-3"></i>Harga
                                                Sudah
                                                Termasuk</h3>
                                            <ul class="ml-4 list-disc list-inside mb-6">
                                                @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                                    @foreach ($all_details->where('type', '=', 'included')->where('service_detail_id', $service_detail->id) as $all_detail)
                                                        <li class="mt-1">{{ $all_detail->text }}
                                                        </li>
                                                        @if ($all_detail->description)
                                                            <p class="mb-1">{{ $all_detail->description }}</p>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="text-sejarah mx-1 px-4 md:px-8 rounded-lg">
                                            <h3 class="text-xl font-bold mb-1"><i
                                                    class="fa-regular fa-circle-xmark mr-3"></i>Harga
                                                Belum
                                                Termasuk</h3>
                                            <ul class="ml-4 list-disc list-inside mb-6">
                                                @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                                    @foreach ($all_details->where('type', '=', 'excluded')->where('service_detail_id', $service_detail->id) as $all_detail)
                                                        <li class="mt-1">{{ $all_detail->text }}
                                                        </li>
                                                        @if ($all_detail->description)
                                                            <p class="mb-1">{{ $all_detail->description }}</p>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                <button type="submit"
                                    class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Beli
                                    Paket</button>
                                <button data-modal-hide="extralarge-modal{{ $service->id }}" type="button"
                                    class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <!-- Add modal -->
    <div id="add-modal" aria-hidden="true" data-modal-backdrop="static"
        class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Tambah Layanan
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
                <form method="post" action="/admin/service/post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                                foto</label>
                            <input
                                class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="file_input" name="image" type="file" accept="image/*">
                            <span class="text-red-700 text-sm font-medium">* disarankan foto dengan resolusi yang
                                sama</span>
                            <img id="image_preview" class="mt-4 hidden w-3/5 rounded-lg" />
                        </div>
                        <div class="mb-5">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Nama Paket <span
                                    class="text-red-700">*</span></label>
                            <input type="text" id="title" name="title" placeholder="Masukkan Nama Paket"
                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi <span
                                    class="text-red-700">*</span></label>
                            <input type="text" id="description" name="description"
                                placeholder="Paket ini sudah termasuk... Periode dari tanggal ... sampai ..."
                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>
                        <div class="mb-5">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Harga <span
                                    class="text-red-700">*</span></label>
                            <input type="number" id="price" name="price"
                                placeholder="10000000(masukkan tanpa titik)"
                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>

                        <!-- Dynamic Options Input -->
                        <div class="mb-5">
                            <label for="add-options-container" class="block mb-2 text-sm font-medium text-gray-900">Detail
                                layanan <span class="text-red-700">*</span></label>
                            <div id="add-options-container">
                                <div class="flex items-center mb-2">
                                    <select name="icons[]" class="mr-2 text-gray-900 text-sm rounded-lg p-2.5">
                                        <option value="fa-solid fa-plane">✈️</option>
                                        <option value="fa-solid fa-hotel">🏨</option>
                                        <option value="fa-solid fa-calendar-days">📆</option>
                                        <option value="fa-solid fa-location-dot">📍</option>
                                        <option value="fa-solid fa-car">🚘</option>
                                        <option value="fa-solid fa-users">👥</option>
                                    </select>
                                    <input type="text" name="options[]" placeholder="Sudah termasuk..."
                                        class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                    <button type="button" onclick="removeOption(this)"
                                        class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                </div>
                            </div>
                            <button type="button" id="add-option-btn"
                                class="text-white transition bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 my-1 text-center">Tambah</button>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button type="submit"
                            class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                            Layanan</button>
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
                var serviceId = $(this).data('id');
                var deleteUrl = '/admin/service/delete/' + serviceId;
                $('#deleteButton').attr('href', deleteUrl);
            });

            function handleFileInputChange(event, previewId) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById(previewId);
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }

            document.getElementById('file_input_add').addEventListener('change', function(event) {
                handleFileInputChange(event, 'image_preview_add');
            });

            @foreach ($services as $service)
                document.getElementById('file_input_edit_{{ $service->id }}').addEventListener('change', function(
                    event) {
                    handleFileInputChange(event, 'image_preview_edit_{{ $service->id }}');
                });
            @endforeach
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

        document.addEventListener('DOMContentLoaded', function() {
            // Delegate event for all "Tambah" buttons using a common class
            document.querySelectorAll('.edit-option-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    const serviceId = button.getAttribute('data-service-id');
                    const editOptionsContainer = document.getElementById(
                        `edit-options-container-${serviceId}`);

                    // Create div wrapper for new input and remove button
                    const optionWrapper = document.createElement('div');
                    optionWrapper.classList.add('flex', 'items-center', 'mb-2');

                    // Example of determining a new index for dynamic inputs
                    let newIndex = editOptionsContainer.querySelectorAll('input[name^="options["]')
                        .length;

                    // Increment newIndex to ensure uniqueness
                    newIndex++;

                    // Now you can use newIndex to dynamically create new inputs
                    const newHiddenOptionInput = document.createElement('input');
                    newHiddenOptionInput.setAttribute('type', 'hidden');
                    newHiddenOptionInput.setAttribute('name', `options[${newIndex}][id]`);
                    newHiddenOptionInput.setAttribute('value', '');

                    // Create select element
                    const newOptionSelect = document.createElement('select');
                    newOptionSelect.setAttribute('name', `options[${newIndex}][icon]`);
                    newOptionSelect.classList.add('mr-2', 'text-gray-900', 'text-sm', 'rounded-lg',
                        'p-2.5');
                    newOptionSelect.innerHTML = `
                <option value="fa-solid fa-plane">✈️</option>
                <option value="fa-solid fa-hotel">🏨</option>
                <option value="fa-solid fa-calendar-days">📆</option>
                <option value="fa-solid fa-location-dot">📍</option>
                <option value="fa-solid fa-car">🚘</option>
                <option value="fa-solid fa-users">👥</option>
            `;

                    // Create input element
                    const newOptionInput = document.createElement('input');
                    newOptionInput.setAttribute('type', 'text');
                    newOptionInput.setAttribute('name', `options[${newIndex}][option]`);
                    newOptionInput.setAttribute('placeholder', 'Sudah termasuk...');
                    newOptionInput.classList.add('transition', 'shadow-sm', 'bg-gray-50', 'border',
                        'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg',
                        'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'w-full',
                        'p-2.5');

                    // Create remove button
                    const removeButton = document.createElement('button');
                    removeButton.setAttribute('type', 'button');
                    removeButton.textContent = 'Hapus';
                    removeButton.classList.add('ml-2', 'bg-red-500', 'hover:bg-red-700',
                        'text-white', 'font-bold', 'py-2', 'px-4', 'rounded');
                    removeButton.addEventListener('click', function() {
                        editOptionsContainer.removeChild(optionWrapper);
                    });

                    // Append select, input and remove button to wrapper
                    optionWrapper.appendChild(newOptionSelect);
                    optionWrapper.appendChild(newOptionInput);
                    optionWrapper.appendChild(newHiddenOptionInput);
                    optionWrapper.appendChild(removeButton);

                    // Append wrapper to container
                    editOptionsContainer.appendChild(optionWrapper);
                });
            });

            // For Add Modal
            const addOptionBtn = document.getElementById('add-option-btn');
            const addOptionsContainer = document.getElementById('add-options-container');

            if (addOptionBtn && addOptionsContainer) {
                addOptionBtn.addEventListener('click', function() {
                    // Create div wrapper for new input and remove button
                    const optionWrapper = document.createElement('div');
                    optionWrapper.classList.add('flex', 'items-center', 'mb-2');

                    // Create select element
                    const newOptionSelect = document.createElement('select');
                    newOptionSelect.setAttribute('name', 'icons[]');
                    newOptionSelect.classList.add('mr-2', 'text-gray-900', 'text-sm', 'rounded-lg',
                        'p-2.5');
                    newOptionSelect.innerHTML = `
            <option value="fa-solid fa-plane">✈️</option>
            <option value="fa-solid fa-hotel">🏨</option>
            <option value="fa-solid fa-calendar-days">📆</option>
            <option value="fa-solid fa-location-dot">📍</option>
            <option value="fa-solid fa-car">🚘</option>
        `;

                    // Create input element
                    const newOptionInput = document.createElement('input');
                    newOptionInput.setAttribute('type', 'text');
                    newOptionInput.setAttribute('name', 'options[]');
                    newOptionInput.setAttribute('placeholder', 'Sudah termasuk...');
                    newOptionInput.classList.add('transition', 'shadow-sm', 'bg-gray-50', 'border',
                        'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg',
                        'focus:ring-blue-500', 'focus:border-blue-500', 'block', 'w-full', 'p-2.5');

                    // Create remove button
                    const removeButton = document.createElement('button');
                    removeButton.setAttribute('type', 'button');
                    removeButton.textContent = 'Hapus';
                    removeButton.classList.add('ml-2', 'bg-red-500', 'hover:bg-red-700', 'text-white',
                        'font-bold', 'py-2', 'px-4', 'rounded');
                    removeButton.addEventListener('click', function() {
                        addOptionsContainer.removeChild(optionWrapper);
                    });

                    // Append select, input and remove button to wrapper
                    optionWrapper.appendChild(newOptionSelect);
                    optionWrapper.appendChild(newOptionInput);
                    optionWrapper.appendChild(removeButton);

                    // Append wrapper to container
                    addOptionsContainer.appendChild(optionWrapper);
                });
            }
        });

        let addOptionIndex = {{ $includedIndex ?? 0 + 1 }};

        function addOption(containerId) {
            addOptionIndex++;
            const container = document.getElementById(containerId);
            const optionHtml = `
                <div class="flex items-start mb-2">
                    <select class="icon-select mr-2 text-gray-900 text-sm rounded-lg p-2.5" name="included[${addOptionIndex}][icon]">
                        <option value="fa-solid fa-plane">✈️</option>
                        <option value="fa-solid fa-hotel">🏨</option>
                        <option value="fa-solid fa-calendar-days">📆</option>
                        <option value="fa-solid fa-location-dot">📍</option>
                        <option value="fa-solid fa-car">🚘</option>
                        <option value="fa-solid fa-check">✔️</option>
                    </select>
                    <div class="flex-1">
                        <input type="hidden" name="included[${addOptionIndex}][id]">
                        <input type="text" name="included[${addOptionIndex}][text]" placeholder="Sudah termasuk..." class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2" />
                        <textarea name="included[${addOptionIndex}][inc_description]" rows="2" class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Deskripsi Detail ... (dapat dikosongkan)"></textarea>
                    </div>
                    <button type="button" onclick="removeOption(this)" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded self-start">Hapus</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', optionHtml);
        }

        function removeOption(button) {
            const optionDiv = button.closest('.flex');
            optionDiv.remove();
        }

        document.querySelectorAll('[id^="manage-option-btn-"]').forEach(button => {
            button.addEventListener('click', function() {
                const serviceId = this.id.split('-').pop();
                addOption(`manage-options-container-${serviceId}`);
            });
        });

        let addExcludedOptionIndex = {{ $excludedIndex ?? 0 + 1 }};

        function addExcludeOption(containerId) {
            addExcludedOptionIndex++
            const container = document.getElementById(containerId);
            const optionHtml = `
                <div class="flex items-start mb-2">
                    <select class="icon-select mr-2 text-gray-900 text-sm rounded-lg p-2.5" name="excluded[${addExcludedOptionIndex}][icon]">
                        <option value="fa-solid fa-plane">✈️</option>
                        <option value="fa-solid fa-hotel">🏨</option>
                        <option value="fa-solid fa-calendar-days">📆</option>
                        <option value="fa-solid fa-location-dot">📍</option>
                        <option value="fa-solid fa-car">🚘</option>
                        <option value="fa-solid fa-xmark">❌</option>
                    </select>
                    <div class="flex-1">
                        <input type="hidden" name="excluded[${addExcludedOptionIndex}][id]">
                        <input type="text" name="excluded[${addExcludedOptionIndex}][text]" placeholder="Sudah termasuk..." class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2" />
                        <textarea name="excluded[${addExcludedOptionIndex}][exc_description]" rows="2" class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Deskripsi Detail ... (dapat dikosongkan)"></textarea>
                    </div>
                    <button type="button" onclick="removeOption(this)" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded self-start">Hapus</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', optionHtml);
        }


        document.querySelectorAll('[id^="manage-exclude-option-btn-"]').forEach(button => {
            button.addEventListener('click', function() {
                const serviceId = this.id.split('-').pop();
                addExcludeOption(`manage-exclude-options-container-${serviceId}`);
            });
        });

        function removeOption(button) {
            const optionDiv = button.closest('.flex');
            optionDiv.remove();
        }

        // Function to remove option dynamically based on button context
        function removeOption(button) {
            const optionWrapper = button.parentElement;
            const optionsContainer = optionWrapper.parentElement;
            optionsContainer.removeChild(optionWrapper);
        }
    </script>
@endsection
