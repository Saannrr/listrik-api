<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'username' => 'required|unique:users',
            'password' => 'required',
            'nama_admin' => 'required',
            'id_level' => 'required|exists:levels,id_level',
        ]);

        $user = User::create([
           'username' => $request->username,
           'password' => Hash::make($request->password),
           'nama_admin' => $request->nama_admin,
           'id_level' => $request->id_level,
        ]);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'password' => 'nullable',
            'nama_admin' => 'required',
            'id_level' => 'required|exists:levels,id_level',
        ]);

        $user->update([
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'nama_admin' => $request->nama_admin,
            'id_level' => $request->id_level,
        ]);

        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return response()->json(null, 204);
    }

    public function login(Request $request)
    {
        $request->validate([
           'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function register(Request $request)
    {
        $request->validate([
           'username' => 'required|unique:users',
           'password' => 'required',
           'nama_admin' => 'required',
           'id_level' => 'required|exists:levels,id_level',
        ]);

        $user = User::create([
           'username' => $request->username,
           'password' => Hash::make($request->password),
           'nama_admin' => $request->nama_admin,
           'id_level' => $request->id_level,
        ]);

        return response()->json($user, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
