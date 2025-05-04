<form action="{{ route('navbar.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Judul Menu</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>URL</label>
        <input type="text" name="url" class="form-control">
    </div>
    <div class="mb-3">
        <label>Tipe Menu</label>
        <select name="type" class="form-control">
            <option value="link">Link Biasa</option>
            <option value="dropdown">Dropdown</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Parent</label>
        <select name="parent_id" class="form-control">
            <option value="">-- Tidak ada (root) --</option>
            @foreach ($navbarItems as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Urutan</label>
        <input type="number" name="order" class="form-control" value="0">
    </div>
    <div class="mb-3">
        <label>Status Aktif</label>
        <select name="is_active" class="form-control">
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Menu</button>
</form>
