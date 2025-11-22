@extends('layouts.app')

@section('title', 'Doctor Details - Hospital Management System')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-user-md"></i> Doctor Details</h2>
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('doctors.index') }}">Doctors</a> / Details
            </div>
        </div>
        <div>
            <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
        </div>
    </div>
    
</div>

<div class="card">
    <h3 class="card-title">{{ $doctor->name }}</h3>
    <div class="grid grid-2 gap-2">
        <div>
            <div class="form-group"><label class="form-label">Specialty</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $doctor->specialty ?? '—' }}</div></div>
            <div class="form-group"><label class="form-label">Email</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $doctor->email }}</div></div>
        </div>
        <div>
            <div class="form-group"><label class="form-label">Phone</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $doctor->phone }}</div></div>
            <div class="form-group"><label class="form-label">Notes</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $doctor->notes ?? 'No notes.' }}</div></div>
        </div>
    </div>
</div>

@endsection
