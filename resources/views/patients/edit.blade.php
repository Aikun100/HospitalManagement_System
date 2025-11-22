@extends('layouts.app')

@section('title', 'Edit Patient - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-edit"></i> Edit Patient</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('patients.index') }}">Patients</a> / Edit
    </div>
</div>

<div class="card">
    <h3 class="card-title">Edit: {{ $patient->name }}</h3>

    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf
        @method('PUT')

        @include('patients._form', ['patient' => $patient])

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Update Patient
            </button>
            <a href="{{ route('patients.show', $patient) }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
