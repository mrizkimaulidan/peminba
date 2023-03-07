<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_study_id', 'school_class_id', 'name',
        'identification_number', 'name', 'email',
        'password', 'phone_number'
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
