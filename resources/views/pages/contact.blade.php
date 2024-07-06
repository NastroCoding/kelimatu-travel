@extends('layouts.main')

@section('container')
    <div class="container mx-auto mt-10">
        <div class=" p-8 ">
            <h1 class="text-3xl font-bold mb-8 text-center">Kontak Kami</h1>

            <!-- Contact Methods -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                    <div class="text-4xl text-[#671282] mb-4">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h2 class="text-xl font-semibold">Alamat</h2>
                    <p class="text-center ">PT. LTE Holding
                        (PT. Kelimatu Travel & Tours)
                        Jl. Persada Raya No. 70H
                        RT03 RT015 Kel. Menteng Dalam, Kec. Tebet - Jakarta Selatan.
                    </p>
                </div>
                <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                    <div class="text-4xl text-[#671282] mb-4">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h2 class="text-xl font-semibold">WhatsApp</h2>
                    <p class="text-center"></p>
                </div>
                <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                    <div class="text-4xl text-[#671282] mb-4">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h2 class="text-xl font-semibold">G-Mail</h2>
                    <p class="text-center"></p>
                </div>
                <div class="bg-gray-100 flex flex-col p-8 rounded-md items-center shadow-md">
                    <div class="text-4xl text-[#671282] mb-4">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h2 class="text-xl font-semibold">Instagram</h2>
                    <p class="text-center"></p>
                </div>
            </div>

            <!-- Map and Contact Form -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Map -->
                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d416.90209824202327!2d106.84648490626037!3d-6.228946038477268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f39231e44cfd%3A0xc599df0bb0956bf4!2sJl.%20Persada%20Raya%20No.70%2C%20RT.3%2FRW.15%2C%20Kuningan%2C%20Menteng%20Dalam%2C%20Kec.%20Tebet%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012870!5e0!3m2!1sen!2sid!4v1720001500411!5m2!1sen!2sid"
                        width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy" class="transition rounded-md shadow-md"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <!-- Contact Form -->
                <div class="bg-gray-100 p-8 rounded-md shadow-md">
                    <form>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-semibold mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name"
                                class="w-full p-3 border border-gray-300 rounded-md transition">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full p-3 border border-gray-300 rounded-md transition">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-semibold mb-2">Subjek</label>
                            <input type="text" id="subject" name="subject"
                                class="w-full p-3 border border-gray-300 rounded-md transition">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-semibold mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="5" class="w-full p-3 border border-gray-300 rounded-md transition"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full p-3 bg-[#671282] hover:bg-white text-white hover:text-[#671282] rounded-md transition font-semibold border-2">Kirim
                            Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
