<!-- About Start -->
{{-- <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-4">Learn More About Our Work And Our Cultural Activities</h1>
                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
                    Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                </p>
                <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam
                    rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus
                    dolor eos, ipsum labore duo duo sit no sea diam. Et dolor et kasd ea. Eirmod diam at dolor
                    est vero nonumy magna.</p>
                <div class="row g-4 align-items-center">
                    <div class="col-sm-6">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle flex-shrink-0" src="{{ asset('fe/img/user.jpg') }}"
                                alt="" style="width: 45px; height: 45px;">
                            <div class="ms-3">
                                <h6 class="text-primary mb-1">Jhon Doe</h6>
                                <small>CEO & Founder</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="img-fluid w-75 rounded-circle bg-light p-3" src="{{ asset('fe/img/about-1.jpg') }}"
                            alt="">
                    </div>
                    <div class="col-6 text-start" style="margin-top: -150px;">
                        <img class="img-fluid w-100 rounded-circle bg-light p-3" src="{{ asset('fe/img/about-2.jpg') }}"
                            alt="">
                    </div>
                    <div class="col-6 text-end" style="margin-top: -150px;">
                        <img class="img-fluid w-100 rounded-circle bg-light p-3" src="{{ asset('fe/img/about-3.jpg') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- About End -->

@php
    $about = \App\Models\AboutSection::where('is_active', true)->latest()->first();
@endphp

@php
    use Illuminate\Support\Str;
@endphp

@if ($about)
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-4">{{ $about->title }}</h1>
                    {{-- Paragraph 1 --}}
                    <p title="{{ $about->paragraph_1 }}">
                        {{ Str::limit($about->paragraph_1, 2) }}
                    </p>

                    {{-- Paragraph 2 --}}
                    <p class="mb-4" title="{{ $about->paragraph_2 }}">
                        {{ Str::limit($about->paragraph_2, 2) }}
                    </p>
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-6">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ $about->button_link ?? '#' }}">
                                {{ $about->button_text ?? 'Selengkapnya' }}
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle flex-shrink-0"
                                    src="{{ asset('storage/' . $about->user_image) }}" alt="{{ $about->user_name }}"
                                    style="width: 45px; height: 45px;">
                                <div class="ms-3">
                                    <h6 class="text-primary mb-1">{{ $about->user_name }}</h6>
                                    <small>{{ $about->user_title }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img class="img-fluid w-75 rounded-circle bg-light p-3"
                                src="{{ asset('storage/' . $about->image_1) }}" alt="About Image 1">
                        </div>
                        <div class="col-6 text-start" style="margin-top: -150px;">
                            <img class="img-fluid w-100 rounded-circle bg-light p-3"
                                src="{{ asset('storage/' . $about->image_2) }}" alt="About Image 2">
                        </div>
                        <div class="col-6 text-end" style="margin-top: -150px;">
                            <img class="img-fluid w-100 rounded-circle bg-light p-3"
                                src="{{ asset('storage/' . $about->image_3) }}" alt="About Image 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endif
