<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\delete;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pelanggan::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'username' => 'required|unique:pelanggan_s',
            'password' => 'required',
            'nomor_kwh' => 'required|unique:pelanggan_s',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'id_tarif' => 'required|exists:tarif,id_tarif',
        ]);

        $pelanggan = new Pelanggan([
           'username' => $request->username,
           'password' => Hash::make($request->password),
           'nomor_kwh' => $request->nomor_kwh,
           'nama_pelanggan' => $request->nama_pelanggan,
           'alamat' => $request->alamat,
           'id_tarif' => $request->id_tarif,
        ]);

        $pelanggan->save();

        return response()->json($pelanggan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Pelanggan::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
           'username' => 'sometimes|required|unique:pelanggan_s,username,' . $id . ',id_pelanggan',
           'password' => 'sometimes|required',
           'nomor_kwh' => 'sometimes|required|unique:pelanggan_s,nomor_kwh,' . $id . ',id_pelanggan',
           'nama_pelanggan' => 'sometimes|required',
           'alamat' => 'sometimes|required',
           'id_tarif' => 'sometimes|required|exists:tarif,id_tarif',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->username = $request->get('username', $pelanggan->username);
        if ($request->has('password')){
            $pelanggan->password = Hash::make($request->password);
        }
        $pelanggan->nomor_kwh = $request->get('nomor_kwh', $pelanggan->nomor_kwh);
        $pelanggan->nama_pelanggan = $request->get('nama_pelanggan', $pelanggan->nama_pelanggan);
        $pelanggan->alamat = $request->get('alamat', $pelanggan->alamat);
        $pelanggan->id_tarif = $request->get('id_tarif', $pelanggan->id_tarif);

        $pelanggan->save();

        return response()->json($pelanggan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan = delete();

        return response()->json(null, 204);
    }
}
