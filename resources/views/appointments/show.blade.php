@extends('layouts.app')

@section('title', 'Appointment Details - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-calendar-check"></i> Appointment Details</h2>
    <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('appointments.index') }}">Appointments</a> / Details</div>
</div>

<div class="card">
    <h3 class="card-title">Appointment</h3>
    <div class="grid grid-2 gap-2">
        <div>
            <div class="form-group"><label class="form-label">Patient</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $appointment->patient->name }}</div></div>
            <div class="form-group"><label class="form-label">Doctor</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $appointment->doctor->name }}</div></div>
        </div>
        <div>
            <div class="form-group"><label class="form-label">Date</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $appointment->appointment_date->format('M d, Y h:i A') }}</div></div>
            <div class="form-group"><label class="form-label">Status</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ ucfirst($appointment->status) }}</div></div>
        </div>
    </div>

    <div class="mt-2">
        <h4 class="card-title">Notes</h4>
        <div class="card" style="padding:1rem; background: rgba(255,255,255,0.05);">{{ $appointment->notes ?? 'No notes.' }}</div>
    </div>
</div>

@endsection
