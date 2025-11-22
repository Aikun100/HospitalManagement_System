@extends('layouts.app')

@section('title', 'Add New Patient - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-user-plus"></i> Add New Patient</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('patients.index') }}">Patients</a> / Add New
    </div>
</div>

<div class="card">
    <h3 class="card-title">Patient Information</h3>
    
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        @include('patients._form')

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Save Patient
            </button>
            <a href="{{ route('patients.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
