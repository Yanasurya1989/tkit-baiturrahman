<?php

namespace App\Http\Controllers;

use App\Models\CallToAction;
use Illuminate\Http\Request;

class CallToActionController extends Controller
{
    public function index()
    {
        $data = CallToAction::all();
        return view('backend.admin.cta.index', compact('data'));
    }

    public function homepage()
    {
        $cta = CallToAction::latest()->first(); // atau filter dengan kondisi tertentu
        return view('frontend.layouts.master', compact('cta'));
    }


    public function create()
    {
        return view('backend.admin.cta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'button_text' => 'nullable',
            'button_link' => 'nullable|url',
            'image' => 'nullable|image|max:2048'
        ]);

        $cta = new CallToAction($request->only('title', 'description', 'button_text', 'button_link'));

        if ($request->hasFile('image')) {
            $cta->image_path = $request->file('image')->store('cta', 'public');
        }

        $cta->save();

        return redirect()->route('call-to-action.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(CallToAction $call_to_action)
    {
        return view('backend.admin.cta.edit', compact('call_to_action'));
    }

    public function update(Request $request, CallToAction $call_to_action)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'button_text' => 'nullable',
            'button_link' => 'nullable|url',
            'image' => 'nullable|image|max:2048'
        ]);

        $call_to_action->fill($request->only('title', 'description', 'button_text', 'button_link'));

        if ($request->hasFile('image')) {
            $call_to_action->image_path = $request->file('image')->store('cta', 'public');
        }

        $call_to_action->save();

        return redirect()->route('call-to-action.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(CallToAction $call_to_action)
    {
        $call_to_action->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
