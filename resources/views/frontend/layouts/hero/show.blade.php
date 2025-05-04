@extends('frontend.layouts.master_detile')

@section('content')
    <div class="container py-5">
        <div class="row">
            {{-- Konten Utama --}}
            <div class="col-lg-8 col-md-12 order-1 order-lg-1">

                <img src="{{ asset('storage/' . $hero->image) }}" alt="{{ $hero->title }}" class="img-fluid mb-4"
                    style="max-height: 500px; object-fit: cover; width: 100%;">

                <h1 class="mb-4">{{ $hero->title }}</h1>

                <p>{{ $hero->description }}</p>

                @if ($hero->button2_text)
                    <a href="{{ $hero->button2_link }}" class="btn btn-secondary mt-3">{{ $hero->button2_text }}</a>
                @endif
            </div>

            {{-- Sidebar: tampil di md ke atas, sticky --}}
            <div class="col-lg-4 col-md-5 order-3 ">
                <div class="position-sticky" style="top: 80px;">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <strong>Hero Lainnya</strong>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($otherHeros as $h)
                                <li class="list-group-item">
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $h->image) }}" class="img-fluid rounded"
                                            style="height: 100px; object-fit: cover; width: 100%;"
                                            alt="{{ $h->title }}">
                                    </div>
                                    <h6 class="mb-1">{{ $h->title }}</h6>
                                    <p class="mb-1 text-muted">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($h->description), 80) }}</p>
                                    <a href="{{ route('hero.show', $h->id) }}"
                                        class="btn btn-sm btn-outline-primary mt-1">Lihat</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="card-footer">
                            {{ $otherHeros->appends(['sidebar_page' => $otherHeros->currentPage()])->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
