@extends('backend.layouts.app')

@section('content')
    <a href="{{ route('call-to-action.create') }}" class="btn btn-success mb-3">Tambah CTA</a>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $cta)
                <tr>
                    <td>{{ $cta->title }}</td>
                    <td><img src="{{ asset('storage/' . $cta->image_path) }}" width="100"></td>
                    <td>
                        <a href="{{ route('call-to-action.edit', $cta->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('call-to-action.destroy', $cta->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
