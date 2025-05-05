@extends('backend.layouts.app')

@section('content')
    <div class="container py-4">
        <h4>Edit Fasilitas</h4>

        {{-- FLASH MESSAGE --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
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

        <form action="{{ route('facilities.update', $facility) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $facility->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ old('description', $facility->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="icon_class">Icon</label>
                <select name="icon_class" class="form-control @error('icon_class') is-invalid @enderror" required>
                    <option value="">-- Pilih Icon --</option>
                    <option value="fa-bus-alt"
                        {{ old('icon_class', $facility->icon_class) == 'fa-bus-alt' ? 'selected' : '' }}>Bus (fa-bus-alt)
                    </option>
                    <option value="fa-hospital"
                        {{ old('icon_class', $facility->icon_class) == 'fa-hospital' ? 'selected' : '' }}>Rumah Sakit
                        (fa-hospital)</option>
                    <option value="fa-school"
                        {{ old('icon_class', $facility->icon_class) == 'fa-school' ? 'selected' : '' }}>Sekolah (fa-school)
                    </option>
                    <option value="fa-wifi" {{ old('icon_class', $facility->icon_class) == 'fa-wifi' ? 'selected' : '' }}>
                        WiFi (fa-wifi)</option>
                    <option value="fa-camera"
                        {{ old('icon_class', $facility->icon_class) == 'fa-camera' ? 'selected' : '' }}>Camera (fa-camera)
                    </option>
                    <option value="fa-truck"
                        {{ old('icon_class', $facility->icon_class) == 'fa-truck' ? 'selected' : '' }}>Truck (fa-truck)
                    </option>
                </select>
                @error('icon_class')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="color_class">Warna Background</label>
                <select name="color_class" class="form-control @error('color_class') is-invalid @enderror" required>
                    <option value="">-- Pilih Warna --</option>
                    <option value="primary"
                        {{ old('color_class', $facility->color_class) == 'primary' ? 'selected' : '' }}>Biru (primary)
                    </option>
                    <option value="success"
                        {{ old('color_class', $facility->color_class) == 'success' ? 'selected' : '' }}>Hijau (success)
                    </option>
                    <option value="danger" {{ old('color_class', $facility->color_class) == 'danger' ? 'selected' : '' }}>
                        Merah (danger)</option>
                    <option value="warning"
                        {{ old('color_class', $facility->color_class) == 'warning' ? 'selected' : '' }}>Kuning (warning)
                    </option>
                    <option value="info" {{ old('color_class', $facility->color_class) == 'info' ? 'selected' : '' }}>
                        Biru Muda (info)</option>
                    <option value="dark" {{ old('color_class', $facility->color_class) == 'dark' ? 'selected' : '' }}>
                        Gelap (dark)</option>
                </select>
                @error('color_class')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
