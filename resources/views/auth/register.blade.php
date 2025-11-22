@extends('layouts.app')

@section('content')
<div style="display:flex;justify-content:center;align-items:center;min-height:60vh;">
    <div class="card" style="max-width:560px;width:100%">
        <h2 class="card-title text-center">Create an account</h2>
        <p class="text-center mt-1" style="color:rgba(255,255,255,0.75)">Register as a patient or doctor</p>

        <form method="POST" action="{{ route('register') }}" style="margin-top:1rem">
            @csrf

            <div class="form-group">
                <label class="form-label">Full name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="form-control" />
            </div>

            <div class="form-group">
                <label class="form-label">Email address</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="form-control" />
            </div>

            <div class="grid grid-2 gap-2">
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" required class="form-control" />
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm password</label>
                    <input type="password" name="password_confirmation" required class="form-control" />
                </div>
            </div>

            <input type="hidden" name="role" value="patient">
            <div class="form-group">
                <p class="mt-1" style="color:rgba(255,255,255,0.65);font-size:0.85rem">Self-registration is only available for patients. Doctor and admin accounts are created by administrators.</p>
            </div>

            <div class="d-flex justify-between mt-2">
                <button type="submit" class="btn btn-success">Create account</button>
                <a href="{{ route('login') }}" class="btn btn-secondary">Already registered?</a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger mt-2">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->first() }}
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
