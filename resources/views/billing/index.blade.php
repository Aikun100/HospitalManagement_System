@extends('layouts.app')

@section('title', 'Billing - Hospital Management System')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-file-invoice-dollar"></i> Billing & Invoices</h2>
            <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / Billing</div>
        </div>
        <a href="{{ route('billing.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Create Invoice</a>
    </div>
</div>

<div class="card">
    <h3 class="card-title">Invoices</h3>
    <div class="mt-2 mb-2 d-flex justify-between align-center">
        <form action="{{ route('billing.index') }}" method="GET" style="max-width:420px; width:100%;">
            <div style="position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by patient or invoice number..." class="form-control" style="padding-right: 40px;" />
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
                    <th>Invoice #</th>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bills as $bill)
                <tr>
                    <td>{{ $bill->invoice_number }}</td>
                    <td>{{ $bill->patient->name }}</td>
                    <td>{{ $bill->billing_date->format('M d, Y') }}</td>
                    <td>${{ number_format($bill->amount, 2) }}</td>
                    <td>
                        @if($bill->status == 'paid')
                            <span class="badge badge-success">Paid</span>
                        @elseif($bill->status == 'unpaid')
                            <span class="badge badge-warning">Unpaid</span>
                        @else
                            <span class="badge badge-danger">Refunded</span>
                        @endif
                    </td>
                    <td>@include('partials.action_buttons', ['model' => $bill, 'routePrefix' => 'billing'])</td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center">No invoices found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $bills->links() }}</div>
</div>
@endsection
