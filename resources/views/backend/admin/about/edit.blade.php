@extends('backend.layouts.app')

@section('content')
    <div class="container py-4">
        <h4>Edit Fasilitas</h4>

        {{-- FLASH MESSAGE --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name="title" value="{{ old('title', $about->title) }}" class="form-control mb-2" required>
            <textarea name="paragraph_1" class="form-control mb-2" required>{{ old('paragraph_1', $about->paragraph_1) }}</textarea>
            <textarea name="paragraph_2" class="form-control mb-2">{{ old('paragraph_2', $about->paragraph_2) }}</textarea>

            <input type="text" name="button_text" value="{{ old('button_text', $about->button_text) }}"
                class="form-control mb-2">
            <input type="text" name="button_link" value="{{ old('button_link', $about->button_link) }}"
                class="form-control mb-2">

            <input type="text" name="user_name" value="{{ old('user_name', $about->user_name) }}"
                class="form-control mb-2">
            <input type="text" name="user_title" value="{{ old('user_title', $about->user_title) }}"
                class="form-control mb-2">

            <label>Foto Pengguna:</label>
            <input type="file" name="user_image" class="form-control mb-2">

            <label>Gambar 1:</label>
            <input type="file" name="image_1" class="form-control mb-2">

            <label>Gambar 2:</label>
            <input type="file" name="image_2" class="form-control mb-2">

            <label>Gambar 3:</label>
            <input type="file" name="image_3" class="form-control mb-2">

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                    {{ $about->is_active ? 'checked' : '' }}>
                <label class="form-check-label">Tampilkan Section Ini</label>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
