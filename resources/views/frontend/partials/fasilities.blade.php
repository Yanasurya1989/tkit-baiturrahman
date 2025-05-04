<!-- Facilities Start -->
{{-- <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">School Facilities</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="facility-item">
                    <div class="facility-icon bg-primary">
                        <span class="bg-primary"></span>
                        <i class="fa fa-bus-alt fa-3x text-primary"></i>
                        <span class="bg-primary"></span>
                    </div>
                    <div class="facility-text bg-primary">
                        <h3 class="text-primary mb-3">School Bus</h3>
                        <p class="mb-0">Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero ipsum sit
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="facility-item">
                    <div class="facility-icon bg-success">
                        <span class="bg-success"></span>
                        <i class="fa fa-futbol fa-3x text-success"></i>
                        <span class="bg-success"></span>
                    </div>
                    <div class="facility-text bg-success">
                        <h3 class="text-success mb-3">Playground</h3>
                        <p class="mb-0">Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero ipsum sit
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="facility-item">
                    <div class="facility-icon bg-warning">
                        <span class="bg-warning"></span>
                        <i class="fa fa-home fa-3x text-warning"></i>
                        <span class="bg-warning"></span>
                    </div>
                    <div class="facility-text bg-warning">
                        <h3 class="text-warning mb-3">Healthy Canteen</h3>
                        <p class="mb-0">Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero ipsum sit
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="facility-item">
                    <div class="facility-icon bg-info">
                        <span class="bg-info"></span>
                        <i class="fa fa-chalkboard-teacher fa-3x text-info"></i>
                        <span class="bg-info"></span>
                    </div>
                    <div class="facility-text bg-info">
                        <h3 class="text-info mb-3">Positive Learning</h3>
                        <p class="mb-0">Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero ipsum sit
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Facilities End -->

<!-- Facilities Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">School Facilities</h1>
            <p>Fasilitas sekolah kami mendukung kegiatan belajar secara positif dan menyenangkan.</p>
        </div>
        @php use Illuminate\Support\Str; @endphp

        <div class="row g-4">
            @foreach (\App\Models\Facility::all() as $key => $facility)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="{{ 0.1 + $key * 0.2 }}s">
                    <div class="facility-item">
                        <div class="facility-icon bg-{{ $facility->color_class }}"
                            style="display: flex; justify-content: center; align-items: center; position: relative;">
                            <span class="bg-{{ $facility->color_class }}" style="position: absolute;"></span>
                            <i class="fa {{ $facility->icon_class }} fa-3x text-{{ $facility->color_class }}"></i>
                            <span class="bg-{{ $facility->color_class }}" style="position: absolute;"></span>
                        </div>
                        <div class="facility-text bg-{{ $facility->color_class }}">
                            <h3 class="text-{{ $facility->color_class }} mb-3">
                                {{ Str::limit($facility->title, 3) }}
                            </h3>
                            <p class="mb-0">
                                {{ Str::limit($facility->description, 5) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
</div>
<!-- Facilities End -->
