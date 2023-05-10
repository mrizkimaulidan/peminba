<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::with(['student:id,identification_number,name'], ['commodity:id,name'])
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->whereDate('date', now())
            ->get();

        return view('officer.borrowing.main.index', compact('borrowings'));
    }

    public function validateBorrowing(Borrowing $borrowing): RedirectResponse
    {
        $borrowing->update([
            'officer_id' => auth('officer')->id()
        ]);

        return redirect()->back()->with('success', 'Berhasil melakukan validasi!');
    }
}
