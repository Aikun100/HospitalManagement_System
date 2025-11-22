@extends('layouts.app')

@section('content')
<div>
    <div class="header">
        <h2>Doctor Dashboard</h2>
        <p class="breadcrumb">Your appointments and patients</p>
    </div>

    <div class="grid grid-2 mt-3">
        <div class="card">
            <div class="card-title">Today Appointments</div>
            <div style="font-size:1.5rem">{{ $todayAppointments }}</div>
        </div>
        <div class="card">
            <div class="card-title">Pending Appointments</div>
            <div style="font-size:1.5rem">{{ $pendingAppointments }}</div>
        </div>
    </div>
</div>
@endsection
