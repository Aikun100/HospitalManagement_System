@extends('layouts.app')

@section('title', 'Edit Lab Result')

@section('content')
<div class="header">
    <h2>Edit Lab Result</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('test_results.index') }}">Lab Results</a> / Edit
    </div>
</div>

<div class="card">
    <div class="card-title">Test Details</div>
    <form action="{{ route('test_results.update', $testResult) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-2 gap-2">
            <div class="form-group">
                <label class="form-label">Patient</label>
                <input type="text" class="form-control" value="{{ $testResult->patient->name }}" disabled>
            </div>

            <div class="form-group">
                <label class="form-label">Test</label>
                <input type="text" class="form-control" value="{{ $testResult->labTest->name }}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $testResult->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $testResult->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $testResult->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Result Value/Findings</label>
            <textarea name="result_value" class="form-control" rows="3">{{ $testResult->result_value }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Comments/Notes</label>
            <textarea name="comments" class="form-control" rows="2">{{ $testResult->comments }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update Result</button>
        </div>
    </form>
</div>
@endsection
