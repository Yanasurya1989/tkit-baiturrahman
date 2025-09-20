@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Testimonial</h1>
        <a href="{{ route('testimonials.create') }}" class="btn btn-primary mb-3">Tambah Testimonial</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @foreach ($testimonials as $testimonial)
                <div class="col-md-6 mb-4">
                    <div class="testimonial-item bg-light rounded p-4">
                        <p class="fs-5">{{ \Illuminate\Support\Str::limit($testimonial->content, 20) }}</p>

                        <div class="d-flex align-items-center bg-white" style="border-radius: 50px 0 0 50px;">
                            <img src="{{ asset('storage/' . $testimonial->image) }}" class="img-fluid rounded-circle"
                                style="width: 90px; height: 90px;">
                            <div class="ps-3">
                                <h3 class="mb-1">{{ $testimonial->client_name }}</h3>
                                <span>{{ $testimonial->profession }}</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Hapus testimonial ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
