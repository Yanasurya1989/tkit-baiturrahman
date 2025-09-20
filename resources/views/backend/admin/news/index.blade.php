@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Berita</h1>
        <a href="{{ route('backend.admin.news.create') }}" class="btn btn-primary mb-3">+ Tambah Berita</a>

        @foreach ($news as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $item->title }}</h5>
                    <p>{{ Str::limit(strip_tags($item->content), 100) }}</p>
                    <a href="{{ route('backend.admin.news.show', $item->id) }}" class="btn btn-sm btn-info">Lihat</a>
                    <a href="{{ route('backend.admin.news.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('backend.admin.news.destroy', $item->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach

        {{ $news->links() }}
    </div>
@endsection
