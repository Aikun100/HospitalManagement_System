<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    protected $fillable = [
        'name',
        'code',
        'price',
        'description',
        'status'
    ];

    public function testResults()
    {
        return $this->hasMany(TestResult::class);
    }
}
