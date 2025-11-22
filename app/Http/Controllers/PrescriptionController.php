<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PrescriptionController extends Controller
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
        $query = Prescription::with(['patient', 'doctor']);

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->whereHas('patient', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('doctor', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhere('prescription_number', 'like', "%{$search}%")
              ->orWhere('diagnosis', 'like', "%{$search}%");
        }

        $prescriptions = $query->latest()->paginate(10);
        return view('prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        $patients = Patient::where('status', 'active')->get();
        $doctors = Doctor::where('status', 'active')->get();
        $appointments = Appointment::with(['patient', 'doctor'])->get();
        return view('prescriptions.create', compact('patients', 'doctors', 'appointments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_id' => 'nullable|exists:appointments,id',
            'prescription_date' => 'required|date',
            'diagnosis' => 'required|string',
            'medications' => 'required|array',
            'medications.*.name' => 'required|string',
            'medications.*.dosage' => 'required|string',
            'medications.*.frequency' => 'required|string',
            'medications.*.duration' => 'required|string',
            'instructions' => 'nullable|string',
            'tests_recommended' => 'nullable|string',
            'follow_up_date' => 'nullable|date',
        ]);

        $validated['prescription_number'] = 'PRX-' . strtoupper(Str::random(8));
        $validated['status'] = 'active';

        Prescription::create($validated);

        return redirect()->route('prescriptions.index')->with('success', 'Prescription created successfully!');
    }

    public function show(Prescription $prescription)
    {
        $prescription->load(['patient', 'doctor', 'appointment']);
        return view('prescriptions.show', compact('prescription'));
    }

    public function edit(Prescription $prescription)
    {
        $patients = Patient::where('status', 'active')->get();
        $doctors = Doctor::where('status', 'active')->get();
        $appointments = Appointment::with(['patient', 'doctor'])->get();
        return view('prescriptions.edit', compact('prescription', 'patients', 'doctors', 'appointments'));
    }

    public function update(Request $request, Prescription $prescription)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_id' => 'nullable|exists:appointments,id',
            'prescription_date' => 'required|date',
            'diagnosis' => 'required|string',
            'medications' => 'required|array',
            'medications.*.name' => 'required|string',
            'medications.*.dosage' => 'required|string',
            'medications.*.frequency' => 'required|string',
            'medications.*.duration' => 'required|string',
            'instructions' => 'nullable|string',
            'tests_recommended' => 'nullable|string',
            'follow_up_date' => 'nullable|date',
            'status' => 'required|in:active,completed,cancelled',
        ]);

        $prescription->update($validated);

        return redirect()->route('prescriptions.index')->with('success', 'Prescription updated successfully!');
    }

    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return redirect()->route('prescriptions.index')->with('success', 'Prescription deleted successfully!');
    }
}
