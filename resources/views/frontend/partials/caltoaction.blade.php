<!-- Call To Action Start -->
{{-- <div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded">
            <div class="row g-0">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="{{ asset('fe/img/call-to-action.jpg') }}"
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 d-flex flex-column justify-content-center p-5">
                        <h1 class="mb-4">Become A Teacher</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
                            diam amet diam et eos.
                            Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore
                            erat amet
                        </p>
                        <a class="btn btn-primary py-3 px-5" href="">Get Started Now<i
                                class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Call To Action End -->

<!-- Call To Action Start -->
@if ($cta)
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded"
                                src="{{ asset('storage/' . $cta->image_path) }}" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="h-100 d-flex flex-column justify-content-center p-5">
                            <h1 class="mb-4">{{ $cta->title }}</h1>
                            <div style="position: relative; max-width: 100%;">
                                <p
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%; margin-bottom: 0;">
                                    {{ \Illuminate\Support\Str::limit($cta->description, 200) }}
                                </p>
                                <span
                                    style="
                                    display: none;
                                    position: absolute;
                                    background: rgba(0, 0, 0, 0.8);
                                    color: #fff;
                                    padding: 8px;
                                    border-radius: 4px;
                                    top: 100%;
                                    left: 0;
                                    width: max-content;
                                    max-width: 300px;
                                    z-index: 999;
                                    white-space: normal;
                                ">
                                    {{ $cta->description }}
                                </span>
                            </div>

                            @if ($cta->button_link)
                                <a class="btn btn-primary py-3 px-5"
                                    href="{{ $cta->button_link }}">{{ $cta->button_text }}<i
                                        class="fa fa-arrow-right ms-2"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.querySelectorAll('[style*="position: relative"]');

            wrapper.forEach(function(el) {
                el.addEventListener('mouseenter', function() {
                    const tooltip = el.querySelector('span');
                    tooltip.style.display = 'block';
                });
                el.addEventListener('mouseleave', function() {
                    const tooltip = el.querySelector('span');
                    tooltip.style.display = 'none';
                });
            });
        });
    </script>

@endif
<!-- Call To Action End -->
