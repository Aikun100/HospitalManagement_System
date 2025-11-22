@extends('layouts.app')

@section('title', 'Edit Invoice')

@section('content')
<div class="header">
    <h2>Edit Invoice</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('billing.index') }}">Billing</a> / Edit
    </div>
</div>

<div class="card">
    <div class="card-title">Invoice Details: {{ $billing->invoice_number }}</div>
    <form action="{{ route('billing.update', $billing) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label">Patient</label>
            <input type="text" class="form-control" value="{{ $billing->patient->name }}" disabled>
        </div>

        <div class="grid grid-2 gap-2">
            <div class="form-group">
                <label class="form-label">Amount ($)</label>
                <input type="number" step="0.01" name="amount" class="form-control" value="{{ $billing->amount }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Billing Date</label>
                <input type="date" name="billing_date" class="form-control" value="{{ $billing->billing_date->format('Y-m-d') }}" required>
            </div>
        </div>

        <div class="grid grid-3 gap-2">
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="unpaid" {{ $billing->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                    <option value="paid" {{ $billing->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="refunded" {{ $billing->status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Payment Method</label>
                <select name="payment_method" class="form-control">
                    <option value="">Select Method</option>
                    <option value="cash" {{ $billing->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="credit_card" {{ $billing->payment_method == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="insurance" {{ $billing->payment_method == 'insurance' ? 'selected' : '' }}>Insurance</option>
                    <option value="bank_transfer" {{ $billing->payment_method == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Transaction ID (Optional)</label>
                <input type="text" name="transaction_id" class="form-control" value="{{ $billing->transaction_id }}">
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update Invoice</button>
        </div>
    </form>
</div>
@endsection
