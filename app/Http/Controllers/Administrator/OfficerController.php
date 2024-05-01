<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreOfficerRequest;
use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officers = Officer::select('id', 'name', 'email', 'phone_number')
            ->whereNot('id', auth()->id())->get();

        return view('administrator.officer.index', compact('officers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfficerRequest $request)
    {
        $validated = $request->validated();

        Officer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone_number' => $validated['phone_number'],
        ]);

        return redirect()->route('administrators.officers.index')->with('success', 'Data berhasil ditambahkan!');
    }
}
