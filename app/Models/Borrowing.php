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

    protected $casts = [
        'date' => 'date'
    ];

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
        return $this->date->locale('id')->translatedFormat('l, j F Y');
    }
}
