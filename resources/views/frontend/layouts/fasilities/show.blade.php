@extends('frontend.layouts.master_detile')

@section('content')
    <div class="container py-5">
        <div class="row">
            {{-- Konten Utama --}}
            <div class="col-lg-8 col-md-12 order-1 order-lg-1">

                <div class="mb-4">
                    <div class="facility-icon bg-{{ $facility->color_class }}"
                        style="display: flex; justify-content: center; align-items: center; position: relative; height: 200px;">
                        <i class="fa {{ $facility->icon_class }} fa-5x text-white"></i>
                    </div>
                </div>

                <h1 class="mb-4 text-{{ $facility->color_class }}">{{ $facility->title }}</h1>

                <p>{!! $facility->description !!}</p>

                @if ($facility->link)
                    <a href="{{ $facility->link }}" class="btn btn-outline-{{ $facility->color_class }} mt-3" target="_blank">
                        Kunjungi Tautan
                    </a>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4 col-md-5 order-3">
                <div class="position-sticky" style="top: 80px;">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <strong>Fasilitas Lainnya</strong>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($otherFacilities as $item)
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="me-3">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-{{ $item->color_class }}"
                                                style="width: 50px; height: 50px;">
                                                <i class="fa {{ $item->icon_class }} text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">{{ $item->title }}</h6>
                                            <p class="mb-1 text-muted">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 60) }}</p>
                                            <a href="{{ route('facility.show', $item->id) }}"
                                                class="btn btn-sm btn-outline-primary mt-1">Lihat</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="card-footer">
                            {{ $otherFacilities->appends(['sidebar_page' => $otherFacilities->currentPage()])->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
