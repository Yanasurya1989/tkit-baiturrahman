<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;

class HeroController extends Controller
{

    public function index()
    {
        $heros = Hero::all();
        return view('backend.admin.heros.index', compact('heros'));
    }



    public function create()
    {
        return view('backend.admin.heros.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'button1_text' => 'nullable|string',
            'button1_link' => 'nullable|url',
            'button2_text' => 'nullable|string',
            'button2_link' => 'nullable|url',
            'is_active' => 'nullable|boolean',
        ]);

        $data['image'] = $request->file('image')->store('hero', 'public');
        $data['is_active'] = $request->has('is_active'); // checkbox

        Hero::create($data);

        return redirect()->route('heros.index')->with('success', 'Hero berhasil ditambahkan');
    }


    public function edit(Hero $hero)
    {
        return view('backend.admin.heros.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'button1_text' => 'nullable|string',
            'button1_link' => 'nullable|url',
            'button2_text' => 'nullable|string',
            'button2_link' => 'nullable|url',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hero', 'public');
        }

        $hero->update($data);
        return redirect()->route('heros.index');
    }

    public function destroy(Hero $hero)
    {
        $hero->delete();
        return back();
    }

    // Untuk toggle aktif/nonaktif
    public function toggleActive(Hero $hero)
    {
        $hero->is_active = !$hero->is_active;
        $hero->save();
        return back();
    }

    public function show($id)
    {
        $hero = Hero::findOrFail($id);

        $otherHeros = Hero::where('id', '!=', $id)
            ->where('is_active', 1)
            ->latest()
            ->paginate(3, ['*'], 'sidebar_page'); // <== important to isolate pagination for sidebar

        return view('frontend.layouts.hero.show', compact('hero', 'otherHeros'));
    }
}
