@extends('layouts.main')
@section('container')
    <section id="visimisi">
        <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 mb-10">
            <div class="relative h-32 flex items-center justify-center">
                <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                    style="background-image: url('{{ URL::asset('dist/assets/img/mecca-background2.jpg') }}');">
                </div>
                <h1
                    class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-center text-white md:text-3xl lg:text-4xl z-10">
                    Visi & Misi Kelimatu Travel
                </h1>
            </div>
        </div>

        <div class="about-wrapper mx-auto">

            <div class="">
                <div class="text-sejarah shadow-xl mx-1 bg-gray-700 p-8 rounded-lg mb-2 ">
                    <h1 class="text-3xl text-white font-bold text-center my-2"> Visi </h1>
                    <hr class="mb-2 w-1/4 mx-auto">
                    <p class="text-lg text-white"> {{ $configs->visi }}.</p>
                </div>
                <div class="text-sejarah shadow-xl mx-1 bg-gray-700 p-8 rounded-lg mt-5 md:mt-0">
                    <h1 class="text-3xl text-white font-bold text-center my-2"> Misi </h1>
                    <hr class="mb-2 w-1/4 mx-auto">
                    <p class="text-lg text-white mb-2">
                        {!! nl2br(e($configs->misi)) !!}
                    </p>
                </div>
            </div>

            <div class="p-4 rounded-lg md:p-8 bg-gradient-to-b from-gray-700 to-[#671282] mt-5" id="stats"
                role="tabpanel" aria-labelledby="stats-tab">
                <h1 class="text-3xl text-white font-bold text-center my-2"> Nilai Nilai Kelimatu </h1>
                <dl
                    class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-5 dark:text-white sm:p-8">
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl text-white font-extrabold"><i class="fa-solid fa-user-tie"></i></dt>
                        <dd class="text-white font-extrabold">Profesional</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl text-white font-extrabold"><i class="fa-solid fa-gear"></i></dt>
                        <dd class="text-white font-extrabold">Integritas</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl text-white font-extrabold"><i class="fa-solid fa-handshake"></i></dt>
                        <dd class="text-white font-extrabold">Jujur</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl text-white font-extrabold"><i class="fa-solid fa-scale-balanced"></i></dt>
                        <dd class="text-white font-extrabold">Adil Peduli</dd>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl text-white font-extrabold"><i class="fa-solid fa-lock"></i></dt>
                        <dd class="text-white font-extrabold">Komitmen</dd>
                    </div>
                </dl>
            </div>
    </section>

    <section id="sejarah">
        <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 my-10">
            <div class="relative h-32 flex items-center justify-center">
                <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                    style="background-image: url('{{ URL::asset('dist/assets/img/mecca-background3.jpg') }}');">
                </div>
                <h1
                    class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-center text-white md:text-3xl lg:text-4xl z-10">
                    Sejarah Pendirian Kelimatu Travel & Tours
                </h1>
            </div>
        </div>

        <div class="about-wrapper mx-auto">
            <div class="sejarah-wrap lg:flex my-5">
                <div class="picture">
                    <img src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}" class="w-full mx-auto" width="75%"
                        alt="">
                </div>
                <div class="text-sejarah shadow-xl bg-gray-700 border border-gray-200 dark:border-gray-700 p-8 rounded-lg ">
                    <p class="text-lg text-white">{{ $configs->history }}</p>
                </div>
            </div>
            <div
                class="text-white shadow-xl text-logo text-lg text-sejarah bg-gradient-to-b from-gray-700 to-[#671282] border border-gray-200 dark:border-gray-700 p-8 rounded-lg">
                <h1>Arti Logo :</h1>
                <p class="py-1">- WARNA UNGU MAGENTA, memiliki nilai positif, berjiwa
                    artistik, bijaksana, dan intuitif, dekat dan senang memikirkan
                    masalah spiritual dalam kehidupan.</p>
                <p class="py-1">- LAMBANG, huruf K (double) melambangkan kebersamaan dan
                    persatuan.</p>
                <p class="py-1">- Tulisan “KELIMATU”, adalah branding nama dari PT. Emaar
                    Pesona Wisata (EPW). Kelimatu (Kalimat ; Bahasa Arab)
                    memiliki arti kesatuan perasaan dan ungkapan dalam bentuk
                    kata/tulisan. Dan atau Kelimatu bisa disingkat sebagai
                    Keluarga Alumni SMPN 57.</p>
                <p class="py-1">- Travel & Tours, adalah bentuk usaha perjalanan travel & tours
                    berupa umroh, haji dan wisata halal lainnya.</p>
            </div>
        </div>
    </section>

    <section id="tim">
        <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 my-10">
            <div class="relative h-32 flex items-center justify-center">
                <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                    style="background-image: url('{{ URL::asset('dist/assets/img/person-background.jpg') }}');">
                </div>
                <h1 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white text-center md:text-3xl lg:text-4xl z-10"
                    style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5); -webkit-text-fill-color: white;">
                    Tim
                </h1>
            </div>
        </div>
        <div class="about-wrapper mx-auto flex">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                    @foreach ($teams as $team)
                        <div class="max-w-sm bg-gray-700 rounded shadow">
                            <img class="rounded-t-lg" src="{{ Storage::url($team->image) }}" alt="" />
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-white">
                                        {{ $team->name }}
                                    </h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-100">{{ $team->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('media-modal');
            const modalContent = document.getElementById('modal-content');
            const closeModal = document.getElementById('close-modal');

            document.querySelectorAll('.open-modal').forEach(item => {
                item.addEventListener('click', event => {
                    event.preventDefault();
                    const media = event.currentTarget.getAttribute('data-media');
                    const type = event.currentTarget.getAttribute('data-type');

                    let content = '';
                    if (type === 'image') {
                        content = `<img src="${media}" class="h-auto max-w-full rounded-lg" />`;
                    } else {
                        content = `
                            <video class="h-auto max-w-full rounded-lg" controls>
                                <source src="${media}" type="video/${media.split('.').pop()}">
                                Your browser does not support the video tag.
                            </video>
                        `;
                    }

                    modalContent.innerHTML = content;
                    modal.classList.remove('hidden');
                });
            });

            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', event => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
