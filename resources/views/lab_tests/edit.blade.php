@extends('layouts.app')

@section('title', 'Edit Lab Test')

@section('content')
<div class="header">
    <h2>Edit Lab Test</h2>
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a> / <a href="{{ route('lab_tests.index') }}">Catalog</a> / Edit
    </div>
</div>

<div class="card">
    <form action="{{ route('lab_tests.update', $labTest) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-2 gap-2">
            <div class="form-group">
                <label class="form-label">Test Name</label>
                <input type="text" name="name" class="form-control" value="{{ $labTest->name }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Test Code</label>
                <input type="text" name="code" class="form-control" value="{{ $labTest->code }}" required>
            </div>
        </div>

        <div class="grid grid-2 gap-2">
            <div class="form-group">
                <label class="form-label">Price ($)</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $labTest->price }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="active" {{ $labTest->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $labTest->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $labTest->description }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update Test</button>
        </div>
    </form>
</div>
@endsection
