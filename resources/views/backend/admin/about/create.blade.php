@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah About Section</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Paragraf 1</label>
                <textarea name="paragraph_1" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>Paragraf 2</label>
                <textarea name="paragraph_2" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Button Text</label>
                <input type="text" name="button_text" class="form-control">
            </div>

            <div class="mb-3">
                <label>Button Link</label>
                <input type="url" name="button_link" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nama User</label>
                <input type="text" name="user_name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jabatan User</label>
                <input type="text" name="user_title" class="form-control">
            </div>

            <div class="mb-3">
                <label>Foto User</label>
                <input type="file" name="user_image" class="form-control">
            </div>

            <div class="mb-3">
                <label>Gambar 1</label>
                <input type="file" name="image_1" class="form-control">
            </div>

            <div class="mb-3">
                <label>Gambar 2</label>
                <input type="file" name="image_2" class="form-control">
            </div>

            <div class="mb-3">
                <label>Gambar 3</label>
                <input type="file" name="image_3" class="form-control">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active">
                <label class="form-check-label" for="is_active">
                    Aktifkan section ini
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
