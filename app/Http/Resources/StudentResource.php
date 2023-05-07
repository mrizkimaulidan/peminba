<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'programStudy' => [
                'id' => $this->programStudy->id,
                'name' => $this->programStudy->name
            ],
            'schoolClass' => [
                'id' => $this->schoolClass->id,
                'name' => $this->schoolClass->name
            ],
            'identificationNumber' => $this->identification_number,
            'name' => $this->name,
            'email' => $this->email,
            'phoneNumber' => (int)$this->phone_number
        ];
    }
}
