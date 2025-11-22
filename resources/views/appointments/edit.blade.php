@extends('layouts.app')

@section('title', 'Edit Appointment - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-edit"></i> Edit Appointment</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('appointments.index') }}">Appointments</a> / Edit
    </div>
</div>

<div class="card">
    <h3 class="card-title">Edit Appointment</h3>
    <form action="{{ route('appointments.update', $appointment) }}" method="POST">
        @csrf
        @method('PUT')
        @include('appointments._form', ['appointment' => $appointment])

        <div class="d-flex gap-2 mt-3">
            <button class="btn btn-success"><i class="fas fa-save"></i> Update</button>
            <a href="{{ route('appointments.show', $appointment) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
