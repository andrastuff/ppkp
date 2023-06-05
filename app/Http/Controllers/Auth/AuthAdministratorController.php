<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api as Controller;

class AuthAdministratorController extends Controller
{

    public function login(Request $request)
		{
		  try {
			$request->validate([
			  'email' => 'email|required',
			  'password' => 'required'
			]);
			if(is_numeric($request->email)){
			$credentials = $request->validate([
            'no_telp'     => $request->email,
            'password'  => $request->password
			]);
			
			if (!Auth::attempt($credentials)) {
			  return response()->json([
				'status_code' => 500,
				'message' => 'Unauthorized'
			  ]);
			}
			}else{
			$credentials = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
			]);
			
			if (!Auth::attempt($credentials)) {
			  return response()->json([
				'status_code' => 500,
				'message' => 'Unauthorized'
			  ]);
			}
			}
			$user = User::where('email', $request->email)->first();
			
			if ( ! Hash::check($request->password, $user->password, [])) {
			   throw new \Exception('Error in Login');
			}
			$tokenResult = $user->createToken('authToken')->plainTextToken;
			
			return response()->json([
			  'status_code' => 200,
			  'access_token' => $tokenResult,
			  'token_type' => 'Bearer',
			]);
		  } catch (Exception $error) {
			return response()->json([
			  'status_code' => 500,
			  'message' => 'Error in Login',
			  'error' => $error,
			]);
		  }
		}
	
	public function signin(Request $request)
    {
        
		if(is_numeric($request->email)){
		$credentials = $request->validate([
            'no_telp'     => $request->email,
            'password'  => $request->password
		]);
		if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login Failed!'], 401);
        }
		$user = User::where('no_telp', $request->email)->first();
		}else{
		$credentials = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
		if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login Failed!'], 401);
        }
		$user = User::where('email', $request->email)->first();
		}
        
        
        $token = $user->createToken('auth_token')->plainTextToken;
		dd(Auth::user());
        return response()->json(['message' => 'Hi ' . $user->name, 'Wellcome back', 'access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
		
        return redirect('/');
    }
}
