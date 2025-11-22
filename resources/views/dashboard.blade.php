@extends('layouts.app')

@section('title', 'Dashboard - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-chart-line"></i> Dashboard</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / Dashboard
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-4 gap-2 mb-3">
    <div class="card">
        <div class="d-flex justify-between align-center">
            <div>
                <h3 style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 0.5rem;">Total Patients</h3>
                <p style="color: white; font-size: 2rem; font-weight: 700;">{{ $totalPatients }}</p>
            </div>
            <div style="width: 60px; height: 60px; background: rgba(16, 185, 129, 0.2); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-user-injured" style="font-size: 2rem; color: #10b981;"></i>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="d-flex justify-between align-center">
            <div>
                <h3 style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 0.5rem;">Total Doctors</h3>
                <p style="color: white; font-size: 2rem; font-weight: 700;">{{ $totalDoctors }}</p>
            </div>
            <div style="width: 60px; height: 60px; background: rgba(59, 130, 246, 0.2); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-user-md" style="font-size: 2rem; color: #3b82f6;"></i>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="d-flex justify-between align-center">
            <div>
                <h3 style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 0.5rem;">Today's Appointments</h3>
                <p style="color: white; font-size: 2rem; font-weight: 700;">{{ $todayAppointments }}</p>
            </div>
            <div style="width: 60px; height: 60px; background: rgba(245, 158, 11, 0.2); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-calendar-check" style="font-size: 2rem; color: #f59e0b;"></i>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="d-flex justify-between align-center">
            <div>
                <h3 style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 0.5rem;">Low Stock Items</h3>
                <p style="color: white; font-size: 2rem; font-weight: 700;">{{ $lowStockItems }}</p>
            </div>
            <div style="width: 60px; height: 60px; background: rgba(239, 68, 68, 0.2); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-exclamation-triangle" style="font-size: 2rem; color: #ef4444;"></i>
            </div>
        </div>
    </div>
</div>

<!-- Additional Stats -->
<div class="grid grid-3 gap-2 mb-3">
    <div class="card">
        <div class="d-flex justify-between align-center">
            <div>
                <h3 style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 0.5rem;">Total Appointments</h3>
                <p style="color: white; font-size: 1.5rem; font-weight: 700;">{{ $totalAppointments }}</p>
            </div>
            <i class="fas fa-calendar-alt" style="font-size: 2rem; color: rgba(255,255,255,0.5);"></i>
        </div>
    </div>

    <div class="card">
        <div class="d-flex justify-between align-center">
            <div>
                <h3 style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 0.5rem;">Pending Appointments</h3>
                <p style="color: white; font-size: 1.5rem; font-weight: 700;">{{ $pendingAppointments }}</p>
            </div>
            <i class="fas fa-clock" style="font-size: 2rem; color: rgba(255,255,255,0.5);"></i>
        </div>
    </div>

    <div class="card">
        <div class="d-flex justify-between align-center">
            <div>
                <h3 style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 0.5rem;">Total Prescriptions</h3>
                <p style="color: white; font-size: 1.5rem; font-weight: 700;">{{ $totalPrescriptions }}</p>
            </div>
            <i class="fas fa-prescription" style="font-size: 2rem; color: rgba(255,255,255,0.5);"></i>
        </div>
    </div>
</div>

<!-- Recent Data -->
<div class="grid grid-2 gap-2">
    <!-- Recent Appointments -->
    <div class="card">
        <div class="d-flex justify-between align-center mb-2">
            <h3 class="card-title" style="margin-bottom: 0;">Recent Appointments</h3>
            <a href="{{ route('appointments.index') }}" class="btn btn-sm btn-secondary">View All</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentAppointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>{{ $appointment->appointment_date->format('M d, Y') }}</td>
                        <td>
                            @if($appointment->status == 'scheduled')
                                <span class="badge badge-info">{{ ucfirst($appointment->status) }}</span>
                            @elseif($appointment->status == 'confirmed')
                                <span class="badge badge-success">{{ ucfirst($appointment->status) }}</span>
                            @elseif($appointment->status == 'completed')
                                <span class="badge badge-secondary">{{ ucfirst($appointment->status) }}</span>
                            @else
                                <span class="badge badge-danger">{{ ucfirst($appointment->status) }}</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No appointments found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Patients -->
    <div class="card">
        <div class="d-flex justify-between align-center mb-2">
            <h3 class="card-title" style="margin-bottom: 0;">Recent Patients</h3>
            <a href="{{ route('patients.index') }}" class="btn btn-sm btn-secondary">View All</a>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPatients as $patient)
                    <tr>
                        <td>{{ $patient->patient_id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>
                            @if($patient->status == 'active')
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No patients found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="card mt-3">
    <h3 class="card-title">Quick Actions</h3>
    <div class="d-flex gap-2">
        <a href="{{ route('patients.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add Patient
        </a>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">
            <i class="fas fa-calendar-plus"></i> New Appointment
        </a>
        <a href="{{ route('prescriptions.create') }}" class="btn btn-info">
            <i class="fas fa-prescription"></i> Create Prescription
        </a>
        <a href="{{ route('inventory.create') }}" class="btn btn-warning">
            <i class="fas fa-box"></i> Add Inventory
        </a>
    </div>
</div>
@endsection
