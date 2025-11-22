@extends('layouts.app')

@section('title', 'Doctors - Hospital Management System')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-user-md"></i> Doctors</h2>
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}">Home</a> / Doctors
            </div>
        </div>
        <a href="{{ route('doctors.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New Doctor</a>
    </div>
</div>

<div class="card">
    <h3 class="card-title">All Doctors</h3>
    <div class="mt-2 mb-2 d-flex justify-between align-center">
        <form action="{{ route('doctors.index') }}" method="GET" style="max-width:420px; width:100%;">
            <div style="position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search doctors by name, specialty or email..." class="form-control" style="padding-right: 40px;" />
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
                    <th>Name</th>
                    <th>Specialty</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialty ?? '—' }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>@include('partials.action_buttons', ['model' => $doctor, 'routePrefix' => 'doctors'])</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No doctors found. <a href="{{ route('doctors.create') }}" style="color: white; text-decoration: underline;">Add one</a></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $doctors->links() }}</div>
</div>



@endsection
