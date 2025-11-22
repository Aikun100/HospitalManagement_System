@extends('layouts.app')

@section('content')
<div style="display:flex;align-items:center;justify-content:center;min-height:70vh;">
    <div style="max-width:900px;text-align:center;color:var(--white)">
        <h1 style="font-size:2.25rem;margin-bottom:0.75rem">Welcome to HMS — Hospital Management</h1>
        <p style="opacity:0.9;margin-bottom:1.5rem">A simple management interface for patients, doctors, appointments, prescriptions and inventory.</p>
        <div style="display:flex;gap:1rem;justify-content:center">
            <a href="{{ route('login') }}" class="btn btn-primary">Sign in</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">Register (Patients)</a>
        </div>
        <div style="margin-top:2rem;display:grid;grid-template-columns:repeat(3,1fr);gap:1rem">
            <div class="card">
                <h3 class="card-title">Patients</h3>
                <p style="color:rgba(255,255,255,0.85)">Manage patient records and medical history.</p>
            </div>
            <div class="card">
                <h3 class="card-title">Doctors</h3>
                <p style="color:rgba(255,255,255,0.85)">Schedule and manage doctor appointments.</p>
            </div>
            <div class="card">
                <h3 class="card-title">Inventory</h3>
                <p style="color:rgba(255,255,255,0.85)">Track medicines, supplies and stock levels.</p>
            </div>
        </div>
    </div>
</div>
@endsection
