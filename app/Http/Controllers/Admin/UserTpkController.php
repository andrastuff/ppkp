<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController as Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserTpkController extends Controller
{
    
	public function index()
    {
        $data['title']   = 'Data Petugas TPK';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.tpk.index',compact('data'));
		
		
    }
	
	public function open($id)
    {
        $data['title']   = 'Detail Petugas TPK';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.tpk.detail',compact('data'));
		
		
    }
	
	public function create()
    {
        $data['title']   = 'Tambah Petugas TPK';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.tpk.add',compact('data'));
		
		
    }
	
	public function update()
    {
        $data['title']   = 'Ubah Data Petugas TPK';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.tpk.add',compact('data'));
		
		
    }
}
