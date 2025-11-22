@extends('layouts.app')

@section('title', 'Create Invoice')

@section('content')
<div class="header">
    <h2>Create Invoice</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('billing.index') }}">Billing</a> / Create
    </div>
</div>

<div class="card">
    <div class="card-title">Invoice Details</div>
    <form action="{{ route('billing.store') }}" method="POST">
        @csrf
        <div class="grid grid-2 gap-2">
            <div class="form-group">
                <label class="form-label">Patient</label>
                <select name="patient_id" class="form-control" required>
                    <option value="">Select Patient</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }} ({{ $patient->patient_id }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Related Appointment (Optional)</label>
                <select name="appointment_id" class="form-control">
                    <option value="">Select Appointment</option>
                    @foreach($appointments as $apt)
                        <option value="{{ $apt->id }}">
                            {{ $apt->appointment_date->format('M d, Y') }} - {{ $apt->patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-2 gap-2">
            <div class="form-group">
                <label class="form-label">Amount ($)</label>
                <input type="number" step="0.01" name="amount" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label">Billing Date</label>
                <input type="date" name="billing_date" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
        </div>

        <div class="grid grid-3 gap-2">
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="unpaid">Unpaid</option>
                    <option value="paid">Paid</option>
                    <option value="refunded">Refunded</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Payment Method</label>
                <select name="payment_method" class="form-control">
                    <option value="">Select Method</option>
                    <option value="cash">Cash</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="insurance">Insurance</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Transaction ID (Optional)</label>
                <input type="text" name="transaction_id" class="form-control">
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Generate Invoice</button>
        </div>
    </form>
</div>
@endsection
