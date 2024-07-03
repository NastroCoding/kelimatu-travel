@extends('layouts.main')
@section('container')
    <div class="jumbotron" id="content">
        <div class="jumbotron-overlay"></div>
        <div class="main-left mx-[5%]">
            <p style="font-weight: bold;">Rasakan kedamaian di Tanah Suci bersama Kami</p>
            <h1 class="title-brand text-5xl my-3" style="font-weight: bold;">Kelimatu <br> <span><u>Travel & Tours</u></span>
            </h1>
            <p class="font-bold">Umroh adalah perjalanan hati dan jiwa. Bersama kami, wujudkan umroh impian Anda dengan penuh
                kenyamanan</p>
            <button class="about-button mt-5 font-bold"><a href="" class="about-anchor">Tentang Kami</a></button>
        </div>
        <div class="main-right">
            <img src="{{ URL::asset('dist/assets/img/kaabah.png') }}" class="custom-background" alt="">
        </div>
    </div>


    <section class="bg-gray-700">
        <!-- First Section -->
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 flex flex-col lg:flex-row-reverse items-center">
            <div
                class="bg-gray-700 rounded-lg border border-gray-200 shadow-2xl dark:border-gray-700 p-8 md:p-12 mb-8 lg:w-1/2 lg:mb-0 lg:ml-8">
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-3xl font-extrabold mb-2">Umrah Adalah</h1>
                <p class="text-lg font-normal text-white mb-6">Umrah secara bahasa bisa diartikan berziarah. Sedangkan
                    menurut istilah, umroh adalah menyengaja menuju <a href="#">Ka'bah</a> untuk melaksanakan ibadah
                    tertentu.</p>
                <p class="text-lg font-normal text-white mb-6">Dalam syariat Islam, Umroh adalah berkunjung ke Baitullah
                    atau (Masjidil Haram) dengan tujuan untuk mendekatkan diri kepada Sang Khalik yakni Allah SWT dengan
                    memenuhi seluruh syarat-syaratnya, serta waktu tak ditentukan pada seperti ibadah haji.</p>
            </div>
            <div class="lg:w-1/2 flex justify-center lg:justify-start">
                <img class="w-full h-auto max-w-full rounded-lg shadow-xl dark:shadow-gray-800 lg:h-96 object-cover"
                    src="{{ URL::asset('dist/assets/img/kaabah-banner3.jpg') }}" alt="image description">
            </div>
        </div>
        <!-- Second Section -->
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 flex flex-col lg:flex-row items-center">
            <div
                class="bg-gray-700 shadow-2xl rounded-lg border border-gray-200 dark:border-gray-700 p-8 md:p-12 mb-8 lg:w-1/2 lg:mb-0 lg:mr-8">
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-3xl font-extrabold mb-2">Mengapa Harus Umroh?</h1>
                <p class="text-lg font-normal text-white mb-6">Mayoritas penduduk Indonesia adalah muslim. Sudah barang
                    tentu, setiap seorang muslim sangat
                    mendambakan dan merindukan untuk bisa pergi ke Tanah Suci melaksanakan umroh maupun haji.</p>
                <p class="text-lg font-normal text-white mb-6">Umumnya masyarakat Indonesia memilih untuk menunaikan ibadah
                    umroh terlebih dahulu, dikarenakan panjangnya antrian untuk bisa melakukan ibadah haji di Indonesia</p>
                <p class="text-lg font-normal text-white mb-6">Bagi sebagian masyarakat muslim di Indonesia melaksankan
                    ibadah umroh bukan hanya
                    diperuntukan bagi orang-orang yang mampu saja. Tapi yakinlah bahwa Allah SWT akan
                    memampukan orang-orang yang terpanggil untuk berumroh.</p>
                <p class="text-lg font-normal text-white mb-6">Untuk bisa menjadi yang terpanggil tentunya niat saja tidak
                    cukup. Kita harus awali dengan
                    memantaskan diri agar diterima dan bisa menjadi Tamu Allah. Caranya yaitu mengiringinya dengan
                    keinginan yang kuat, berdoa setiap waktu, dan ditambah dengan ikhtiar tindakan atau usaha kita
                    dalam mewujudkannya </p>
            </div>
            <div class="lg:w-1/2 flex justify-center lg:justify-start">
                <img class="w-full h-auto max-w-full rounded-lg shadow-xl dark:shadow-gray-800 lg:h-96 object-cover"
                    src="{{ URL::asset('dist/assets/img/kaabah-banner2.jpg') }}" alt="image description">
            </div>
        </div>
    </section>

    <div class="banner bg-image">
        <div class="caption">
            <h3 class="caption-header text-2xl">"Kalau Allah sudah memanggil, kalau Allah sudah mengundang, dengan cara
                apapun kita pasti akan mengunjunginya, Insyaa Allah kita akan dimudahkan hadir ke Baitullah"</h3>
            <button class="contact-button"><a href="" class="anchor-button">Kontak Kami</a></button>
        </div>
    </div>
    <div class="flex w-full flex-col lg:flex-row">
        <div class="card bg-base-300 rounded-box grid h-32 flex-grow place-items-center border">content</div>
        <div class="card bg-base-300 rounded-box grid h-32 flex-grow place-items-center border">content</div>
    </div>

@endsection
