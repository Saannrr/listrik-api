<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pembayaran::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'id_tagihan' => 'required|exists:tagihan,id_tagihan',
           'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
           'tanggal_pembayaran' => 'required|date',
           'bulan_bayar' => 'required',
           'biaya_admin' => 'required',
           'total_bayar' => 'required',
           'id_user' => 'required|exists:users,id_user',
        ]);

        $pembayaran = Pembayaran::create($request->all());

        return response()->json($pembayaran, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Pembayaran::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $request->validate([
            'id_tagihan' => 'required|exists:tagihan,id_tagihan',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'tanggal_pembayaran' => 'required|date',
            'bulan_bayar' => 'required',
            'biaya_admin' => 'required',
            'total_bayar' => 'required',
            'id_user' => 'required|exists:users,id_user',
        ]);

        $pembayaran->update($request->all());

        return response()->json($pembayaran, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pembayaran::destroy($id);
        return response()->json(null, 204);
    }
}
