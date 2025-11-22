@extends('layouts.app')

@section('title', 'Add Inventory - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-boxes"></i> Add Inventory Item</h2>
    <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('inventory.index') }}">Inventory</a> / Add</div>
</div>

<div class="card">
    <h3 class="card-title">New Item</h3>
    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        @include('inventory._form')

        <div class="d-flex gap-2 mt-3">
            <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
            <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
