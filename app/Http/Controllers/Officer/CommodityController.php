<?php

namespace App\Http\Controllers\Officer;

use App\Models\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Officer\StoreCommodityRequest;
use App\Http\Requests\Officer\UpdateCommodityRequest;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commodities = Commodity::select('id', 'name')->get();

        return view('officer.commodity.index', compact('commodities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommodityRequest $request)
    {
        Commodity::create($request->validated());

        return redirect()->route('officers.commodities.store')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommodityRequest $request, Commodity $commodity)
    {
        $commodity->update($request->validated());

        return redirect()->route('officers.commodities.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commodity $commodity)
    {
        $commodity->delete();

        return redirect()->route('officers.commodities.index')->with('success', 'Data berhasil dihapus!');
    }
}
