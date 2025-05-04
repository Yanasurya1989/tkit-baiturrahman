<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SectionSetting;

class SectionSettingController extends Controller
{
    public function index()
    {
        $sections = SectionSetting::orderBy('order')->get();
        return view('backend.admin.sections.index', compact('sections'));
    }

    public function updateOrder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            SectionSetting::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json(['status' => 'success']);
    }

    public function toggle($id)
    {
        $section = SectionSetting::findOrFail($id);
        $section->is_active = !$section->is_active;
        $section->save();

        return response()->json(['status' => 'success', 'is_active' => $section->is_active]);
    }

    public function view_dashboard()
    {
        return view('backend.admin.dashboard');
    }
}
