<?php

namespace App\Http\Controllers\Tpk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function login()
    {
        return view('tpk.auth.login');
    }
	
	public function forgot_password()
    {
        return view('tpk.auth.lupa-password');
    }
	
	public function reset_password()
    {
        return view('tpk.auth.reset-password');
    }
}
