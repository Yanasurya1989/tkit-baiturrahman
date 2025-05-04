<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return view('backend.admin.fasilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('backend.admin.fasilities.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_class' => 'required|string',
            'color_class' => 'required|string',
        ]);

        try {
            Facility::create($validated);
            return redirect()->route('facilities.index')->with('success', 'Fasilitas berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon_class' => 'required',
            'color_class' => 'required',
        ]);

        $facility->update($request->all());

        return redirect()->route('facilities.index')->with('success', 'Facility updated successfully.');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('facilities.index')->with('success', 'Facility deleted successfully.');
    }
}
