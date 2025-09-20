<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('backend.admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'client_name' => 'required',
            'profession' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $testimonial = new Testimonial($request->except('image'));

        if ($request->hasFile('image')) {
            $testimonial->image = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
            'client_name' => 'required',
            'profession' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->fill($request->except('image'));

        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $testimonial->image = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
    }
}
