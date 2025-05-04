@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Data Hero</h1>
        <a href="{{ route('heros.create') }}" class="btn btn-primary mb-3">+ Tambah Hero</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($heros as $hero)
                    <tr>
                        <td>{{ $hero->title }}</td>
                        <td><img src="{{ asset('storage/' . $hero->image) }}" width="100"></td>
                        <td>
                            <form action="{{ route('heros.toggle', $hero) }}" method="POST">
                                @csrf @method('PATCH')
                                <button class="btn btn-sm {{ $hero->is_active ? 'btn-success' : 'btn-secondary' }}">
                                    {{ $hero->is_active ? 'Aktif' : 'Non-Aktif' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('heros.edit', $hero) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('heros.destroy', $hero) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
