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
    <form action="/admin/config/update/{{ $configs->id }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 md:grid-cols-2 gap-6 mb-8 mt-8">
            <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                <div class="text-4xl text-[#671282] mb-4">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h2 class="text-xl font-semibold mb-2">Alamat</h2>
                <textarea
                    class="block transition p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Write your thoughts here..." rows="3" name="address">{{ $configs->address }}</textarea>
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
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition">Simpan
            perubahan</button>
    </form>
@endsection
