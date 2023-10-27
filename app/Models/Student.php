<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guard = 'student';

    protected $fillable = [
        'program_study_id', 'school_class_id', 'name',
        'identification_number', 'name', 'email',
        'password', 'phone_number',
    ];

    public function programStudy(): HasOne
    {
        return $this->hasOne(ProgramStudy::class, 'id', 'program_study_id');
    }

    public function schoolClass(): HasOne
    {
        return $this->hasOne(SchoolClass::class, 'id', 'school_class_id');
    }
}
