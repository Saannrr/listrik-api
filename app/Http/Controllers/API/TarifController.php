<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tarif::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'daya' => 'required',
           'tarifperkwh' => 'required'
        ]);

        $tarif = Tarif::create($request->all());

        return response()->json($tarif, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Tarif::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tarif = Tarif::findOrFail($id);

        $request->validate([
           'daya' => 'required',
           'tarifperkwh' => 'required',
        ]);

        $tarif->update($request->all());

        return response()->json($tarif, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tarif::destroy($id);

        return response()->json(null, 204);
    }
}
