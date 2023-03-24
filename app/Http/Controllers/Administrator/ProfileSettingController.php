<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;

class ProfileSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrator.profile_setting.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $administrator = Administrator::find(auth('administrator')->id());

        $administrator->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password ?? $administrator->password
        ]);

        return redirect()->route('administrators.profile-settings.index')->with('success', 'Data berhasil diubah!');
    }
}
