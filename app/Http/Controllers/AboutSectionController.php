<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    // public function index()
    // {
    //     $abouts = AboutSection::latest()->first();
    //     return view('backend.admin.about.index', compact('abouts'));
    // }

    public function index()
    {
        $abouts = AboutSection::latest()->get(); // sebelumnya pakai ->first()
        return view('backend.admin.about.index', compact('abouts'));
    }

    public function edit(AboutSection $about)
    {
        return view('backend.admin.about.edit', ['about' => $about]);
    }

    public function update(Request $request, AboutSection $about)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'paragraph_1' => 'required|string',
            'paragraph_2' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'user_name' => 'nullable|string|max:255',
            'user_title' => 'nullable|string|max:255',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->has('is_active') && $request->is_active) {
            AboutSection::where('id', '!=', $about->id)->update(['is_active' => false]);
        }

        $data = $request->only([
            'title',
            'paragraph_1',
            'paragraph_2',
            'button_text',
            'button_link',
            'user_name',
            'user_title'
        ]);

        // Handle image uploads
        foreach (['user_image', 'image_1', 'image_2', 'image_3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('about_images', 'public');
            }
        }

        $data['is_active'] = $request->has('is_active');

        $about->update($data);

        return redirect()->route('about.index')->with('success', 'About berhasil diupdate');
    }

    public function create()
    {
        return view('backend.admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'paragraph_1' => 'required|string',
            'paragraph_2' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|url',
            'user_name' => 'nullable|string|max:255',
            'user_title' => 'nullable|string|max:255',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        // Nonaktifkan data lain jika is_active diset true
        if ($request->is_active) {
            AboutSection::where('is_active', true)->update(['is_active' => false]);
        }

        // Ambil data kecuali gambar
        $data = $request->except(['user_image', 'image_1', 'image_2', 'image_3']);

        // Simpan file upload jika ada
        foreach (['user_image', 'image_1', 'image_2', 'image_3'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $request->file($imageField)->store('about_images', 'public');
            }
        }

        // Simpan ke database
        AboutSection::create($data);

        return redirect()->route('about.create')->with('success', 'Data berhasil disimpan!');
    }




    public function show($id)
    {
        // Ambil data facility berdasarkan ID
        $about = AboutSection::findOrFail($id);

        // Kirim data ke view
        return view('backend.admin.about.show', compact('about'));
    }

    public function toggleStatus($id)
    {
        $about = AboutSection::findOrFail($id);
        $about->is_active = !$about->is_active;
        $about->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
