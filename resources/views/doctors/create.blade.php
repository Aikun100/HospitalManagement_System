@extends('layouts.app')

@section('title', 'Add New Doctor - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-user-md"></i> Add New Doctor</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('doctors.index') }}">Doctors</a> / Add New
    </div>
</div>

<div class="card">
    <h3 class="card-title">Doctor Information</h3>
    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf
        @include('doctors._form')

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Doctor</button>
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
        </div>
    </form>
</div>
@endsection
