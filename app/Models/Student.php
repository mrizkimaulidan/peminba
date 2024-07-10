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

    public function scopeFilter($query)
    {
        // Define filter conditions
        $conditions = [
            'program_study_id' => fn ($q, $value) => $q->where('program_study_id', $value),
            'school_class_id' => fn ($q, $value) => $q->where('school_class_id', $value)
        ];

        // Apply filter conditions based on request parameters
        foreach ($conditions as $parameter => $condition) {
            if (request()->filled($parameter)) {
                $query = $condition($query, request($parameter));
            }
        }

        return $query;
    }

    public function programStudy(): HasOne
    {
        return $this->hasOne(ProgramStudy::class, 'id', 'program_study_id');
    }

    public function schoolClass(): HasOne
    {
        return $this->hasOne(SchoolClass::class, 'id', 'school_class_id');
    }
}
