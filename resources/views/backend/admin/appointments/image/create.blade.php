@extends('backend.layouts.app') {{-- Sesuaikan dengan layout milikmu --}}

@section('content')
    <div class="container">
        <h4>Create Appointment Image</h4>

        <form action="{{ route('appointment-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                <label class="form-check-label" for="is_active">Active</label>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('appointment-images.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
