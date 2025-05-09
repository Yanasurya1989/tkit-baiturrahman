<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::latest()->get();
        return view('backend.admin.appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('backend.admin.appointments.create');
    }

    public function storeIniUntukInsertDaiBackend(Request $request)
    {
        $request->validate([
            'gurdian_name' => 'required|string|max:255',
            'gurdian_email' => 'required|email',
            'child_name' => 'required|string|max:255',
            'child_age' => 'required|string|max:10',
            'message' => 'nullable|string',
        ]);

        Appointment::create($request->all());

        return redirect()->back()->with('success', 'Appointment submitted successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gurdian_name' => 'required|string|max:255',
            'gurdian_email' => 'required|email',
            'child_name' => 'required|string|max:255',
            'child_age' => 'required|string|max:10',
            'message' => 'nullable|string',
        ]);

        Appointment::create($request->all()); // Menyimpan data appointment ke database

        return redirect()->back()->with('success', 'Appointment submitted successfully!');
    }

    public function edit(Appointment $appointment)
    {
        return view('backend.admin.appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'gurdian_name' => 'required|string|max:255',
            'gurdian_email' => 'required|email',
            'child_name' => 'required|string|max:255',
            'child_age' => 'required|string|max:10',
            'message' => 'nullable|string',
        ]);

        $appointment->update($request->all());

        return redirect()->route('backend.admin.appointments.index')->with('success', 'Appointment updated.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('backend.admin.appointments.index')->with('success', 'Appointment deleted.');
    }
}
