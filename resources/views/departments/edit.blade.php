@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')
<div class="header">
    <h2>Edit Department</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('departments.index') }}">Departments</a> / Edit
    </div>
</div>

<div class="card">
    <div class="card-title">Department Details</div>
    <form action="{{ route('departments.update', $department) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="form-label">Department Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $department->name) }}" required>
            @error('name') <div style="color:var(--danger)">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $department->description) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $department->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $department->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update Department</button>
        </div>
    </form>
</div>
@endsection
