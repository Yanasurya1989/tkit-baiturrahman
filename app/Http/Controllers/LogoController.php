<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|max:2048',
            'institution_name' => 'nullable|string|max:255',
        ]);

        // Hapus logo lama
        $oldLogo = Logo::latest()->first();
        if ($oldLogo && Storage::disk('public')->exists($oldLogo->path)) {
            Storage::disk('public')->delete($oldLogo->path);
        }

        // Simpan logo baru
        $path = $request->file('logo')->store('logos', 'public');

        Logo::create([
            'path' => $path,
            'institution_name' => $request->input('institution_name'),
        ]);

        return back()->with('success', 'Logo berhasil diunggah.');
    }
}
