@extends('backend.layouts.app') {{-- Ganti sesuai layout kamu --}}

@section('content')
    <div class="container mt-4">
        <h4>Edit Team Member</h4>

        <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
            </div>

            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control" value="{{ $team->designation }}" required>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label><br>
                @if ($team->image)
                    <img src="{{ asset('storage/' . $team->image) }}" alt="Team Photo" width="100" class="mb-2"><br>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Leave empty if you don't want to change the photo</small>
            </div>

            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook URL</label>
                <input type="url" name="facebook" class="form-control" value="{{ $team->facebook }}">
            </div>

            <div class="mb-3">
                <label for="twitter" class="form-label">Twitter URL</label>
                <input type="url" name="twitter" class="form-control" value="{{ $team->twitter }}">
            </div>

            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram URL</label>
                <input type="url" name="instagram" class="form-control" value="{{ $team->instagram }}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('teams.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
