@extends('backend.layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Daftar Fasilitas</h4>
            <a href="{{ route('facilities.create') }}" class="btn btn-primary">+ Tambah Fasilitas</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Icon</th>
                    <th>Warna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facilities as $facility)
                    <tr>
                        <td>{{ $facility->title }}</td>
                        <td>{{ $facility->description }}</td>
                        <td><i class="fa {{ $facility->icon }}"></i> ({{ $facility->icon }})</td>
                        <td><span class="badge bg-{{ $facility->color_class }}">{{ $facility->color_class }}</span></td>
                        <td>
                            <a href="{{ route('facilities.edit', $facility) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('facilities.destroy', $facility) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus fasilitas ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
