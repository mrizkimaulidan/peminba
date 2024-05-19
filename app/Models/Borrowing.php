<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrowing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'commodity_id',  'student_id', 'subject_id', 'officer_id',
        'date', 'note', 'time_start', 'time_end',
    ];

    public function scopeFilter($query)
    {
        // Define filter conditions
        $conditions = [
            'date' => fn ($q, $value) => $q->whereDate('date', $value),
            'status' => fn ($q, $value) => $q->whereNotNull('time_end', $value === '1'),
            'student_id' => fn ($q, $value) => $q->where('student_id', $value),
            'validate' => fn ($q, $value) => $q->whereNotNull('officer_id', $value === '1'),
            'commodity_id' => fn ($q, $value) => $q->where('commodity_id', $value),
            'program_study_id' => fn ($q, $value) => $q->whereHas('student', fn ($query) => $query->where('program_study_id', $value)),
            'school_class_id' => fn ($q, $value) => $q->whereHas('student.programStudy', fn ($query) => $query->where('school_class_id', $value)),
            'start_date' => fn ($q, $value) => $q->where('date', '>=', $value),
            'end_date' => fn ($q, $value) => $q->where('date', '<=', $value),
        ];

        // Apply filter conditions based on request parameters
        foreach ($conditions as $parameter => $condition) {
            if (request()->filled($parameter)) {
                $query = $condition($query, request($parameter));
            }
        }

        return $query;
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function commodity(): BelongsTo
    {
        return $this->belongsTo(Commodity::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function officer(): BelongsTo
    {
        return $this->belongsTo(Officer::class);
    }

    public function getIsReturnedStatus(): string
    {
        return !is_null($this->time_end) ? 'Sudah dikembalikan.' : 'Belum dikembalikan!';
    }

    public function getOfficerName(): string
    {
        return !is_null($this->officer_id) ? $this->officer->name : 'Belum divalidasi!';
    }

    public function getTimeEnd(): string
    {
        return $this->time_end ?? '-';
    }

    public function getDateFormatted(): string
    {
        return now()->parse($this->date)->locale('id')->translatedFormat('l, j F Y');
    }
}
