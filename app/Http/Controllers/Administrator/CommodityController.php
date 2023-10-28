<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreCommodityRequest;
use App\Http\Requests\Administrator\UpdateCommodityRequest;
use App\Http\Requests\ImportExcelRequest;
use App\Models\Commodity;
use App\Services\ImportService;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    private ImportService $importService;

    public function __construct()
    {
        $this->importService = new ImportService(new Commodity());
    }

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
    public function store(StoreCommodityRequest $request)
    {
        Commodity::create($request->validated());

        return redirect()->route('administrators.commodities.store')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommodityRequest $request, Commodity $commodity)
    {
        $commodity->update($request->validated());

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

    /**
     * Import a listing of the resource.
     */
    public function import(ImportExcelRequest $request)
    {
        $counts = $this->importService->importExcel($request->validated('import'), ['name'], 'name', 0);
        $message = "Total {$counts['imported']} berhasil diimpor, {$counts['ignored']} dihiraukan!";

        return redirect()->route('administrators.commodities.index')->with('success', $message);
    }
}
