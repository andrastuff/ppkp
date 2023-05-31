<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api as Controller;

class AuthAdministratorController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'no_telp'   => 'required|min:11',
            'email'     => 'required|string|max:255|unique:users',
            'password'  => 'required|confirmed|min:6'
        ]);

        if ($validator->fails()) {
            return $this->sendResponseError(json_encode($validator->errors()), $validator->errors());
        }

        $user = User::create([
            'name'      => $request->name,
            'no_telp'   => $request->no_telp,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $data['user'] = $user->createToken('auth_token')->plainTextToken;
        return $this->sendResponseCreate($data);
    }

    public function sigin(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login Failed!'], 401);
        }
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['message' => 'Hi ' . $user->name, 'Wellcome back', 'access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
		
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
