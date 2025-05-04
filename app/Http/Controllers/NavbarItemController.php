<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\NavbarItem;
use Illuminate\Http\Request;

class NavbarItemController extends Controller
{
    public function indexHapusIniJikaIndexYangBawahBerjalan()
    {
        $items = NavbarItem::whereNull('parent_id')->with('children')->orderBy('order')->get();
        return view('backend.admin.navbar.index', compact('items'));
    }

    public function index()
    {
        $items = NavbarItem::whereNull('parent_id')->with('children')->orderBy('order')->get();
        $navbarItems = NavbarItem::orderBy('order')->get(); // ← ini yang dibutuhkan form
        $logo = \App\Models\Logo::latest()->first();

        return view('backend.admin.navbar.index', compact('items', 'navbarItems', 'logo'));
    }


    public function store(Request $request)
    {
        NavbarItem::create($request->only('title', 'url', 'type', 'parent_id', 'order', 'is_active'));
        return back()->with('success', 'Menu ditambahkan.');
    }

    public function edit($id)
    {
        $item = NavbarItem::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = NavbarItem::findOrFail($id);
        $item->update($request->only('title', 'url', 'type', 'parent_id', 'order', 'is_active'));
        return back()->with('success', 'Menu diperbarui.');
    }

    public function destroy($id)
    {
        NavbarItem::findOrFail($id)->delete();
        return back()->with('success', 'Menu dihapus.');
    }

    public function updateOrder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            NavbarItem::where('id', $id)->update(['order' => $index]);
        }
        return response()->json(['success' => true]);
    }
}
