<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BorrowingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'student' => [
                'identificationNumber' => $this->student->identification_number,
                'name' => $this->student->name,
                'phoneNumber' => $this->student->phone_number,
                'programStudy' => $this->student->programStudy->name,
                'schoolClass' => $this->student->schoolClass->name,
            ],
            'commodity' => [
                'id' => $this->commodity->id,
                'name' => $this->commodity->name,
            ],
            'subject' => [
                'id' => $this->subject->id,
                'name' => $this->subject->name,
            ],
            'timeStart' => $this->time_start,
            'timeEnd' => $this->time_end ?? '-',
            'isReturned' => $this->time_end !== null ? 'Sudah dikembalikan.' : 'Belum dikembalikan!',
            'note' => $this->note ?? '-',
        ];
    }
}
