@extends('backend.layouts.app')

@section('content')
    <a href="{{ route('teams.create') }}" class="btn btn-primary mb-2">Tambah Anggota</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->designation }}</td>
                    <td>
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
