<!-- Team Start -->
{{-- <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Popular Teachers</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative">
                    <img class="img-fluid rounded-circle w-75" src="{{ asset('fe/img/team-1.jpg') }}" alt="">
                    <div class="team-text">
                        <h3>Full Name</h3>
                        <p>Designation</p>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary  mx-1" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary  mx-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item position-relative">
                    <img class="img-fluid rounded-circle w-75" src="{{ asset('fe/img/team-2.jpg') }}" alt="">
                    <div class="team-text">
                        <h3>Full Name</h3>
                        <p>Designation</p>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary  mx-1" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary  mx-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item position-relative">
                    <img class="img-fluid rounded-circle w-75" src="{{ asset('fe/img/team-3.jpg') }}" alt="">
                    <div class="team-text">
                        <h3>Full Name</h3>
                        <p>Designation</p>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary  mx-1" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary  mx-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Team End -->

@if (isset($teams) && $teams->count())
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Popular Teachers</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            @foreach ($teams as $index => $team)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + $index * 0.2 }}s">
                    <div class="team-item position-relative">
                        <img class="img-fluid rounded-circle w-75" src="{{ asset('storage/' . $team->image) }}"
                            alt="{{ $team->name }}">
                        <div class="team-text text-center bg-white p-4">
                            <h3>{{ $team->name }}</h3>
                            <p>{{ $team->designation }}</p>
                            <div class="d-flex align-items-center justify-content-center">
                                @if ($team->facebook)
                                    <a class="btn btn-square btn-primary mx-1" href="{{ $team->facebook }}"
                                        target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                @endif
                                @if ($team->twitter)
                                    <a class="btn btn-square btn-primary mx-1" href="{{ $team->twitter }}"
                                        target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @endif
                                @if ($team->instagram)
                                    <a class="btn btn-square btn-primary mx-1" href="{{ $team->instagram }}"
                                        target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-center">Belum ada anggota tim.</p>
@endif
