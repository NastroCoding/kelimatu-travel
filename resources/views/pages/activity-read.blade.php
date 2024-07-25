@extends('layouts.main')
@section('container')
    <section id="aktifitas" class="flex justify-center items-center">
        <div class="container mx-auto">
            <div class="w-11/12 mx-auto rounded">
                @php
                    $images = json_decode($activities->image, true);
                @endphp
                <div class="mt-auto">
                    <div class="flex justify-between text-sm mb-3 text-black">
                        <p>Ditulis Oleh: <b>{{ $activities->trademark ?? 'Admin' }}</b></p>
                        @php
                            \Carbon\Carbon::setLocale('id');
                        @endphp
                        <p>{{ \Carbon\Carbon::parse($activities->date)->translatedFormat('l, d F Y') }}</p>
                    </div>
                </div>

                <div class="w-full text-white mt-5 md:mt-0 mx-auto">
                    <div class="bg-gray-700 p-5 rounded mb-2">
                        <h5 class="mb-2 text-2xl font-bold text-white">{{ $activities->title }}</h5>
                        <p class="mb-3 text-white">{{ $activities->description }}</p>
                    </div>
                </div>

                @if ($images)
                    @if (count($images) === 1)
                        <div class="flex justify-center mb-5">
                            @foreach ($images as $image)
                                @if ($image)
                                    <img class="h-auto w-full max-w-sm mx-auto rounded-lg"
                                        src="{{ asset('storage/' . $image) }}" alt="Activity Image">
                                @else
                                    <img class="h-auto w-full max-w-md mx-auto rounded-lg"
                                        src="https://via.placeholder.com/600x400?text=No+Image+Available"
                                        alt="No Image Available">
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-5 justify-center">
                            @foreach ($images as $image)
                                @if ($image)
                                    <img class="h-auto w-full mx-auto rounded-lg" src="{{ asset('storage/' . $image) }}"
                                        alt="Activity Image">
                                @else
                                    <img class="h-auto w-full mx-auto rounded-lg"
                                        src="https://via.placeholder.com/600x400?text=No+Image+Available"
                                        alt="No Image Available">
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endif

                <div class="w-full mt-5">
                    <div class="bg-gray-200 p-4 rounded-lg mb-4">
                        <h6 class="text-xl font-semibold text-gray-800">{{ $activities->topic_title }}</h6>
                        <p class="text-gray-700 mb-2"><small>{{ $activities->topic_subtitle }}</small></p>
                        <div class="text-gray-700" style="min-height: 150px;">
                            {!! $activities->topic_description !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="other">
        <div class="w-10/12 mx-auto mt-10">
            <h1 class="mb-4 text-xl font-extrabold tracking-tight leading-none md:text-2xl lg:text-3xl my-5">
                Aktifitas lainnya
            </h1>
            <div class="flex">
                <div class="md:grid gap-4 mb-10 w-2/3">
                    @foreach ($all_activities->sortByDesc('date') as $activity)
                        @if ($activity->id !== $activities->id)
                            <!-- Exclude the current activity -->
                            @php
                                $images = json_decode($activity->image, true);
                            @endphp
                            <div class="bg-gray-200 shadow-lg rounded-lg mb-5 overflow-hidden">
                                <div class="relative flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/2 h-56 md:h-auto">
                                        @if (is_array($images) && !empty($images))
                                            <img src="{{ asset('storage/' . $images[0]) }}"
                                                class="object-cover w-full h-full" alt="Activity Image">
                                        @else
                                            <img src="https://via.placeholder.com/600x400?text=No+Image+Available"
                                                class="object-cover w-full h-full" alt="No Image Available">
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
                                                <p>{{ \Carbon\Carbon::parse($activities->date)->translatedFormat('l, d F Y') }}
                                                </p>
                                            </div>
                                            <a href="/activity/{{ $activity->slug }}"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                Baca selengkapnya
                                                <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
