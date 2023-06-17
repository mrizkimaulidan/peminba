<?php

namespace App\Repositories;

use App\Models\Borrowing;

class BorrowingRepository
{
    public function __construct(
        private Borrowing $model
    ) {
    }

    /**
     * Get commodity that are not returned by student.
     *
     * @return object
     */
    public function getCommoditiesNotReturnedByStudent(): object
    {
        return $this->model->select('id', 'student_id', 'commodity_id', 'is_returned', 'date')
            ->with('student:id,identification_number,name,email,phone_number', 'commodity:id,name')
            ->where('is_returned', 0)->orderBy('date', 'DESC')->get();
    }

    /**
     * Get the count of borrowings by student ID.
     *
     * @param string $studentID
     * @return int
     */
    public function countTotalBorrowingByStudentID(string $studentID): int
    {
        return $this->model->select('id', 'student_id')->where('student_id', $studentID)->count();
    }

    /**
     * Count student borrowing returned status.
     * true if borrowing is already returned
     * or false if it is not returned.
     *
     * @param string $studentID
     * @param boolean $isReturned the status boolean true or false
     * @return integer
     */
    public function countStudentBorrowingReturnedStatus(string $studentID, bool $isReturned): int
    {
        return $this->model->select('id', 'student_id', 'is_returned')
            ->where('student_id', $studentID)
            ->where('is_returned', $isReturned)
            ->count();
    }
}
