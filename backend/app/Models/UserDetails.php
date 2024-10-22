<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'school_id_number',
        'firstname',
        'lastname',
        'middlename',
        'type',
        'employee_student_type',
        'office_level',
        'department_program',
        'sex',
        'email',
        'contact_no',
        'civil_status',
        'guardian',
        'guardian_no',
        'permanent_address',
        'bsu_address'
    ];
}
