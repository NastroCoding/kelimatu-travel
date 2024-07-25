@extends('layouts.main')
@section('container')
    <section id="aktifitas">
        <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 mb-10 w-11/12 rounded-xl mx-auto">
            <div class="relative h-28 flex items-center justify-center">
                <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                    style="background-image: url('{{ URL::asset('dist/assets/img/masjid-nabawi.jpg') }}');">
                </div>
                <h1
                    class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white text-center md:text-3xl lg:text-4xl z-10">
                    Aktifitas
                </h1>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="md:grid gap-4 mb-10 w-5/6">
                @foreach ($activities->sortByDesc('date') as $activity)
                    @php
                        $images = json_decode($activity->image, true);
                    @endphp
                    <div class="bg-gray-200 shadow-lg rounded-lg mb-5 overflow-hidden">
                        <div class="relative flex flex-col md:flex-row">
                            <div class="w-full md:w-1/2 h-56 md:h-auto">
                                @if (is_array($images) && !empty($images))
                                    <img src="{{ asset('storage/' . $images[0]) }}" class="object-cover w-full h-full lazy"
                                        alt="Activity Image">
                                @else
                                    <img src="https://via.placeholder.com/600x400?text=No+Image+Available"
                                        class="object-cover w-full h-full lazy" alt="No Image Available">
                                @endif
                            </div>
                            <div class="w-full md:w-1/2 p-5 bg-gray-200 text-white flex flex-col justify-between">
                                <div>
                                    <h5 class="mb-2 text-2xl font-bold text-black">{{ $activity->title }}</h5>
                                    <p class="mb-3 text-black">{{ $activity->description }}</p>
                                </div>
                                <div class="mt-auto">
                                    <div class="flex justify-between text-xs mb-3 text-black">
                                        <p>Ditulis Oleh: {{ $activity->trademark }}</p>
                                        @php
                                            \Carbon\Carbon::setLocale('id');
                                        @endphp
                                        <p>{{ \Carbon\Carbon::parse($activity->date)->translatedFormat('l, d F Y') }}</p>
                                    </div>
                                    <a href="/activity/{{ $activity->slug }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Baca selengkapnya
                                        <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>


    <section id="galeri">
        <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 mb-10 w-11/12 rounded-xl mx-auto">
            <div class="relative h-28 flex items-center justify-center">
                <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                    style="background-image: url('{{ URL::asset('dist/assets/img/camera-background.jpg') }}');">
                </div>
                <h1
                    class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white text-center md:text-3xl lg:text-4xl z-10">
                    Galeri
                </h1>
            </div>
        </div>

        <div class="w-3/4 mx-auto mb-10">
            <div class="grid md:grid-cols-3 gap-4">
                @foreach ($galleries as $gallery)
                    <div class="relative bg-gray-200 shadow-lg rounded-lg overflow-hidden">
                        <a href="#" class="open-modal" data-media="{{ Storage::url($gallery->media) }}"
                            data-type="{{ in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']) ? 'image' : 'video' }}">
                            @if (in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']))
                                <img class="h-auto max-w-full rounded-t-lg lazy" src="{{ Storage::url($gallery->media) }}"
                                    alt="">
                            @else
                                <video class="h-auto max-w-full rounded-t-lg" controls>
                                    <source src="{{ Storage::url($gallery->media) }}"
                                        type="video/{{ pathinfo($gallery->media, PATHINFO_EXTENSION) }}">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </a>
                        @if (!empty($gallery->description))
                            <div class="p-4">
                                <p class="text-sm text-gray-600">{{ $gallery->description }}</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div id="media-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 hidden z-50">
            <div class="relative bg-gray-200 p-4 rounded-lg max-w-3xl w-full max-h-screen overflow-auto">
                <button id="close-modal" class="absolute top-4 right-4 text-black">X</button>
                <div id="modal-content" class="flex flex-col items-center justify-center">
                    <!-- Content will be inserted here via JavaScript -->
                </div>
            </div>
        </div>

        <style>
            #modal-content img,
            #modal-content video {
                max-width: 100%;
                max-height: 80vh;
                object-fit: contain;
            }

            #modal-content p {
                margin-top: 1rem;
                color: #4A5568;
            }
        </style>

    </section>

    <section id="testimoni">
        <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 mb-10 w-11/12 rounded-xl mx-auto">
            <div class="relative h-28 flex items-center justify-center">
                <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                    style="background-image: url('{{ URL::asset('dist/assets/img/kaabah-banner2.jpg') }}');">
                </div>
                <h1
                    class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white text-center md:text-3xl lg:text-4xl z-10">
                    Testimoni
                </h1>
            </div>
        </div>

        <div class="w-5/6 mx-auto mb-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($testimonials as $testimonial)
                    <div
                        class="testimonial-item flex-shrink-0 w-full bg-gray-200 p-6 rounded-lg shadow-md flex flex-col items-center text-center relative min-h-[400px]">
                        <img src="{{ $testimonial->image ? Storage::url($testimonial->image) : 'https://via.placeholder.com/100' }}"
                            alt="Aqil"
                            class="lazy w-16 h-20 rounded-full overflow-hidden border-2 border-gray-200 mb-4 object-cover">
                        <h3 class="font-semibold">{{ $testimonial->name }}</h3>
                        <p class="text-gray-500">{{ $testimonial->caption }}</p>
                        <div class="relative mt-2">
                            <i class="fas fa-quote-left -left-10 top-0 text-2xl text-gray-500"></i>
                            <p class="text-gray-700 m-4">
                                {{ $testimonial->description }}
                            </p>
                            <i class="fas fa-quote-right -right-10 bottom-0 text-2xl text-gray-500"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $("img.lazy").lazyload();
            const modal = document.getElementById('media-modal');
            const modalContent = document.getElementById('modal-content');
            const closeModal = document.getElementById('close-modal');

            document.querySelectorAll('.open-modal').forEach(item => {
                item.addEventListener('click', event => {
                    event.preventDefault();
                    const media = event.currentTarget.getAttribute('data-media');
                    const type = event.currentTarget.getAttribute('data-type');
                    const description = event.currentTarget.getAttribute('data-description');

                    let content = '';
                    if (type === 'image') {
                        content =
                            `<img src="${media}" class="h-auto max-w-full rounded-lg lazy" />`;
                    } else {
                        content = `
                            <video class="h-auto max-w-full rounded-lg" controls>
                                <source src="${media}" type="video/${media.split('.').pop()}">
                                Your browser does not support the video tag.
                            </video>
                        `;
                    }

                    if (description) {
                        content += `<p class="text-sm text-gray-600">${description}</p>`;
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
