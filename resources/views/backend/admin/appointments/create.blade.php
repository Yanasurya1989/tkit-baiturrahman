@extends('backend.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Make Appointment</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('appointments.store') }}">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <input type="text" name="gurdian_name" class="form-control" placeholder="Gurdian Name"
                        value="{{ old('gurdian_name') }}">
                    @error('gurdian_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="email" name="gurdian_email" class="form-control" placeholder="Gurdian Email"
                        value="{{ old('gurdian_email') }}">
                    @error('gurdian_email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="child_name" class="form-control" placeholder="Child Name"
                        value="{{ old('child_name') }}">
                    @error('child_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="child_age" class="form-control" placeholder="Child Age"
                        value="{{ old('child_age') }}">
                    @error('child_age')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <textarea name="message" class="form-control" placeholder="Message" rows="4">{{ old('message') }}</textarea>
                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
