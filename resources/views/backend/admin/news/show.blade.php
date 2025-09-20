@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $news->title }}</h1>

        @if ($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid mb-3" alt="Gambar Berita">
        @endif

        <div class="mb-3">
            {!! $news->content !!}
        </div>

        <a href="{{ route('backend.admin.news.index') }}" class="btn btn-secondary">Kembali ke Daftar Berita</a>
    </div>
@endsection
