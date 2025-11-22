@extends('layouts.app')

@section('title', 'Appointments - Hospital Management System')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-calendar-check"></i> Appointments</h2>
            <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / Appointments</div>
        </div>
        <a href="{{ route('appointments.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> New Appointment</a>
    </div>
    
</div>

<div class="card">
    <h3 class="card-title">Upcoming Appointments</h3>
    <div class="mt-2 mb-2 d-flex justify-between align-center">
        <form action="{{ route('appointments.index') }}" method="GET" style="max-width:420px; width:100%;">
            <div style="position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by patient, doctor or status..." class="form-control" style="padding-right: 40px;" />
                <button type="submit" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: rgba(255,255,255,0.7); cursor: pointer;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->appointment_date->format('M d, Y h:i A') }}</td>
                    <td>
                        @if($appointment->status == 'scheduled')<span class="badge badge-info">Scheduled</span>
                        @elseif($appointment->status == 'confirmed')<span class="badge badge-success">Confirmed</span>
                        @elseif($appointment->status == 'completed')<span class="badge badge-secondary">Completed</span>
                        @else<span class="badge badge-danger">Cancelled</span>@endif
                    </td>
                    <td>@include('partials.action_buttons', ['model' => $appointment, 'routePrefix' => 'appointments'])</td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">No appointments found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $appointments->links() }}</div>
</div>



@endsection
