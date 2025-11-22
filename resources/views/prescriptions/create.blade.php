@extends('layouts.app')

@section('title', 'Create Prescription - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-prescription"></i> New Prescription</h2>
    <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('prescriptions.index') }}">Prescriptions</a> / New</div>
</div>

<div class="card">
    <h3 class="card-title">Prescription</h3>
    <form action="{{ route('prescriptions.store') }}" method="POST">
        @csrf
        @include('prescriptions._form')

        <div class="d-flex gap-2 mt-3">
            <button class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('prescriptions.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
