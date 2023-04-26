<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileSettingRequest;
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
    public function update(UpdateProfileSettingRequest $request)
    {
        $administrator = Administrator::find(auth('administrator')->id());
        $validated = $request->validated();

        $administrator->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => !is_null($validated['password']) ? bcrypt($validated['password']) : $administrator->password
        ]);

        return redirect()->route('administrators.profile-settings.index')->with('success', 'Data berhasil diubah!');
    }
}
