@extends('layouts.app')

@section('title', 'Lab Results - Hospital Management System')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-flask"></i> Lab Results</h2>
            <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / Lab Results</div>
        </div>
        <div>
            <a href="{{ route('lab_tests.index') }}" class="btn btn-secondary btn-sm" style="margin-right: 10px;">Manage Tests</a>
            <a href="{{ route('test_results.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Record Result</a>
        </div>
    </div>
</div>

<div class="card">
    <h3 class="card-title">Recent Results</h3>
    <div class="mt-2 mb-2 d-flex justify-between align-center">
        <form action="{{ route('test_results.index') }}" method="GET" style="max-width:420px; width:100%;">
            <div style="position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by patient or test name..." class="form-control" style="padding-right: 40px;" />
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
                    <th>Test</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Result</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($results as $result)
                <tr>
                    <td>{{ $result->patient->name }}</td>
                    <td>{{ $result->labTest->name }}</td>
                    <td>{{ $result->test_date->format('M d, Y') }}</td>
                    <td>
                        @if($result->status == 'completed')
                            <span class="badge badge-success">Completed</span>
                        @elseif($result->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @else
                            <span class="badge badge-danger">Cancelled</span>
                        @endif
                    </td>
                    <td>{{ Str::limit($result->result_value, 20) ?? '—' }}</td>
                    <td>@include('partials.action_buttons', ['model' => $result, 'routePrefix' => 'test_results'])</td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center">No results found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $results->links() }}</div>
</div>
@endsection
