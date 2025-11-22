@extends('layouts.app')

@section('title', 'Record Lab Result')

@section('content')
<div class="header">
    <h2>Record Lab Result</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('test_results.index') }}">Lab Results</a> / Create
    </div>
</div>

<div class="card">
    <div class="card-title">Test Details</div>
    <form action="{{ route('test_results.store') }}" method="POST">
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
                <label class="form-label">Doctor</label>
                <select name="doctor_id" class="form-control" required>
                    <option value="">Select Doctor</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-2 gap-2">
            <div class="form-group">
                <label class="form-label">Lab Test</label>
                <select name="lab_test_id" class="form-control" required>
                    <option value="">Select Test</option>
                    @foreach($tests as $test)
                        <option value="{{ $test->id }}">{{ $test->name }} (${{ $test->price }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Test Date</label>
                <input type="date" name="test_date" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Result Value/Findings</label>
            <textarea name="result_value" class="form-control" rows="3" placeholder="Enter the main result value or summary..."></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Comments/Notes</label>
            <textarea name="comments" class="form-control" rows="2"></textarea>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Save Result</button>
        </div>
    </form>
</div>
@endsection
