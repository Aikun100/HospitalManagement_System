@extends('layouts.app')

@section('title', 'Add Department')

@section('content')
<div class="header">
    <h2>Add Department</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('departments.index') }}">Departments</a> / Add
    </div>
</div>

<div class="card">
    <div class="card-title">Department Details</div>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">Department Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name') <div style="color:var(--danger)">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Save Department</button>
        </div>
    </form>
</div>
@endsection
