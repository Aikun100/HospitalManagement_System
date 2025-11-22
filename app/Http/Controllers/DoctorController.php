<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            if (!$user) {
                return redirect()->route('login');
            }
            if ($user->role !== 'admin') {
                abort(403);
            }
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        $query = Doctor::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('specialization', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        $doctors = $query->latest()->paginate(10);
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'qualification' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'license_number' => 'required|string|unique:doctors,license_number',
            'bio' => 'nullable|string',
        ]);

        $validated['status'] = 'active';

        Doctor::create($validated);

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully!');
    }

    public function show(Doctor $doctor)
    {
        $doctor->load(['appointments.patient', 'prescriptions.patient']);
        return view('doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'qualification' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'license_number' => 'required|string|unique:doctors,license_number,' . $doctor->id,
            'status' => 'required|in:active,inactive,on_leave',
            'bio' => 'nullable|string',
        ]);

        $doctor->update($validated);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}
