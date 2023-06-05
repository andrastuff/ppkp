<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\BaseController as Controller;

use Illuminate\Http\Request;


class LandingController extends Controller
{
    
	public function index()
    {
        $data['title']   = 'Selamat Datang';
		 
		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('landing.index',compact('data'));
		
		
    }
	
	
}
