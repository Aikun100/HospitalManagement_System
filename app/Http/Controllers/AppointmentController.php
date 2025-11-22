<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            if (!$user) {
                return redirect()->route('login');
            }
            if (!in_array($user->role, ['admin', 'doctor'])) {
                abort(403);
            }
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        $query = Appointment::with(['patient', 'doctor']);

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->whereHas('patient', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('doctor', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhere('status', 'like', "%{$search}%")
              ->orWhere('appointment_number', 'like', "%{$search}%");
        }

        $appointments = $query->latest()->paginate(10);
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::where('status', 'active')->get();
        $doctors = Doctor::where('status', 'active')->get();
        return view('appointments.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string',
            'type' => 'required|in:consultation,follow_up,emergency,routine_checkup',
            'reason' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $validated['appointment_number'] = 'APT-' . strtoupper(Str::random(8));
        $validated['status'] = 'scheduled';

        Appointment::create($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully!');
    }

    public function show(Appointment $appointment)
    {
        $appointment->load(['patient', 'doctor', 'prescription']);
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $patients = Patient::where('status', 'active')->get();
        $doctors = Doctor::where('status', 'active')->get();
        return view('appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string',
            'type' => 'required|in:consultation,follow_up,emergency,routine_checkup',
            'status' => 'required|in:scheduled,confirmed,completed,cancelled,no_show',
            'reason' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully!');
    }
}
