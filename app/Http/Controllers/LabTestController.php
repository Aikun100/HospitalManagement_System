<?php

namespace App\Http\Controllers;

use App\Models\LabTest;
use Illuminate\Http\Request;

class LabTestController extends Controller
{
    public function index()
    {
        $tests = LabTest::latest()->paginate(10);
        return view('lab_tests.index', compact('tests'));
    }

    public function create()
    {
        return view('lab_tests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:lab_tests',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        LabTest::create($validated);
        return redirect()->route('lab_tests.index')->with('success', 'Lab Test added successfully!');
    }

    public function edit(LabTest $labTest)
    {
        return view('lab_tests.edit', compact('labTest'));
    }

    public function update(Request $request, LabTest $labTest)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:lab_tests,code,' . $labTest->id,
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $labTest->update($validated);
        return redirect()->route('lab_tests.index')->with('success', 'Lab Test updated successfully!');
    }

    public function destroy(LabTest $labTest)
    {
        $labTest->delete();
        return redirect()->route('lab_tests.index')->with('success', 'Lab Test deleted successfully!');
    }
}
