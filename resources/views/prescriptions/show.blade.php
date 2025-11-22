@extends('layouts.app')

@section('title', 'Prescription Details - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-prescription"></i> Prescription Details</h2>
    <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('prescriptions.index') }}">Prescriptions</a> / Details</div>
</div>

<div class="card">
    <h3 class="card-title">{{ $prescription->medication }}</h3>
    <div class="grid grid-2 gap-2">
        <div>
            <div class="form-group"><label class="form-label">Patient</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $prescription->patient->name }}</div></div>
            <div class="form-group"><label class="form-label">Doctor</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ optional($prescription->doctor)->name ?? '—' }}</div></div>
        </div>
        <div>
            <div class="form-group"><label class="form-label">Instructions</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $prescription->instructions ?? '—' }}</div></div>
        </div>
    </div>
</div>

@endsection
