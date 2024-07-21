<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tagihan::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'id_penggunaan' => 'required|exists:penggunaan,id_penggunaan',
           'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'bulan' => 'required',
            'tahun' => 'required',
            'jumlah_meter' => 'required',
            'status' => 'required',
        ]);

        $tagihan = Tagihan::create($request->all());

        return response()->json($tagihan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Tagihan::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tagihan = Tagihan::findOrFail($id);

        $request->validate([
           'id_penggunaan' => 'required|exists:penggunaan,id_penggunaan',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'bulan' => 'required',
            'tahun' => 'required',
            'jumlah_meter' => 'required',
            'status' => 'required',
        ]);

        $tagihan->update($request->all());

        return response()->json($tagihan, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tagihan::destroy($id);
        return response()->json(null, 204);
    }
}
