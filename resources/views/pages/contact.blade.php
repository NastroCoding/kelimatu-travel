@extends('layouts.main')

@section('container')

    <div class="container mx-auto">
        <div class=" p-8 ">
            <h1 class="text-3xl font-bold mb-8 text-center">Kontak Kami</h1>

            <!-- Contact Methods -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                    <div class="text-4xl text-[#671282] mb-4">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h2 class="text-xl font-semibold">Alamat</h2>
                    <p class="text-center">{{ $configs->address }}</p>
                </div>
                <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                    <div class="text-4xl text-[#671282] mb-4">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h2 class="text-xl font-semibold">WhatsApp</h2>
                    <a href="https://wa.me/62{{ $configs->whatsapp_num }}"
                        class="text-center my-auto text-2xl">
                        <p>0{{ $configs->whatsapp_num }}</p>
                    </a>
                </div>
                <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                    <div class="text-4xl text-[#671282] mb-4">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h2 class="text-xl font-semibold">G-Mail</h2>
                    <a href="mailto:{{ $configs->gmail }}" class="text-center my-auto text-base><p">{{ $configs->gmail }}</p></a>
                </div>
                <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                    <div class="text-4xl text-[#671282] mb-4">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h2 class="text-xl font-semibold">Instagram</h2>
                    <a href="https://www.instagram.com/{{ $configs->instagram }}/" class="text-center my-auto text-lg">
                        <p> {{ '@' . $configs -> instagram }} </p>
                    </a>
                </div>
            </div>

            <!-- Map and Contact Form -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Map -->
                <div>
                    <iframe
                        src="{{ $configs->map  }}"
                        width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy"
                        class="transition rounded-md shadow-md" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <!-- Contact Form -->
                <div class="bg-gray-100 p-8 rounded-md shadow-md">
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
                    <form action="/mail/add" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-semibold mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name"
                                class="w-full p-3 border border-gray-300 rounded-md transition @error('name') border-red-500 @enderror"
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full p-3 border border-gray-300 rounded-md transition @error('email') border-red-500 @enderror"
                                value="{{ old('email') }}">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-semibold mb-2">Subjek</label>
                            <input type="text" id="subject" name="subject"
                                class="w-full p-3 border border-gray-300 rounded-md transition @error('subject') border-red-500 @enderror"
                                value="{{ old('subject') }}">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-semibold mb-2">Pesan</label>
                            <textarea id="message" name="description" rows="4"
                                class="w-full p-3 border border-gray-300 rounded-md transition @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="captcha" class="block text-gray-700 text-sm font-bold mb-2">CAPTCHA</label>
                            <div class="flex items-center">
                                <img src="{{ captcha_src() }}" alt="CAPTCHA"
                                    class="captcha-img border border-gray-300 rounded-md" data-refresh-config="default">
                                <button type="button"
                                    class="ml-2 p-1 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md focus:outline-none btn-refresh-captcha">
                                    Refresh
                                </button>
                            </div>
                            <input type="text" id="captcha" name="captcha"
                                class="mt-2 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 @error('captcha') border-red-500 @enderror"
                                placeholder="Enter CAPTCHA">
                        </div>
                        <button type="submit"
                            class="w-full p-3 bg-[#671282] hover:bg-white text-white hover:text-[#671282] rounded-md transition font-semibold border-2">Kirim
                            Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.btn-refresh-captcha').addEventListener('click', function() {
            var captchaImage = document.querySelector('.captcha-img');
            var captchaSrc = captchaImage.src.split('?')[0];
            captchaImage.src = captchaSrc + '?' + Math.random();
        });
    </script>
@endsection
