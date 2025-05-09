@extends('backend.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Appointment</h2>

        <form method="POST" action="{{ route('backend.admin.appointments.update', $appointment) }}">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-sm-6">
                    <input type="text" name="gurdian_name" class="form-control"
                        value="{{ old('gurdian_name', $appointment->gurdian_name) }}">
                    @error('gurdian_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="email" name="gurdian_email" class="form-control"
                        value="{{ old('gurdian_email', $appointment->gurdian_email) }}">
                    @error('gurdian_email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="child_name" class="form-control"
                        value="{{ old('child_name', $appointment->child_name) }}">
                    @error('child_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="child_age" class="form-control"
                        value="{{ old('child_age', $appointment->child_age) }}">
                    @error('child_age')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <textarea name="message" class="form-control" rows="4">{{ old('message', $appointment->message) }}</textarea>
                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <button class="btn btn-success w-100" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
