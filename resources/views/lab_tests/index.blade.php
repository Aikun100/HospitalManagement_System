@extends('layouts.app')

@section('title', 'Lab Tests Catalog')

@section('content')
<div class="header">
    <div class="d-flex justify-between align-center">
        <div>
            <h2><i class="fas fa-vial"></i> Lab Tests Catalog</h2>
            <div class="breadcrumb"><a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('test_results.index') }}">Lab Results</a> / Catalog</div>
        </div>
        <a href="{{ route('lab_tests.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add Test</a>
    </div>
</div>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tests as $test)
                <tr>
                    <td>{{ $test->code }}</td>
                    <td>{{ $test->name }}</td>
                    <td>${{ number_format($test->price, 2) }}</td>
                    <td>
                        @if($test->status == 'active')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>@include('partials.action_buttons', ['model' => $test, 'routePrefix' => 'lab_tests'])</td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">No tests found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $tests->links() }}</div>
</div>
@endsection
