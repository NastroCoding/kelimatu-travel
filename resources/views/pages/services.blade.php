@extends('layouts.main')

@section('container')
    <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 mb-10">
        <div class="relative h-40 flex items-center justify-center">
            <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                style="background-image: url('{{ URL::asset('dist/assets/img/servicebackground.jpg') }}');">
            </div>
            <h1
                class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-center text-white md:text-3xl lg:text-4xl z-10">
                Paket Layanan Kami
            </h1>
        </div>
    </div>
    <div class="container mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($services as $service)
                <div class="bg-gradient-to-t from-gray-700 to-[#671282] rounded-lg shadow mx-auto sm:mx-0">
                    <img class="rounded-t-lg w-full"
                        src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}"
                        alt="Kaabah" />
                    <div class="p-5">
                        <h5 class="text-2xl font-bold tracking-tight text-white text-center">{{ $service->title }}</h5>
                        <h5 class="mb-2 text-sm tracking-tight text-white text-center">{{ $service->description }}</h5>
                        <h5 class="my-2 text-lg tracking-tight text-white text-center">Detail Paket:</h5>

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

                        <p class="mb-1 ml-1 text-white font-bold"> Rp {{ number_format($service->price, 0, ',', '.') }} </p>

                        <a style="cursor: pointer;" data-modal-target="extralarge-modal{{ $service->id }}"
                            data-modal-toggle="extralarge-modal{{ $service->id }}"
                            class="inline-flex justify-center w-full text-center items-center px-3 py-2 text-sm font-bold text-white bg-gray-700 shadow-xl border-2 border-gray-800 rounded-full hover:bg-[#671282] transition hover:border-white focus:ring-4 mt-2 focus:outline-none focus:ring-blue-300">
                            Lihat Keseluruhan Paket
                        </a>
                        <button type="submit" data-modal-target="contact-modal" data-modal-toggle="contact-modal"
                            data-modal-hide="extralarge-modal{{ $service->id }}"
                            class="inline-flex justify-center w-full text-center items-center px-3 py-2 text-sm font-bold text-white bg-green-700 shadow-xl border-2 border-gray-800 rounded-full hover:bg-green-800 transition hover:border-white focus:ring-4 mt-2 focus:outline-none focus:ring-blue-300">Beli
                            Paket</button>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    @foreach ($services as $service)
        <div id="extralarge-modal{{ $service->id }}" aria-hidden="true" data-modal-backdrop="static"
            class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-7xl max-h-full mx-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 rounded-t bg-gradient-to-l from-gray-200 to-white text-gray-800">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Detail Layanan
                        </h3>
                        <button type="button"
                            class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="extralarge-modal{{ $service->id }}">
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
                        <div class="mx-auto">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="text-sejarah mx-1 px-4 md:px-8 rounded-lg">
                                    <img class="h-auto max-w-full rounded-lg"
                                        src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}"
                                        width="300px" alt="image description">
                                    <h1 class="mt-3 text-3xl font-bold uppercase">{{ $service->title }}</h1>
                                    <hr class="h-px mb-6 bg-black border-0">
                                    <p class="mb-2 ml-1 text-center font-bold text-xl"> Rp
                                        {{ number_format($service->price, 0, ',', '.') }} </p>
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
                                    <h3 class="text-xl font-bold mb-1"><i class="fa-regular fa-circle-check mr-3"></i>Harga
                                        Sudah Termasuk</h3>
                                    <ul class="ml-4 list-disc list-inside mb-6">
                                        @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                            @foreach ($all_details->where('type', '=', 'included')->where('service_detail_id', $service_detail->id) as $all_detail)
                                                <li class="mt-1">{{ $all_detail->text }}</li>
                                                @if ($all_detail->description)
                                                    <p class="mb-1">{{ $all_detail->description }}</p>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="text-sejarah mx-1 px-4 md:px-8 rounded-lg">
                                    <h3 class="text-xl font-bold mb-1"><i class="fa-regular fa-circle-xmark mr-3"></i>Harga
                                        Belum Termasuk</h3>
                                    <ul class="ml-4 list-disc list-inside mb-6">
                                        @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                            @foreach ($all_details->where('type', '=', 'excluded')->where('service_detail_id', $service_detail->id) as $all_detail)
                                                <li class="mt-1">{{ $all_detail->text }}</li>
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
                    <div
                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b bg-gradient-to-r from-gray-200 to-white">
                        <button type="submit" data-modal-target="contact-modal" data-modal-toggle="contact-modal"
                            data-modal-hide="extralarge-modal{{ $service->id }}"
                            class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Beli
                            Paket</button>
                        <button data-modal-hide="extralarge-modal{{ $service->id }}" type="button"
                            class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact modal -->
        <div id="contact-modal" aria-hidden="true" data-modal-backdrop="static"
            class="hidden animate__animated animate__fadeIn animate__faster hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 rounded-t bg-gradient-to-l from-gray-200 to-white text-gray-800">
                        <h3 class="text-xl font-semibold">
                            Kontak Kami
                        </h3>
                        <button type="button"
                            class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="contact-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Tutup</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="flex justify-center mx-auto">
                            <a href="https://wa.me/62{{ $configs->whatsapp_num }}"
                                class="transition border-2 border-[#25d366] hover:border-white text-[#25d366] hover:text-white bg-white hover:bg-[#25d366]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2">
                                <i class="text-xl fa-brands fa-whatsapp mr-2"></i>
                                Kontak Admin 1
                            </a>
                            @if ($configs->whatsapp_num2)
                                <a href="https://wa.me/62{{ $configs->whatsapp_num2 }}"
                                    class="transition border-2 border-[#25d366] hover:border-white text-[#25d366] hover:text-white bg-white hover:bg-[#25d366]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2">
                                    <i class="text-xl fa-brands fa-whatsapp mr-2"></i>
                                    Kontak Admin 2
                                </a>
                            @endif

                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b bg-gradient-to-r from-gray-200 to-white text-gray-800">
                        <button data-modal-hide="contact-modal" type="button"
                            data-modal-target="extralarge-modal{{ $service->id }}"
                            data-modal-toggle="extralarge-modal{{ $service->id }}"
                            class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-red-700 rounded-lg border border-gray-200 hover:bg-red-800 focus:z-10 focus:ring-4 focus:ring-gray-100 text-white font-bold">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
