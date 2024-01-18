<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Owner;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->only(['email', 'password', 'device_name']);

        $owner = Owner::where('email', $request->email)->first();

        if (!$owner || !Hash::check($request->password, $owner->password)) {
            return response()->json([
                'message' => 'Email ou Senha não conferem',
            ], 401);
        }

        // Revogar todos os tokens de acesso do usuário
        $owner->tokens()->delete();

        // Criar um novo token para o usuário
        $token = $owner->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
        ], 200);
    }
}
