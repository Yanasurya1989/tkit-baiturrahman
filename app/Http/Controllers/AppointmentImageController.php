<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentImage;
use Illuminate\Support\Facades\Storage;

class AppointmentImageController extends Controller
{
    public function index()
    {
        $images = AppointmentImage::all();
        return view('backend.admin.appointments.image.index', compact('images'));
    }

    public function create()
    {
        return view('backend.admin.appointments.image.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('uploads/appointments', 'public');

        AppointmentImage::create([
            'image_path' => $path,
            'is_active' => false,
        ]);

        return redirect()->route('appointment-images.index')->with('success', 'Image added successfully.');
    }

    public function edit(AppointmentImage $appointmentImage)
    {
        return view('backend.admin.appointments.image.edit', compact('appointmentImage'));
    }

    public function update(Request $request, AppointmentImage $appointmentImage)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($appointmentImage->image_path);
            $path = $request->file('image')->store('uploads/appointments', 'public');
            $appointmentImage->image_path = $path;
        }

        $appointmentImage->save();

        return redirect()->route('appointment-images.index')->with('success', 'Image updated.');
    }

    public function destroy(AppointmentImage $appointmentImage)
    {
        Storage::disk('public')->delete($appointmentImage->image_path);
        $appointmentImage->delete();

        return redirect()->route('appointment-images.index')->with('success', 'Image deleted.');
    }

    public function toggleStatus($id)
    {
        $image = AppointmentImage::findOrFail($id);

        // nonaktifkan semua dulu
        AppointmentImage::where('id', '!=', $id)->update(['is_active' => false]);

        // aktifkan gambar yang dipilih
        $image->is_active = true;
        $image->save();

        return redirect()->route('appointment-images.index')->with('success', 'Active image updated.');
    }
}
