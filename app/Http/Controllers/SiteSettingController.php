<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{
    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/logo', $filename);
            $url = 'storage/logo/' . $filename;

            SiteSetting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $url]
            );
        }

        return back()->with('success', 'Logo berhasil diperbarui.');
    }
}
