<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPatients = \App\Models\Patient::count();
        $totalDoctors = \App\Models\Doctor::count();
        $totalAppointments = \App\Models\Appointment::count();
        $todayAppointments = \App\Models\Appointment::whereDate('appointment_date', today())->count();
        $pendingAppointments = \App\Models\Appointment::where('status', 'scheduled')->count();
        $lowStockItems = \App\Models\Inventory::where('status', 'low_stock')->count();
        $totalPrescriptions = \App\Models\Prescription::count();
        
        $recentAppointments = \App\Models\Appointment::with(['patient', 'doctor'])
            ->latest()
            ->take(5)
            ->get();
            
        $recentPatients = \App\Models\Patient::latest()->take(5)->get();

        // If user is authenticated, show role-specific dashboard
        if (auth()->check()) {
            $role = auth()->user()->role;
            if ($role === 'admin') {
                return view('dashboards.admin', compact(
                    'totalPatients',
                    'totalDoctors',
                    'totalAppointments',
                    'todayAppointments',
                    'pendingAppointments',
                    'lowStockItems',
                    'totalPrescriptions',
                    'recentAppointments',
                    'recentPatients'
                ));
            }

            if ($role === 'doctor') {
                return view('dashboards.doctor', compact(
                    'totalPatients',
                    'totalDoctors',
                    'totalAppointments',
                    'todayAppointments',
                    'pendingAppointments',
                    'lowStockItems',
                    'totalPrescriptions',
                    'recentAppointments',
                    'recentPatients'
                ));
            }

            // patient
            return view('dashboards.patient', compact(
                'totalPatients',
                'totalDoctors',
                'totalAppointments',
                'todayAppointments',
                'pendingAppointments',
                'lowStockItems',
                'totalPrescriptions',
                'recentAppointments',
                'recentPatients'
            ));
        }

        return view('dashboard', compact(
            'totalPatients',
            'totalDoctors',
            'totalAppointments',
            'todayAppointments',
            'pendingAppointments',
            'lowStockItems',
            'totalPrescriptions',
            'recentAppointments',
            'recentPatients'
        ));
    }
}
