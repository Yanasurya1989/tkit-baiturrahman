@php
    $heros = \App\Models\Hero::where('is_active', true)->get();
@endphp

@if ($heros->count())
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            @foreach ($heros as $hero)
                <div class="owl-carousel-item position-relative">
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Hero Image"
                        style="width: 100%; height: 500px; object-fit: cover; object-position: center;">

                    {{-- <img src="{{ asset('storage/' . $hero->image) }}" alt="Hero Image"
                        style="width: 100%; height: 500px; object-fit: contain; background-color: #000;"> --}}


                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">{{ $hero->title }}</h1>
                                    {{-- <p class="fs-5 fw-medium text-white mb-4 pb-2">{{ $hero->description }}</p> --}}
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">
                                        {{ \Illuminate\Support\Str::limit($hero->description, 250, ' [...]') }}
                                    </p>

                                    @if ($hero->button1_text)
                                        {{-- <a href="{{ $hero->button1_link }}"
                                            class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">{{ $hero->button1_text }}</a> --}}
                                        <a href="{{ route('hero.show', $hero->id) }}"
                                            class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">
                                            {{ $hero->button1_text }}
                                        </a>
                                    @endif
                                    @if ($hero->button2_text)
                                        <a href="{{ $hero->button2_link }}"
                                            class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">{{ $hero->button2_text }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Carousel End -->
@endif
