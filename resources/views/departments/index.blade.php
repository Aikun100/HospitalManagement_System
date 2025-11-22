@extends('layouts.app')

@section('title', 'Departments - Hospital Management System')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-building"></i> Departments</h2>
            <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / Departments</div>
        </div>
        <a href="{{ route('departments.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add Department</a>
    </div>
</div>

<div class="card">
    <h3 class="card-title">All Departments</h3>
    <div class="mt-2 mb-2 d-flex justify-between align-center">
        <form action="{{ route('departments.index') }}" method="GET" style="max-width:420px; width:100%;">
            <div style="position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search departments..." class="form-control" style="padding-right: 40px;" />
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
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ Str::limit($department->description, 50) }}</td>
                    <td>
                        @if($department->status == 'active')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>@include('partials.action_buttons', ['model' => $department, 'routePrefix' => 'departments'])</td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">No departments found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $departments->links() }}</div>
</div>
@endsection
