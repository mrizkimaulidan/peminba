<?php

namespace App\Repositories;

use App\Models\Borrowing;

class BorrowingRepository
{
    public function __construct(
        private Borrowing $model
    ) {
    }

    public function getCommoditiesNotReturnedByStudent(): object
    {
        return $this->model->select('id', 'student_id', 'commodity_id', 'is_returned', 'date')
            ->with('student:id,identification_number,name,email,phone_number', 'commodity:id,name')
            ->where('is_returned', 0)->orderBy('date', 'DESC')->get();
    }
}
