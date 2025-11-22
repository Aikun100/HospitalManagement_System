<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'lab_test_id',
        'result_value',
        'comments',
        'status',
        'test_date'
    ];

    protected $casts = [
        'test_date' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function labTest()
    {
        return $this->belongsTo(LabTest::class);
    }
}
