<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Level::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'nama_level' => 'required'
        ]);

        $level = Level::create($request->all());

        return response()->json($level, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Level::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $level = Level::findOrFail($id);

        $request->validate([
           'nama_level' => 'required',
        ]);

        $level->update($request->all());

        return response()->json($level, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Level::destroy($id);
        return response()->json(null, 204);
    }
}
