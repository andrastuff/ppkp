<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController as Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CatinController extends Controller
{
    
	public function index()
    {
        $data['title']   = 'Data Catin';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.catin.index',compact('data'));
		
		
    }
	
	public function open($id)
    {
        $data['title']   = 'Detail Kunjungan';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.catin.detail',compact('data'));
		
		
    }
	
	public function riwayat($id)
    {
        $data['title']   = 'Riwayat Kunjungan Catin';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.catin.riwayat',compact('data'));
		
		
    }
	
	public function grafik()
    {
        $data['title']   = 'Grafik Kunjungan Catin';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.catin.grafik',compact('data'));
		
		
    }
}
