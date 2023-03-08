<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrators = Administrator::select('id', 'name', 'email', 'phone_number')->get();

        return view('administrator.user.index', compact('administrators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Administrator::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('administrators.users.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrator $user)
    {
        $user->delete();

        return redirect()->route('administrators.users.index')->with('success', 'Data berhasil dihapus!');
    }
}
