@extends('layouts.main')
@section('container')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-8 text-center">Paket Umroh</h1>
        <div class=" p-8 flex justify-evenly">
            <div class="max-w-sm bg-gradient-to-t from-gray-700 to-[#671282] border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ URL::asset('dist/assets/img/kaabah-card.jpg') }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white text-center">Umroh Regular</h5>
                    </a>
                    <p class="mb-3 font-bold text-white text-center text-lg"><i class="fa-solid fa-building"></i> Hotel
                    </p>
                    <p class="mb-3 font-bold text-white text-center text-lg"><i class="fa-solid fa-plane"></i> Maskapai
                    </p>
                    <a href="#"
                        class="inline-flex justify-center w-full text-center items-center px-3 py-2 text-sm font-bold text-center text-white bg-gray-700 shadow-xl border-2 border-gray-800 rounded-full hover:bg-[#671282] transition hover:border-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Rp 29.500.000,00
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-gradient-to-t from-gray-700 to-[#671282] border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ URL::asset('dist/assets/img/kaabah-card.jpg') }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white text-center">Umroh VIP</h5>
                    </a>
                    <p class="mb-3 font-bold text-white text-center text-lg"><i class="fa-solid fa-building"></i> Hotel
                    </p>
                    <p class="mb-3 font-bold text-white text-center text-lg"><i class="fa-solid fa-plane"></i> Maskapai
                    </p>
                    <a href="#"
                        class="inline-flex justify-center w-full text-center items-center px-3 py-2 text-sm font-bold text-center text-white bg-gray-700 shadow-xl border-2 border-gray-800 rounded-full hover:bg-[#671282] transition hover:border-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Rp 39.500.000,00
                    </a>
                </div>
            </div>
            <div class="max-w-sm bg-gradient-to-t from-gray-700 to-[#671282] border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ URL::asset('dist/assets/img/kaabah-card.jpg') }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white text-center">Umroh Syawal &
                            Ramadhan
                        </h5>
                    </a>
                    <p class="mb-3 font-bold text-white text-center text-lg"><i class="fa-solid fa-building"></i> Hotel
                    </p>
                    <p class="mb-3 font-bold text-white text-center text-lg"><i class="fa-solid fa-plane"></i> Maskapai
                    </p>
                    <a href="#"
                        class="inline-flex justify-center w-full text-center items-center px-3 py-2 text-sm font-bold text-center text-white bg-gray-700 shadow-xl border-2 border-gray-800 rounded-full hover:bg-[#671282] transition hover:border-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Rp 40.000.000,00
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
