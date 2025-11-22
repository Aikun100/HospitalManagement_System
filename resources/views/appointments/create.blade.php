@extends('layouts.app')

@section('title', 'Add Appointment - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-calendar-plus"></i> New Appointment</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('appointments.index') }}">Appointments</a> / New
    </div>
</div>

<div class="card">
    <h3 class="card-title">Appointment Details</h3>
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        @include('appointments._form')

        <div class="d-flex gap-2 mt-3">
            <button class="btn btn-primary"><i class="fas fa-save"></i> Schedule</button>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
