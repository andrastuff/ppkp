<?php

namespace App\Http\Controllers\Response\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api as Controller;
use App\Models\User;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    
	public function index(){
		
		$result = Auth::user();

		return $this->sendResponseOk($result);
	}
	
	public function account_update(request $request){
		
		$result = User::where([
			['id', Auth::user()->id]
		])->first();

		if ($request->password == "") {
			$realPassword = $result->password;
		} else {
			$realPassword = Hash::make($request->password);
		}

		$input = User::where('id', Auth::user()->id)->update([
			'nama'   		=> $request->nama,
			 
			'alamat'  		=> $request->alamat,
			'telp'    		=> $request->telp,
			'password'     	=> $realPassword,
		]);

		if($input){
			return $this->sendResponseCreate($input);
		}
	}
	
	 
}
