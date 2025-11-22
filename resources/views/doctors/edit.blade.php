@extends('layouts.app')

@section('title', 'Edit Doctor - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-edit"></i> Edit Doctor</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('doctors.index') }}">Doctors</a> / Edit
    </div>
</div>

<div class="card">
    <h3 class="card-title">Edit: {{ $doctor->name }}</h3>
    <form action="{{ route('doctors.update', $doctor) }}" method="POST">
        @csrf
        @method('PUT')
        @include('doctors._form', ['doctor' => $doctor])

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update Doctor</button>
            <a href="{{ route('doctors.show', $doctor) }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
        </div>
    </form>
</div>
@endsection
