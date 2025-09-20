<!-- Footer Start -->
{{-- <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Get In Touch</h3>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Quick Links</h3>
                <a class="btn btn-link text-white-50" href="">About Us</a>
                <a class="btn btn-link text-white-50" href="">Contact Us</a>
                <a class="btn btn-link text-white-50" href="">Our Services</a>
                <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Photo Gallery</h3>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('fe/img/classes-1.jpg') }}"
                            alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('fe/img/classes-2.jpg') }}"
                            alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('fe/img/classes-3.jpg') }}"
                            alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('fe/img/classes-4.jpg') }}"
                            alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('fe/img/classes-5.jpg') }}"
                            alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('fe/img/classes-6.jpg') }}"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Newsletter</h3>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="Your email">
                    <button type="button"
                        class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Footer End -->


<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <!-- School Identity Column -->
            <div class="col-lg-6">
                <div class="d-flex align-items-center mb-3">

                    {{-- @if (isset($logo))
                        <img src="{{ asset('storage/' . $logo->path) }}" alt="Logo Sekolah" class="me-3"
                            style="width: 60px; height: 60px;">
                        <h3 class="text-white mb-0">{{ $logo->institution_name ?? 'Nama Institusi' }}</h3>
                    @else
                        <img src="{{ asset('fe/img/logo.png') }}" alt="Logo Default" class="me-3"
                            style="width: 60px; height: 60px;">
                        <h3 class="text-white mb-0">TKIT Baiturrahman</h3>
                    @endif --}}

                    @php
                        $logoData = \App\Models\Logo::latest()->first();
                    @endphp

                    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                        @if ($logoData)
                            <img src="{{ asset('storage/' . $logoData->path) }}" alt="Logo" style="height: 40px;">
                            @if ($logoData->institution_name)
                                <span class="ms-2 fw-bold">{{ $logoData->institution_name }}</span>
                            @endif
                        @else
                            <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>Kider</h1>
                        @endif
                    </a>

                </div>
                <p class="mb-3">Jl. Pemukti Baru, Tlogo, Prambanan, Klaten, Jawa Tengah, Indonesia Kode Pos. 55598</p>
                <div class="d-flex">
                    <a class="btn btn-outline-light btn-social me-2" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social me-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Google Maps Column -->
            <div class="col-lg-6">
                <div class="rounded overflow-hidden shadow" style="height: 250px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.941550395875!2d-122.08424968469292!3d37.42199977982533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb0c9437b5351%3A0x4353e18c8b0384e4!2sGoogleplex!5e0!3m2!1sen!2sid!4v1615539402905!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                &copy; <a class="text-white" href="#">TKIT Baiturrahman</a>, All Rights Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a class="text-white me-3" href="#">Home</a>
                <a class="text-white me-3" href="#">Privacy</a>
                <a class="text-white" href="#">Contact</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
