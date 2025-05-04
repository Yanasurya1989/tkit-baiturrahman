@extends('backend.layouts.app') {{-- Sesuaikan dengan layout-mu --}}

{{-- @section('content')
    <div class="container">
        <h4>Kelola Menu Navbar</h4>

        <form action="{{ route('navbar.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="row g-2">
                <div class="col"><input type="text" name="title" class="form-control" placeholder="Judul" required></div>
                <div class="col"><input type="text" name="url" class="form-control"
                        placeholder="URL (contoh: about)"></div>
                <div class="col">
                    <select name="type" class="form-control">
                        <option value="link">Link</option>
                        <option value="dropdown">Dropdown</option>
                    </select>
                </div>
                <div class="col"><button class="btn btn-success">Tambah</button></div>
            </div>
        </form>

        <ul id="navbar-sortable" class="list-group">
            @foreach ($items as $item)
                <li class="list-group-item" data-id="{{ $item->id }}">
                    {{ $item->title }} ({{ $item->type }})
                    <form action="{{ route('navbar.destroy', $item->id) }}" method="POST" class="d-inline float-end">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection --}}

@section('content')
    <div class="container py-4">
        <div class="row">
            {{-- Kolom Menu Navbar --}}
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">Kelola Menu Navigasi</div>
                    <div class="card-body">
                        @include('backend.admin.navbar.navbar_form')

                        <hr>
                        {{-- Daftar menu yang sudah dibuat --}}
                        <ul class="list-group" id="navbar-sortable">
                            @foreach ($items as $item)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        {{ $item->title }} <small class="text-muted">({{ $item->type }})</small>
                                        <span>
                                            <a href="{{ route('navbar.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('navbar.destroy', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </span>
                                    </div>

                                    {{-- Tampilkan submenu jika ada --}}
                                    @if ($item->children->count())
                                        <ul class="list-group mt-2 ms-3">
                                            @foreach ($item->children as $child)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    — {{ $child->title }} <small
                                                        class="text-muted">({{ $child->type }})</small>
                                                    <span>
                                                        <a href="{{ route('navbar.edit', $child->id) }}"
                                                            class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="{{ route('navbar.destroy', $child->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Logo Website</div>
                    <div class="card-body">
                        @if ($logo)
                            <p>Logo saat ini:</p>
                            <img src="{{ asset('storage/' . $logo->path) }}" alt="Logo" height="80">
                        @endif

                        <form action="{{ route('navbar.logo.store') }}" method="POST" enctype="multipart/form-data"
                            class="mt-3">
                            @csrf
                            <div class="mb-3">
                                <label for="logo">Upload Logo</label>
                                <input type="file" name="logo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="institution_name">Nama Lembaga (opsional)</label>
                                <input type="text" name="institution_name" class="form-control"
                                    value="{{ old('institution_name') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Logo</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $('#navbar-sortable').sortable({
                update: function(event, ui) {
                    let order = [];
                    $('#navbar-sortable li').each(function(index) {
                        order.push($(this).data('id'));
                    });

                    $.post("{{ route('navbar.updateOrder') }}", {
                        _token: '{{ csrf_token() }}',
                        order: order
                    }, function(data) {
                        console.log(data);
                    });
                }
            });
        });
    </script>
@endpush
