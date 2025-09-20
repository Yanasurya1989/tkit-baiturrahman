@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Testimonial</h1>

        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Isi Testimonial</label>
                <textarea name="content" class="form-control" required>{{ old('content') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="client_name" class="form-label">Nama Klien</label>
                <input type="text" name="client_name" class="form-control" value="{{ old('client_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="profession" class="form-label">Profesi</label>
                <input type="text" name="profession" class="form-control" value="{{ old('profession') }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
