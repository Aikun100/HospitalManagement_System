<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'patient_id',
        'name',
        'date_of_birth',
        'gender',
        'email',
        'phone',
        'address',
        'blood_group',
        'medical_history',
        'allergies',
        'emergency_contact_name',
        'emergency_contact_phone',
        'profile_image',
        'status'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}
