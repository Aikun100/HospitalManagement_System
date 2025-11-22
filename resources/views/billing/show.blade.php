@extends('layouts.app')

@section('title', 'Invoice Details')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <h2>Invoice Details</h2>
        <button onclick="window.print()" class="btn btn-secondary"><i class="fas fa-print"></i> Print</button>
    </div>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('billing.index') }}">Billing</a> / {{ $billing->invoice_number }}
    </div>
</div>

<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div style="border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 2rem; margin-bottom: 2rem;">
        <div class="d-flex justify-between align-center">
            <div>
                <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">INVOICE</h1>
                <div style="opacity: 0.7;">#{{ $billing->invoice_number }}</div>
            </div>
            <div class="text-right">
                <h3 style="color: var(--primary);">Hospital Management System</h3>
                <div style="opacity: 0.7; font-size: 0.9rem;">
                    123 Healthcare Ave<br>
                    Medical District, NY 10001<br>
                    contact@hms.com
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-2 gap-2 mb-3">
        <div>
            <h4 style="margin-bottom: 0.5rem; color: var(--white);">Bill To:</h4>
            <div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 8px;">
                <strong>{{ $billing->patient->name }}</strong><br>
                {{ $billing->patient->address }}<br>
                {{ $billing->patient->email }}<br>
                {{ $billing->patient->phone }}
            </div>
        </div>
        <div class="text-right">
            <div style="margin-bottom: 0.5rem;">
                <span style="opacity: 0.7;">Date:</span> 
                <strong>{{ $billing->billing_date->format('M d, Y') }}</strong>
            </div>
            <div style="margin-bottom: 0.5rem;">
                <span style="opacity: 0.7;">Status:</span> 
                @if($billing->status == 'paid')
                    <span class="badge badge-success">Paid</span>
                @elseif($billing->status == 'unpaid')
                    <span class="badge badge-warning">Unpaid</span>
                @else
                    <span class="badge badge-danger">Refunded</span>
                @endif
            </div>
        </div>
    </div>

    <div class="table-container mb-3">
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Medical Services
                        @if($billing->appointment)
                            <br><small style="opacity: 0.7;">Appointment on {{ $billing->appointment->appointment_date->format('M d, Y') }}</small>
                        @endif
                    </td>
                    <td class="text-right">${{ number_format($billing->amount, 2) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr style="background: rgba(255,255,255,0.1); font-weight: bold;">
                    <td>Total</td>
                    <td class="text-right">${{ number_format($billing->amount, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    @if($billing->payment_method)
    <div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 8px; font-size: 0.9rem;">
        <strong>Payment Information:</strong><br>
        Method: {{ ucfirst(str_replace('_', ' ', $billing->payment_method)) }}<br>
        @if($billing->transaction_id)
            Transaction ID: {{ $billing->transaction_id }}
        @endif
    </div>
    @endif
</div>
@endsection
