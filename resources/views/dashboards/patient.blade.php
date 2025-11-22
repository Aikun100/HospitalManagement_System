@extends('layouts.app')

@section('content')
<div>
    <div class="header">
        <h2>Patient Dashboard</h2>
        <p class="breadcrumb">Your appointments and prescriptions</p>
    </div>

    <div class="grid grid-2 mt-3">
        <div class="card">
            <div class="card-title">Upcoming Appointments</div>
            <div style="font-size:1.25rem">{{ $totalAppointments }}</div>
        </div>
        <div class="card">
            <div class="card-title">Prescriptions</div>
            <div style="font-size:1.25rem">{{ $totalPrescriptions }}</div>
        </div>
    </div>
</div>
@endsection
