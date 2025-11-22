<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Inventory;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Doctors
        $doctors = [
            [
                'name' => 'Dr. Sarah Johnson',
                'specialization' => 'Cardiology',
                'email' => 'sarah.johnson@hospital.com',
                'phone' => '+1234567890',
                'address' => '123 Medical Center, New York',
                'qualification' => 'MD, FACC',
                'experience_years' => 15,
                'license_number' => 'LIC-' . strtoupper(Str::random(8)),
                'status' => 'active',
                'bio' => 'Experienced cardiologist with 15 years of practice.',
            ],
            [
                'name' => 'Dr. Michael Chen',
                'specialization' => 'Pediatrics',
                'email' => 'michael.chen@hospital.com',
                'phone' => '+1234567891',
                'address' => '456 Health Plaza, Los Angeles',
                'qualification' => 'MD, FAAP',
                'experience_years' => 10,
                'license_number' => 'LIC-' . strtoupper(Str::random(8)),
                'status' => 'active',
                'bio' => 'Dedicated pediatrician specializing in child healthcare.',
            ],
            [
                'name' => 'Dr. Emily Rodriguez',
                'specialization' => 'Orthopedics',
                'email' => 'emily.rodriguez@hospital.com',
                'phone' => '+1234567892',
                'address' => '789 Care Street, Chicago',
                'qualification' => 'MD, FAAOS',
                'experience_years' => 12,
                'license_number' => 'LIC-' . strtoupper(Str::random(8)),
                'status' => 'active',
                'bio' => 'Orthopedic surgeon with expertise in joint replacement.',
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }

        // Create Patients
        $patients = [
            [
                'patient_id' => 'PAT-' . strtoupper(Str::random(8)),
                'name' => 'John Smith',
                'date_of_birth' => '1985-05-15',
                'gender' => 'male',
                'email' => 'john.smith@email.com',
                'phone' => '+1234567893',
                'address' => '321 Oak Avenue, New York, NY 10001',
                'blood_group' => 'A+',
                'medical_history' => 'Hypertension, managed with medication',
                'allergies' => 'Penicillin',
                'emergency_contact_name' => 'Jane Smith',
                'emergency_contact_phone' => '+1234567894',
                'status' => 'active',
            ],
            [
                'patient_id' => 'PAT-' . strtoupper(Str::random(8)),
                'name' => 'Maria Garcia',
                'date_of_birth' => '1990-08-22',
                'gender' => 'female',
                'email' => 'maria.garcia@email.com',
                'phone' => '+1234567895',
                'address' => '654 Pine Street, Los Angeles, CA 90001',
                'blood_group' => 'O+',
                'medical_history' => 'Asthma',
                'allergies' => 'None',
                'emergency_contact_name' => 'Carlos Garcia',
                'emergency_contact_phone' => '+1234567896',
                'status' => 'active',
            ],
            [
                'patient_id' => 'PAT-' . strtoupper(Str::random(8)),
                'name' => 'Robert Williams',
                'date_of_birth' => '1978-12-10',
                'gender' => 'male',
                'email' => 'robert.williams@email.com',
                'phone' => '+1234567897',
                'address' => '987 Maple Drive, Chicago, IL 60601',
                'blood_group' => 'B+',
                'medical_history' => 'Diabetes Type 2',
                'allergies' => 'Sulfa drugs',
                'emergency_contact_name' => 'Linda Williams',
                'emergency_contact_phone' => '+1234567898',
                'status' => 'active',
            ],
        ];

        foreach ($patients as $patient) {
            Patient::create($patient);
        }

        // Create Appointments
        $appointments = [
            [
                'patient_id' => 1,
                'doctor_id' => 1,
                'appointment_number' => 'APT-' . strtoupper(Str::random(8)),
                'appointment_date' => now()->addDays(2),
                'appointment_time' => '10:00 AM',
                'status' => 'scheduled',
                'reason' => 'Regular checkup',
                'notes' => 'Patient requested morning appointment',
                'type' => 'routine_checkup',
            ],
            [
                'patient_id' => 2,
                'doctor_id' => 2,
                'appointment_number' => 'APT-' . strtoupper(Str::random(8)),
                'appointment_date' => now(),
                'appointment_time' => '2:00 PM',
                'status' => 'confirmed',
                'reason' => 'Follow-up consultation',
                'notes' => 'Asthma follow-up',
                'type' => 'follow_up',
            ],
            [
                'patient_id' => 3,
                'doctor_id' => 3,
                'appointment_number' => 'APT-' . strtoupper(Str::random(8)),
                'appointment_date' => now()->addDays(5),
                'appointment_time' => '11:30 AM',
                'status' => 'scheduled',
                'reason' => 'Knee pain consultation',
                'notes' => 'Patient experiencing chronic knee pain',
                'type' => 'consultation',
            ],
        ];

        foreach ($appointments as $appointment) {
            Appointment::create($appointment);
        }

        // Create Inventory Items
        $inventoryItems = [
            [
                'item_code' => 'INV-' . strtoupper(Str::random(8)),
                'item_name' => 'Paracetamol 500mg',
                'category' => 'medicine',
                'description' => 'Pain relief and fever reducer',
                'quantity' => 500,
                'minimum_quantity' => 100,
                'unit' => 'tablets',
                'unit_price' => 0.50,
                'supplier' => 'PharmaCorp',
                'expiry_date' => now()->addYear(),
                'purchase_date' => now()->subMonths(2),
                'location' => 'Pharmacy - Shelf A1',
                'status' => 'available',
            ],
            [
                'item_code' => 'INV-' . strtoupper(Str::random(8)),
                'item_name' => 'Surgical Gloves (Box)',
                'category' => 'supplies',
                'description' => 'Sterile latex surgical gloves',
                'quantity' => 50,
                'minimum_quantity' => 20,
                'unit' => 'boxes',
                'unit_price' => 15.00,
                'supplier' => 'MedSupply Inc',
                'expiry_date' => now()->addYears(2),
                'purchase_date' => now()->subMonth(),
                'location' => 'Storage Room - Section B',
                'status' => 'available',
            ],
            [
                'item_code' => 'INV-' . strtoupper(Str::random(8)),
                'item_name' => 'Insulin Syringes',
                'category' => 'equipment',
                'description' => 'Disposable insulin syringes 1ml',
                'quantity' => 15,
                'minimum_quantity' => 50,
                'unit' => 'pieces',
                'unit_price' => 2.50,
                'supplier' => 'DiabetesCare Ltd',
                'expiry_date' => now()->addMonths(18),
                'purchase_date' => now()->subWeeks(3),
                'location' => 'Pharmacy - Shelf C3',
                'status' => 'low_stock',
            ],
        ];

        foreach ($inventoryItems as $item) {
            Inventory::create($item);
        }

        // Create Prescriptions
        $prescriptions = [
            [
                'patient_id' => 1,
                'doctor_id' => 1,
                'appointment_id' => 1,
                'prescription_number' => 'PRX-' . strtoupper(Str::random(8)),
                'prescription_date' => now(),
                'diagnosis' => 'Hypertension - Stage 1',
                'medications' => json_encode([
                    [
                        'name' => 'Lisinopril',
                        'dosage' => '10mg',
                        'frequency' => 'Once daily',
                        'duration' => '30 days',
                    ],
                    [
                        'name' => 'Aspirin',
                        'dosage' => '81mg',
                        'frequency' => 'Once daily',
                        'duration' => '30 days',
                    ],
                ]),
                'instructions' => 'Take medications with food. Monitor blood pressure daily.',
                'tests_recommended' => 'Blood pressure monitoring, Lipid profile after 3 months',
                'follow_up_date' => now()->addMonth(),
                'status' => 'active',
            ],
        ];

        foreach ($prescriptions as $prescription) {
            Prescription::create($prescription);
        }

        // Create an admin user if one doesn't exist
        if (!User::where('email', 'admin@hospital.test')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@hospital.test',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'admin',
            ]);
        }
    }
}
