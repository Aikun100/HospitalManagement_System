@extends('layouts.app')

@section('title', 'Patient Details - Hospital Management System')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-user-injured"></i> Patient Details</h2>
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('patients.index') }}">Patients</a> / Details
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
            <form action="{{ route('patients.destroy', $patient) }}" method="POST" onsubmit="return confirm('Delete this patient?');" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <h3 class="card-title">{{ $patient->name }} <small style="color: rgba(255,255,255,0.7); font-weight:500;">({{ $patient->patient_id }})</small></h3>

    <div class="grid grid-2 gap-2 mt-2">
        <div>
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <div class="form-control" style="background: transparent; border: none; padding: 0;">{{ $patient->name }}</div>
            </div>

            <div class="form-group">
                <label class="form-label">Date of Birth</label>
                <div class="form-control" style="background: transparent; border: none; padding: 0;">{{ \Carbon\Carbon::parse($patient->date_of_birth)->format('M d, Y') }}</div>
            </div>

            <div class="form-group">
                <label class="form-label">Gender</label>
                <div class="form-control" style="background: transparent; border: none; padding: 0;">{{ ucfirst($patient->gender) }}</div>
            </div>

            <div class="form-group">
                <label class="form-label">Blood Group</label>
                <div class="form-control" style="background: transparent; border: none; padding: 0;">{{ $patient->blood_group ?? 'N/A' }}</div>
            </div>
        </div>

        <div>
            <div class="form-group">
                <label class="form-label">Phone</label>
                <div class="form-control" style="background: transparent; border: none; padding: 0;">{{ $patient->phone }}</div>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <div class="form-control" style="background: transparent; border: none; padding: 0;">{{ $patient->email }}</div>
            </div>

            <div class="form-group">
                <label class="form-label">Status</label>
                <div>
                    @if($patient->status == 'active')
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-secondary">Inactive</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Registered At</label>
                <div class="form-control" style="background: transparent; border: none; padding: 0;">{{ $patient->created_at->format('M d, Y h:i A') }}</div>
            </div>
        </div>
    </div>

    <div class="mt-2">
        <h4 style="color: rgba(255,255,255,0.8); margin-bottom: 0.5rem;">Address</h4>
        <div class="card" style="padding:1rem; background: rgba(255,255,255,0.05);">
            <p style="color: rgba(255,255,255,0.95);">{{ $patient->address }}</p>
        </div>
    </div>

    <div class="grid grid-2 gap-2 mt-2">
        <div>
            <h4 class="card-title">Medical History</h4>
            <div class="card" style="padding:1rem; background: rgba(255,255,255,0.05);">{{ $patient->medical_history ?? 'No history provided.' }}</div>
        </div>

        <div>
            <h4 class="card-title">Allergies</h4>
            <div class="card" style="padding:1rem; background: rgba(255,255,255,0.05);">{{ $patient->allergies ?? 'No allergies noted.' }}</div>
        </div>
    </div>
</div>
@endsection
