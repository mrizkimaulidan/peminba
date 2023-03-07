<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_study_id', 'school_class_id', 'name',
        'identification_number', 'name', 'email',
        'password', 'phone_number'
    ];
}
