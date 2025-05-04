@csrf
<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $hero->title ?? '') }}">
</div>
<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="description" class="form-control">{{ old('description', $hero->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Gambar</label>
    <input type="file" name="image" class="form-control">
    @isset($hero)
        <img src="{{ asset('storage/' . $hero->image) }}" width="150" class="mt-2">
    @endisset
</div>
<div class="mb-3">
    <label>Button 1 (Text & Link)</label>
    <input type="text" name="button1_text" class="form-control mb-1"
        value="{{ old('button1_text', $hero->button1_text ?? '') }}">
    <input type="text" name="button1_link" class="form-control"
        value="{{ old('button1_link', $hero->button1_link ?? '') }}">
</div>
<div class="mb-3">
    <label>Button 2 (Text & Link)</label>
    <input type="text" name="button2_text" class="form-control mb-1"
        value="{{ old('button2_text', $hero->button2_text ?? '') }}">
    <input type="text" name="button2_link" class="form-control"
        value="{{ old('button2_link', $hero->button2_link ?? '') }}">
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
