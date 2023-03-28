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
        $borrowings = Borrowing::whereDate('date', now())->get();

        if (request()->has('date')) {
            $borrowings = Borrowing::whereDate('date', request('date'))->get();
        }

        return view('officer.borrowing.main.index', compact('borrowings'));
    }

    public function validateBorrowing(Borrowing $borrowing): RedirectResponse
    {
        $borrowing->update([
            'officer_id' => auth('officer')->id()
        ]);

        return redirect()->route('officers.borrowings.index')->with('success', 'Berhasil melakukan validasi!');
    }
}
