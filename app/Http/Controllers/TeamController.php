<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('backend.admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('backend.admin.teams.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('teams', 'public');
        }

        Team::create($data);
        return redirect()->route('teams.index')->with('success', 'Team member added.');
    }

    public function edit(Team $team)
    {
        return view('backend.admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('teams', 'public');
        }

        $team->update($data);
        return redirect()->route('teams.index')->with('success', 'Team member updated.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team member deleted.');
    }

    public function frontendHapusIniJikaYangBawahBisa()
    {
        // Ambil data dari semua model yang dibutuhkan oleh section dinamis
        $teams = \App\Models\Team::all();

        // Bisa juga tambahkan data lain kalau kamu punya section lain
        return view('frontend.layouts.master', compact('teams'));
    }

    public function frontend()
    {
        $sections = \App\Models\SectionSetting::where('is_active', true)
            ->orderBy('order')
            ->pluck('section_name')
            ->toArray();

        $teams = \App\Models\Team::all();
        $testimonials = \App\Models\Testimonial::all();
        $classes = \App\Models\SchoolClass::all(); // Tambahkan jika partial "classes" butuh ini
        // Tambahkan model lain sesuai kebutuhan section

        return view('frontend.layouts.master', compact('sections', 'teams', 'classes', 'testimonials'));
    }
}
