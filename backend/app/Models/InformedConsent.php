<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformedConsent extends Model
{
    use HasFactory;
    protected $table = 'informed_consent';

    protected $fillable = [
        'patient_id',
        'details',
        'dental_history',
        'medical_history',
        'vitals',
        'pre_consent',
        'final_consent',
    ];

    protected $casts = [
        'details' => 'array',
        'dental_history' => 'array',
        'medical_history' => 'array',
        'vitals' => 'array',
        'pre_consent' => 'array',
        'final_consent' => 'array',
    ];

}
