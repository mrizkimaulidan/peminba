<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Officer;
use Illuminate\Http\Request;

class ProfileSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('officer.profile_setting.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $officer = Officer::find(auth('officer')->id());

        $officer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password ?? $officer->password
        ]);

        return redirect()->route('officers.profile-settings.index')->with('success', 'Data berhasil diubah!');
    }
}
