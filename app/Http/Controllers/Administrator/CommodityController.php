<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commodities = Commodity::select('id', 'name')->get();

        return view('administrator.commodity.index', compact('commodities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Commodity::create($request->all());

        return redirect()->route('administrators.commodities.store')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commodity $commodity)
    {
        $commodity->update($request->all());

        return redirect()->route('administrators.commodities.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commodity $commodity)
    {
        $commodity->delete();

        return redirect()->route('administrators.commodities.index')->with('success', 'Data berhasil dihapus!');
    }
}
