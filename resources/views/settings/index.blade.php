@extends('layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="header">
        <h2>Settings</h2>
        <div class="breadcrumb">
            <a href="{{ route('dashboard') }}">Dashboard</a> / <span>Settings</span>
        </div>
    </div>

    <div class="card">
        <div class="card-title">Profile Settings</div>

        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-2 gap-2">
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div style="color: var(--danger); font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div style="color: var(--danger); font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-title mt-3">Change Password</div>
            <div style="margin-bottom: 1.5rem; color: rgba(255,255,255,0.7); font-size: 0.9rem;">
                Leave blank if you don't want to change your password.
            </div>

            <div class="form-group">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror">
                @error('current_password')
                    <div style="color: var(--danger); font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="grid grid-2 gap-2">
                <div class="form-group">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror">
                    @error('new_password')
                        <div style="color: var(--danger); font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
                </div>
            </div>

            <div class="mt-3 text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection
