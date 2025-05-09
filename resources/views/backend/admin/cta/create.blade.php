@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Call To Action</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('call-to-action.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="button_text" class="form-label">Teks Tombol (opsional)</label>
                <input type="text" name="button_text" class="form-control" value="{{ old('button_text') }}">
            </div>

            <div class="mb-3">
                <label for="button_link" class="form-label">Link Tombol (opsional)</label>
                <input type="url" name="button_link" class="form-control" value="{{ old('button_link') }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar (opsional)</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('call-to-action.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
