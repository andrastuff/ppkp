<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController as Controller;
use App\Providers\RouteServiceProvider;
 

class AuthController extends Controller
{

	 
	protected $redirectTo = RouteServiceProvider::HOME;
	
    public function login()
    {
        $data['title']   = 'Login Administrator';
		//$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.auth.login',compact('data'));
		
    }
	
	public function forgot_password()
    {
        $data['title']   = 'Lupa Password';
		//$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.auth.lupa-password',compact('data'));
		 
    }
	
	public function reset_password()
    {
        $data['title']   = 'Reset Password';
		//$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.auth.reset-password',compact('data'));
		 
    }
	
	public function signout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
		
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
