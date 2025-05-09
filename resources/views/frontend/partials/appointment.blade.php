<!-- Appointment Start -->
{{-- <div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded">
            <div class="row g-0">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 d-flex flex-column justify-content-center p-5">
                        <h1 class="mb-4">Make Appointment</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="gname"
                                            placeholder="Gurdian Name">
                                        <label for="gname">Gurdian Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="gmail"
                                            placeholder="Gurdian Email">
                                        <label for="gmail">Gurdian Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="cname"
                                            placeholder="Child Name">
                                        <label for="cname">Child Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="cage"
                                            placeholder="Child Age">
                                        <label for="cage">Child Age</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="{{ asset('fe/img/appointment.jpg') }}"
                            style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Appointment End -->

<!-- resources/views/frontend/appointments.blade.php -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded">
            <div class="row g-0">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 d-flex flex-column justify-content-center p-5">
                        <h1 class="mb-4">Make Appointment</h1>

                        <!-- Jika ada pesan sukses, tampilkan di bagian atas -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Form yang mengirim data menggunakan POST -->
                        <form action="{{ route('backend.admin.appointments.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" name="gurdian_name" class="form-control border-0"
                                            id="gname" placeholder="Gurdian Name" required>
                                        <label for="gname">Gurdian Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" name="gurdian_email" class="form-control border-0"
                                            id="gmail" placeholder="Gurdian Email" required>
                                        <label for="gmail">Gurdian Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" name="child_name" class="form-control border-0"
                                            id="cname" placeholder="Child Name" required>
                                        <label for="cname">Child Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" name="child_age" class="form-control border-0"
                                            id="cage" placeholder="Child Age" required>
                                        <label for="cage">Child Age</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="message" class="form-control border-0" placeholder="Leave a message here" id="message"
                                            style="height: 100px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        {{-- <img class="position-absolute w-100 h-100 rounded" src="{{ asset('fe/img/appointment.jpg') }}"
                            style="object-fit: cover;"> --}}
                        @php
                            $activeImage = \App\Models\AppointmentImage::where('is_active', true)->first();
                        @endphp

                        <img class="position-absolute w-100 h-100 rounded"
                            src="{{ $activeImage ? asset('storage/' . $activeImage->image_path) : asset('fe/img/appointment.jpg') }}"
                            style="object-fit: cover;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
