@extends('layouts.app')

@section('content')
<div>
    <div class="header">
        <h2>Admin Dashboard</h2>
        <p class="breadcrumb">Overview of system metrics</p>
    </div>

    <div class="grid grid-3 mt-3">
        <div class="card">
            <div class="card-title">Total Patients</div>
            <div style="font-size:1.5rem">{{ $totalPatients }}</div>
        </div>
        <div class="card">
            <div class="card-title">Total Doctors</div>
            <div style="font-size:1.5rem">{{ $totalDoctors }}</div>
        </div>
        <div class="card">
            <div class="card-title">Appointments</div>
            <div style="font-size:1.5rem">{{ $totalAppointments }}</div>
        </div>
    </div>
</div>
@endsection
