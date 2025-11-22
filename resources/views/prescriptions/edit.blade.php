@extends('layouts.app')

@section('title', 'Edit Prescription - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-edit"></i> Edit Prescription</h2>
    <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('prescriptions.index') }}">Prescriptions</a> / Edit</div>
</div>

<div class="card">
    <h3 class="card-title">Edit Prescription</h3>
    <form action="{{ route('prescriptions.update', $prescription) }}" method="POST">
        @csrf
        @method('PUT')
        @include('prescriptions._form', ['prescription' => $prescription])

        <div class="d-flex gap-2 mt-3">
            <button class="btn btn-success"><i class="fas fa-save"></i> Update</button>
            <a href="{{ route('prescriptions.show', $prescription) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
