@extends('layouts.app')

@section('title', 'Inventory Item - Hospital Management System')

@section('content')
<div class="header">
    <h2><i class="fas fa-boxes"></i> Item Details</h2>
    <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('inventory.index') }}">Inventory</a> / Details</div>
</div>

<div class="card">
    <h3 class="card-title">{{ $inventory->item_name }}</h3>
    <div class="grid grid-2 gap-2">
        <div class="form-group"><label class="form-label">Quantity</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $inventory->quantity }}</div></div>
        <div class="form-group"><label class="form-label">Low Stock Threshold</label><div class="form-control" style="background:transparent;border:none;padding:0;">{{ $inventory->minimum_quantity }}</div></div>
    </div>
    <div class="mt-2"><h4 class="card-title">Notes</h4><div class="card" style="padding:1rem; background: rgba(255,255,255,0.05);">{{ $inventory->description ?? '—' }}</div></div>
</div>

@endsection
