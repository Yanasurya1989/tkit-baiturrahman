@extends('backend.layouts.app') {{-- Ganti sesuai layout kamu --}}

@section('content')
    <div class="container mt-4">
        <h4>Create New Team Member</h4>

        <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo (square recommended)</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook URL</label>
                <input type="url" name="facebook" class="form-control">
            </div>

            <div class="mb-3">
                <label for="twitter" class="form-label">Twitter URL</label>
                <input type="url" name="twitter" class="form-control">
            </div>

            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram URL</label>
                <input type="url" name="instagram" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('teams.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
