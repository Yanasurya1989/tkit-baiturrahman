@extends('backend.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">All Appointments</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('backend.admin.appointments.create') }}" class="btn btn-primary mb-3">Create Appointment</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gurdian Name</th>
                    <th>Email</th>
                    <th>Child Name</th>
                    <th>Child Age</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $appointment->gurdian_name }}</td>
                        <td>{{ $appointment->gurdian_email }}</td>
                        <td>{{ $appointment->child_name }}</td>
                        <td>{{ $appointment->child_age }}</td>
                        <td>{{ $appointment->message }}</td>
                        <td>
                            <a href="{{ route('backend.admin.appointments.edit', $appointment) }}"
                                class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('backend.admin.appointments.destroy', $appointment) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No appointments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
