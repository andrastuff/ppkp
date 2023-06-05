<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController as Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class BumilController extends Controller
{
    
	public function index()
    {
        $data['title']   = 'Data Bumil';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.bumil.index',compact('data'));
		
		
    }
	
	public function open($id)
    {
        $data['title']   = 'Detail Kunjungan';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.bumil.detail',compact('data'));
		
		
    }
	
	public function riwayat($id)
    {
        $data['title']   = 'Riwayat Kunjungan';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.bumil.riwayat',compact('data'));
		
		
    }
	
	public function grafik()
    {
        $data['title']   = 'Grafik Kunjungan Bumil';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.bumil.grafik',compact('data'));
		
		
    }
}
