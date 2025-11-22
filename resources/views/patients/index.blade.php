@extends('layouts.app')

@section('title', 'Patients - Hospital Management System')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-user-injured"></i> Patients</h2>
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}">Home</a> / Patients
            </div>
        </div>
        <a href="{{ route('patients.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add New Patient
        </a>
    </div>
</div>

<div class="card">
    <h3 class="card-title">All Patients</h3>
    <div class="mt-2 mb-2 d-flex justify-between align-center">
        <form action="{{ route('patients.index') }}" method="GET" style="max-width: 420px; width:100%;">
            <div style="position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search patients by name, id or phone..." class="form-control" style="padding-right: 40px;" />
                <button type="submit" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: rgba(255,255,255,0.7); cursor: pointer;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <div>
            <a href="{{ route('patients.create') }}" class="btn btn-primary btn-sm">Quick Add</a>
        </div>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Blood Group</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($patients as $patient)
                <tr>
                    <td><strong>{{ $patient->patient_id }}</strong></td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($patient->date_of_birth)->age }} years</td>
                    <td>{{ ucfirst($patient->gender) }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>{{ $patient->blood_group ?? 'N/A' }}</td>
                    <td>
                        @if($patient->status == 'active')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        @include('partials.action_buttons', ['model' => $patient, 'routePrefix' => 'patients'])
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">No patients found. <a href="{{ route('patients.create') }}" style="color: white; text-decoration: underline;">Add your first patient</a></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $patients->links() }}
    </div>
</div>


@endsection
