@extends('layouts.main')
@section('container')
    <section id="aktifitas">
        <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 mb-10">
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
            <div class="md:grid grid-cols-2 gap-4 mb-10 w-5/6">
                @foreach ($activities->sortByDesc('date') as $activity)
                    @php
                        $images = json_decode($activity->image, true);
                    @endphp
                    <div
                        class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
                        <div id="gallery-{{ $activity->id }}" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                @if (is_array($images) && !empty($images))
                                    @foreach ($images as $index => $image)
                                        <div class="hidden duration-700 ease-in-out @if ($index == 0) active @endif"
                                            data-carousel-item>
                                            <img src="{{ asset('storage/' . $image) }}"
                                                class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                alt="Activity Image {{ $index + 1 }}">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="duration-700 ease-in-out active" data-carousel-item>
                                        <img src="https://via.placeholder.com/600x400?text=No+Image+Available"
                                            class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="No Image Available">
                                    </div>
                                @endif
                            </div>
                            @if (is_array($images) && count($images) > 1)
                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            @endif
                        </div>
        
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $activity->title }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $activity->description }}</p>
                            <div class="flex justify-between">
                                <p class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400">Ditulis Oleh:
                                    <br>{{ $activity->author }}</p>
                                <p class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($activity->date)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
        
                <!-- Add more cards as needed -->
            </div>
        </div>
        
    </section>


    <section id="galeri">
        <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 mb-10">
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
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($galleries as $gallery)
                    <div class="relative bg-white shadow-lg rounded-lg overflow-hidden">
                        <a href="#" class="open-modal" data-media="{{ Storage::url($gallery->media) }}"
                            data-type="{{ in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']) ? 'image' : 'video' }}">
                            @if (in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']))
                                <img class="h-auto max-w-full rounded-t-lg" src="{{ Storage::url($gallery->media) }}"
                                    alt="" loading="lazy">
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
            <div class="relative bg-white p-4 rounded-lg max-w-3xl w-full max-h-screen overflow-auto">
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
        <div class="bg-gray-700 border border-gray-200 dark:border-gray-700 mb-10">
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
                        class="testimonial-item flex-shrink-0 w-full bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center relative min-h-[400px]">
                        <img src="{{ $testimonial->image ? Storage::url($testimonial->image) : 'https://via.placeholder.com/100' }}"
                            alt="Aqil"
                            class="w-16 h-20 rounded-full overflow-hidden border-2 border-gray-200 mb-4 object-cover">
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
    
            document.querySelectorAll('.open-modal').forEach(item => {
                item.addEventListener('click', event => {
                    event.preventDefault();
                    const media = event.currentTarget.getAttribute('data-media');
                    const type = event.currentTarget.getAttribute('data-type');
                    const description = event.currentTarget.getAttribute('data-description');
    
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
