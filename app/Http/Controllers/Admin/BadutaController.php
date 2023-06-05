<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController as Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class BadutaController extends Controller
{
    
	public function index()
    {
        $data['title']   = 'Data Baduta';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.baduta.index',compact('data'));
		
		
    }
	
	public function open($id)
    {
        $data['title']   = 'Detail Kunjungan';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.baduta.detail',compact('data'));
		
		
    }
	
	public function riwayat($id)
    {
        $data['title']   = 'Riwayat Kunjungan';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.baduta.riwayat',compact('data'));
		
		
    }
	
	public function grafik()
    {
        $data['title']   = 'Grafik Kunjungan Baduta';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.baduta.grafik',compact('data'));
		
		
    }
}
