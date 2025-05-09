<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();
        // $classes = SchoolClass::where('status', 1)->get();
        // $classes = SchoolClass::where('status', 1)->latest()->get();
        return view('backend.admin.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('backend.admin.classes.create');
    }

    public function toggleStatus(SchoolClass $class)
    {
        $class->status = !$class->status;
        $class->save();

        return back()->with('success', 'Class status updated.');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'teacher_name' => 'required',
            'teacher_image' => 'image|nullable',
            'class_image' => 'image|nullable',
            'price' => 'required|numeric',
            'age_range' => 'required',
            'time' => 'required',
            'capacity' => 'required',
            'description' => 'nullable',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('teacher_image')) {
            $data['teacher_image'] = $request->file('teacher_image')->store('teachers', 'public');
        }
        if ($request->hasFile('class_image')) {
            $data['class_image'] = $request->file('class_image')->store('classes', 'public');
        }

        SchoolClass::create($data);
        return redirect()->route('backend.admin.classes.index')->with('success', 'Class created.');
    }


    public function edit(SchoolClass $class)
    {
        return view('backend.admin.classes.edit', compact('class'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $data = $request->validate([
            'title' => 'required',
            'teacher_name' => 'required',
            'teacher_image' => 'image|nullable',
            'class_image' => 'image|nullable',
            'price' => 'required|numeric',
            'age_range' => 'required',
            'time' => 'required',
            'capacity' => 'required',
            'description' => 'nullable',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('teacher_image')) {
            $data['teacher_image'] = $request->file('teacher_image')->store('teachers', 'public');
        }
        if ($request->hasFile('class_image')) {
            $data['class_image'] = $request->file('class_image')->store('classes', 'public');
        }

        $class->update($data);
        return redirect()->route('backend.admin.classes.index')->with('success', 'Class updated.');
    }


    public function destroy(SchoolClass $class)
    {
        $class->delete();
        return redirect()->route('backend.admin.classes.index')->with('success', 'Class deleted.');
    }

    public function frontendClasses()
    {
        // $classes = SchoolClass::latest()->get();
        $classes = SchoolClass::where('status', 1)->latest()->get();
        return view('frontend.layouts.master', compact('classes'));
    }
}
