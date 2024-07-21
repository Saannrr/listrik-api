<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penggunaan;
use Illuminate\Http\Request;

class PenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Penggunaan::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'bulan' => 'required',
            'tahun' => 'required',
            'meter_awal' => 'required',
            'meter_akhir' => 'required',
        ]);

        $penggunaan = Penggunaan::create($request->all());

        return response()->json($penggunaan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Penggunaan::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penggunaan = Penggunaan::findOrFail($id);

        $request->validate([
           'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
           'bulan' => 'required',
           'tahun' => 'required',
           'meter_awal' => 'required',
           'meter_akhir' => 'required',
        ]);

        $penggunaan->update($request->all());

        return response()->json($penggunaan, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penggunaan::destroy($id);
        return response()->json(null, 204);
    }
}
