@extends('layouts.app')

@section('title', 'Edit Inventory Item - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-edit"></i> Edit Inventory</h2>
    <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('inventory.index') }}">Inventory</a> / Edit</div>
</div>

<div class="card">
    <h3 class="card-title">Edit: {{ $inventory->name }}</h3>
    <form action="{{ route('inventory.update', $inventory) }}" method="POST">
        @csrf
        @method('PUT')
        @include('inventory._form', ['inventory' => $inventory])

        <div class="d-flex gap-2 mt-3">
            <button class="btn btn-success"><i class="fas fa-save"></i> Update</button>
            <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
