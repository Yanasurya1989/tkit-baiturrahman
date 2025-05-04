@extends('backend.layouts.app')

@section('content')
    <div class="container py-4">
        <h4>Edit Fasilitas</h4>
        <form action="{{ route('facilities.update', $facility) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" required value="{{ old('title', $facility->title) }}">
            </div>

            <div class="mb-3">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description', $facility->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="icon">Icon (Font Awesome, contoh: fa-bus-alt)</label>
                <input type="text" name="icon" class="form-control" required
                    value="{{ old('icon', $facility->icon) }}">
            </div>

            <div class="mb-3">
                <label for="color_class">Warna Background (contoh: primary, success, danger)</label>
                <input type="text" name="color_class" class="form-control" required
                    value="{{ old('color_class', $facility->color_class) }}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
