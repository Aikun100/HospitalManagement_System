<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BillingController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check()) {
                return redirect()->route('login');
            }
            // Assuming admin and doctor can manage billing, or maybe just admin
            if (!in_array(auth()->user()->role, ['admin', 'doctor'])) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $query = Billing::with('patient');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->whereHas('patient', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhere('invoice_number', 'like', "%{$search}%");
        }

        $bills = $query->latest()->paginate(10);
        return view('billing.index', compact('bills'));
    }

    public function create()
    {
        $patients = Patient::where('status', 'active')->get();
        $appointments = Appointment::where('status', 'completed')->doesntHave('billing')->get();
        return view('billing.create', compact('patients', 'appointments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_id' => 'nullable|exists:appointments,id',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid,refunded',
            'payment_method' => 'nullable|string',
            'transaction_id' => 'nullable|string',
            'billing_date' => 'required|date',
        ]);

        $validated['invoice_number'] = 'INV-' . strtoupper(Str::random(8));

        Billing::create($validated);

        return redirect()->route('billing.index')->with('success', 'Invoice created successfully!');
    }

    public function show(Billing $billing)
    {
        $billing->load(['patient', 'appointment']);
        return view('billing.show', compact('billing'));
    }

    public function edit(Billing $billing)
    {
        $patients = Patient::where('status', 'active')->get();
        return view('billing.edit', compact('billing', 'patients'));
    }

    public function update(Request $request, Billing $billing)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid,refunded',
            'payment_method' => 'nullable|string',
            'transaction_id' => 'nullable|string',
            'billing_date' => 'required|date',
        ]);

        $billing->update($validated);

        return redirect()->route('billing.index')->with('success', 'Invoice updated successfully!');
    }

    public function destroy(Billing $billing)
    {
        $billing->delete();
        return redirect()->route('billing.index')->with('success', 'Invoice deleted successfully!');
    }
}
