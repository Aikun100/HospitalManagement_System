<?php

namespace App\Http\Controllers;

use App\Models\TestResult;
use App\Models\LabTest;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class TestResultController extends Controller
{
    public function index(Request $request)
    {
        $query = TestResult::with(['patient', 'labTest']);

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->whereHas('patient', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('labTest', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $results = $query->latest()->paginate(10);
        return view('test_results.index', compact('results'));
    }

    public function create()
    {
        $patients = Patient::where('status', 'active')->get();
        $doctors = Doctor::where('status', 'active')->get();
        $tests = LabTest::where('status', 'active')->get();
        return view('test_results.create', compact('patients', 'doctors', 'tests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'lab_test_id' => 'required|exists:lab_tests,id',
            'test_date' => 'required|date',
            'status' => 'required|in:pending,completed,cancelled',
            'result_value' => 'nullable|string',
            'comments' => 'nullable|string',
        ]);

        TestResult::create($validated);
        return redirect()->route('test_results.index')->with('success', 'Test Result recorded successfully!');
    }

    public function show(TestResult $testResult)
    {
        return view('test_results.show', compact('testResult'));
    }

    public function edit(TestResult $testResult)
    {
        $patients = Patient::where('status', 'active')->get();
        $doctors = Doctor::where('status', 'active')->get();
        $tests = LabTest::where('status', 'active')->get();
        return view('test_results.edit', compact('testResult', 'patients', 'doctors', 'tests'));
    }

    public function update(Request $request, TestResult $testResult)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
            'result_value' => 'nullable|string',
            'comments' => 'nullable|string',
        ]);

        $testResult->update($validated);
        return redirect()->route('test_results.index')->with('success', 'Test Result updated successfully!');
    }

    public function destroy(TestResult $testResult)
    {
        $testResult->delete();
        return redirect()->route('test_results.index')->with('success', 'Test Result deleted successfully!');
    }
}
