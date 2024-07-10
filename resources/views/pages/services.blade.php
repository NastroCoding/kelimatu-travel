@extends('layouts.main')
@section('container')
    <div class="container mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Paket Layanan Kami</h1>
        <div class="flex flex-col sm:flex-row sm:justify-evenly sm:space-x-4 space-y-4 sm:space-y-0">

            @foreach ($services as $service)
                <div class="bg-gradient-to-t from-gray-700 to-[#671282] rounded-lg shadow max-w-sm mx-auto sm:mx-0">
                    <img class="rounded-t-lg w-full"
                        src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}"
                        alt="Kaabah" />
                    <div class="p-5">
                        <h5 class="text-2xl font-bold tracking-tight text-white text-center">{{ $service->title }}</h5>
                        <h5 class="mb-2 text-sm tracking-tight text-white text-center">{{ $service->description }}</h5>
                        <h5 class="mt-2 text-lg tracking-tight text-white text-center"> Detail Paket : </h5>

                        @foreach ($details->where('service_id', $service->id) as $detail)
                            <p class="mb-1 text-white text-center text-lg">
                                <i class="fa-regular fa-square-plus"></i> {{ $detail->option }}
                            </p>
                        @endforeach

                        <a href="https://wa.me/62{{ $configs->whatsapp_num }}"
                            class="inline-flex justify-center w-full text-center items-center px-3 py-2 text-sm font-bold text-white bg-gray-700 shadow-xl border-2 border-gray-800 rounded-full hover:bg-[#671282] transition hover:border-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Rp {{ number_format($service->price, 0, ',', '.') }}
                        </a>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
