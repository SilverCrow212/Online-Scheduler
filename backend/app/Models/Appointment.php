<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = "appointment";

    protected $fillable = [
        "user_details_id",
        "consent_form",
        "enccode" ,
        "appointment_date" ,
        "appointment_time" ,
        "status",
        "updated_at"
    ];

    public function userDetails()
    {
        return $this->hasOne(UserDetails::class, 'user_id', 'user_details_id');
    }
}
