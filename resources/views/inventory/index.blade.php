@extends('layouts.app')

@section('title', 'Inventory - Hospital Management System')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-boxes"></i> Inventory</h2>
            <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / Inventory</div>
        </div>
        <a href="{{ route('inventory.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add Item</a>
    </div>
</div>

<div class="card">
    <h3 class="card-title">Items</h3>
    <div class="mt-2 mb-2 d-flex justify-between align-center">
        <form action="{{ route('inventory.index') }}" method="GET" style="max-width:420px; width:100%;">
            <div style="position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by item name, category or code..." class="form-control" style="padding-right: 40px;" />
                <button type="submit" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: rgba(255,255,255,0.7); cursor: pointer;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Low Stock Threshold</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->minimum_quantity }}</td>
                    <td>@include('partials.action_buttons', ['model' => $item, 'routePrefix' => 'inventory'])</td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">No items found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $items->links() }}</div>
</div>

@endsection
