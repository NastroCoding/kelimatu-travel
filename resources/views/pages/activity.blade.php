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
                                    <img src="{{ asset('storage/' . $images[0]) }}"
                                        class="object-cover w-full h-full lazyload" alt="Activity Image">
                                @else
                                    <img src="https://via.placeholder.com/600x400?text=No+Image+Available"
                                        class="object-cover w-full h-full lazyload" alt="No Image Available">
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
    
            <div class="w-3/4 mx-auto my-10">
                <div id="gallery-container" class="grid md:grid-cols-3 gap-4">
                    @foreach ($galleries->sortByDesc('created_at')->take(6) as $gallery)
                        <div class="relative bg-gray-200 shadow-lg rounded-lg overflow-hidden">
                            <a href="#" class="open-modal" data-media="{{ Storage::url($gallery->media) }}"
                                data-type="{{ in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']) ? 'image' : 'video' }}"
                                data-description="{{ $gallery->description }}">
                                <div class="aspect-w-16">
                                    @if (in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']))
                                        <img src="{{ Storage::url($gallery->media) }}" class="aspect-content rounded-t-lg lazyload"
                                            alt="">
                                    @else
                                        <video class="aspect-content rounded-t-lg" controls>
                                            <source src="{{ Storage::url($gallery->media) }}"
                                                type="video/{{ pathinfo($gallery->media, PATHINFO_EXTENSION) }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                            </a>
                            @if (!empty($gallery->description))
                                <div class="p-4">
                                    <p class="text-sm text-gray-600">{{ $gallery->description }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <button id="load-more" class="bg-blue-500 text-white px-4 py-2 rounded">Lihat Foto Lainnya</button>
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
    
                .aspect-w-16 {
                    position: relative;
                    width: 100%;
                }
    
                .aspect-w-16::before {
                    content: '';
                    display: block;
                    padding-top: 56.25%;
                    /* 16:9 aspect ratio */
                }
    
                .aspect-w-16>.aspect-content {
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    /* Use 'cover' to maintain aspect ratio and cover the area, 'contain' if you want to fit inside */
                }
            </style>
        </div>
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
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
                @foreach ($testimonials->sortByDesc('created_at') as $testimonial)
                    <div
                        class="testimonial-item flex-shrink-0 w-full bg-gray-200 p-6 rounded-lg shadow-md flex flex-col items-center text-center relative min-h-[400px]">
                        <img src="{{ $testimonial->image ? Storage::url($testimonial->image) : 'https://via.placeholder.com/100' }}"
                            alt="Aqil"
                            class="lazyload w-16 h-20 rounded-full overflow-hidden border-2 border-gray-200 mb-4 object-cover">
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
            const modal = document.getElementById('media-modal');
            const modalContent = document.getElementById('modal-content');
            const closeModal = document.getElementById('close-modal');

            // Event delegation for dynamically added items
            document.addEventListener('click', event => {
                if (event.target.closest('.open-modal')) {
                    event.preventDefault();
                    const item = event.target.closest('.open-modal');
                    const media = item.getAttribute('data-media');
                    const type = item.getAttribute('data-type');
                    const description = item.getAttribute('data-description');

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

                    if (description) {
                        content += `<p class="text-sm text-gray-600">${description}</p>`;
                    }

                    modalContent.innerHTML = content;
                    modal.classList.remove('hidden');
                }
            });

            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', event => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });

            let currentIndex = 6; // Initial number of images loaded
            const loadMoreButton = document.getElementById('load-more');

            loadMoreButton.addEventListener('click', () => {
                fetch(`/load-more-galleries?start=${currentIndex}`)
                    .then(response => response.json())
                    .then(data => {
                        const galleryContainer = document.getElementById('gallery-container');
                        data.galleries.forEach(gallery => {
                            const mediaType = ['jpeg', 'png', 'jpg', 'gif', 'webp'].includes(
                                gallery.extension) ? 'image' : 'video';
                            const mediaElement = mediaType === 'image' ?
                                `<div class="aspect-w-16">
                            <img class="aspect-content rounded-t-lg" src="${gallery.media}" alt="">
                        </div>` :
                                `<div class="aspect-w-16">
                            <video class="aspect-content rounded-t-lg" controls>
                                <source src="${gallery.media}" type="video/${gallery.extension}">
                                Your browser does not support the video tag.
                            </video>
                        </div>`;

                            const galleryItem = document.createElement('div');
                            galleryItem.classList.add('relative', 'bg-gray-200', 'shadow-lg',
                                'rounded-lg', 'overflow-hidden');
                            galleryItem.innerHTML = `
                        <a href="#" class="open-modal" data-media="${gallery.media}" data-type="${mediaType}" data-description="${gallery.description}">
                            ${mediaElement}
                        </a>
                        ${gallery.description ? `<div class="p-4"><p class="text-sm text-gray-600">${gallery.description}</p></div>` : ''}
                    `;
                            galleryContainer.appendChild(galleryItem);
                        });

                        currentIndex += data.galleries.length;
                        if (!data.hasMore) {
                            loadMoreButton.style.display = 'none';
                        }
                    });
            });
        });
    </script>
@endsection
