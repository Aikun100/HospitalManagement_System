@extends('layouts.app')

@section('content')
<div style="display:flex;justify-content:center;align-items:center;min-height:60vh;">
    <div class="card" style="max-width:480px;width:100%">
        <h2 class="card-title text-center">Sign in to your account</h2>
        <p class="text-center mt-1" style="color:rgba(255,255,255,0.75)">Enter your credentials to continue</p>

        <form method="POST" action="{{ route('login') }}" style="margin-top:1.25rem">
            @csrf

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control" />
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" required class="form-control" />
            </div>

            <div class="d-flex justify-between align-center mb-2">
                <label style="color:rgba(255,255,255,0.85)"><input type="checkbox" name="remember"> Remember me</label>
                <a href="#" style="color:rgba(255,255,255,0.85);text-decoration:underline">Forgot password?</a>
            </div>

            <div class="d-flex justify-between mt-2">
                <button type="submit" class="btn btn-primary">Sign In</button>
                <a href="{{ route('register') }}" class="btn btn-secondary">Create account</a>
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
