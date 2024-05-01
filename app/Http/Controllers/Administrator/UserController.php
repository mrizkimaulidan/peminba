<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreUserRequest;
use App\Models\Administrator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrators = Administrator::select('id', 'name', 'email', 'phone_number')
            ->whereNot('id', auth()->id())->get();

        return view('administrator.user.index', compact('administrators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        Administrator::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone_number' => $validated['phone_number'],
        ]);

        return redirect()->route('administrators.users.index')->with('success', 'Data berhasil ditambahkan!');
    }
}
