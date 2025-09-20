@extends('backend.layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1>{{ isset($news) ? 'Edit' : 'Tambah' }} Berita</h1>
        <form action="{{ isset($news) ? route('backend.admin.news.update', $news->id) : route('backend.admin.news.store') }}"
            method="POST" enctype="multipart/form-data">

            @csrf
            @if (isset($news))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $news->title ?? '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Isi Berita</label>
                <textarea name="content" class="form-control" rows="5" required>{{ old('content', $news->content ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Gambar (optional)</label>
                <input type="file" name="image" class="form-control">
                @if (isset($news) && $news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" width="150" class="mt-2">
                @endif
            </div>

            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
