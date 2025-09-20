@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Testimonial</h1>

        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="content" class="form-label">Isi Testimonial</label>
                <textarea name="content" class="form-control" required>{{ old('content', $testimonial->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="client_name" class="form-label">Nama Klien</label>
                <input type="text" name="client_name" class="form-control"
                    value="{{ old('client_name', $testimonial->client_name) }}" required>
            </div>

            <div class="mb-3">
                <label for="profession" class="form-label">Profesi</label>
                <input type="text" name="profession" class="form-control"
                    value="{{ old('profession', $testimonial->profession) }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Foto (kosongkan jika tidak diganti)</label>
                <input type="file" name="image" class="form-control">
                @if ($testimonial->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $testimonial->image) }}" class="rounded-circle"
                            style="width: 90px; height: 90px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
