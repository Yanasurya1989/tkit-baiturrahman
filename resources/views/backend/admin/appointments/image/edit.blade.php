@extends('backend.layouts.app') {{-- Sesuaikan dengan layout milikmu --}}

@section('content')
    <div class="container">
        <h4>Edit Appointment Image</h4>

        <form action="{{ route('appointment-images.update', $appointmentImage->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="image" class="form-label">Replace Image</label>
                <input type="file" name="image" class="form-control">
                @if ($appointmentImage->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $appointmentImage->image) }}" alt="Current Image" width="200">
                    </div>
                @endif
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
                    {{ $appointmentImage->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('appointment-images.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
