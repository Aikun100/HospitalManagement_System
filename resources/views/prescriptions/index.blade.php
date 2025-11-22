@extends('layouts.app')

@section('title', 'Prescriptions - Hospital Management System')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-prescription"></i> Prescriptions</h2>
            <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / Prescriptions</div>
        </div>
        <a href="{{ route('prescriptions.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> New</a>
    </div>
</div>

<div class="card">
    <h3 class="card-title">Recent Prescriptions</h3>
    <div class="mt-2 mb-2 d-flex justify-between align-center">
        <form action="{{ route('prescriptions.index') }}" method="GET" style="max-width:420px; width:100%;">
            <div style="position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by patient, doctor, diagnosis or number..." class="form-control" style="padding-right: 40px;" />
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
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Medication</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prescriptions as $prescription)
                <tr>
                    <td>{{ $prescription->patient->name }}</td>
                    <td>{{ optional($prescription->doctor)->name ?? '—' }}</td>
                    <td>
                        @if(is_array($prescription->medications) && count($prescription->medications) > 0)
                            {{ $prescription->medications[0]['name'] }}
                            @if(count($prescription->medications) > 1)
                                <span style="font-size: 0.8em; opacity: 0.7;">(+{{ count($prescription->medications) - 1 }} more)</span>
                            @endif
                        @else
                            —
                        @endif
                    </td>
                    <td>@include('partials.action_buttons', ['model' => $prescription, 'routePrefix' => 'prescriptions'])</td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">No prescriptions found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
