<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController as Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PascaPersalinanController extends Controller
{
    
	public function index()
    {
        $data['title']   = 'Data Pasca Persalinan';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.pasca_persalinan.index',compact('data'));
		
		
    }
	
	public function open($id)
    {
        $data['title']   = 'Detail Kunjungan';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.pasca_persalinan.detail',compact('data'));
		
		
    }
	
	public function riwayat($id)
    {
        $data['title']   = 'Riwayat Kunjungan Pasca Persalinan';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.pasca_persalinan.riwayat',compact('data'));
		
		
    }
	
	public function grafik()
    {
        $data['title']   = 'Grafik Kunjungan Pasca Persalinan';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.pasca_persalinan.grafik',compact('data'));
		
		
    }
}
