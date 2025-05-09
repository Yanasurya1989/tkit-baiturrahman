@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Call To Action</h1>

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

        <form action="{{ route('call-to-action.update', $call_to_action->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" required
                    value="{{ old('title', $call_to_action->title) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $call_to_action->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="button_text" class="form-label">Teks Tombol (opsional)</label>
                <input type="text" name="button_text" class="form-control"
                    value="{{ old('button_text', $call_to_action->button_text) }}">
            </div>

            <div class="mb-3">
                <label for="button_link" class="form-label">Link Tombol (opsional)</label>
                <input type="url" name="button_link" class="form-control"
                    value="{{ old('button_link', $call_to_action->button_link) }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Baru (opsional)</label>
                <input type="file" name="image" class="form-control">
                @if ($call_to_action->image_path)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $call_to_action->image_path) }}" alt="Current Image"
                            class="img-thumbnail" width="200">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('call-to-action.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
