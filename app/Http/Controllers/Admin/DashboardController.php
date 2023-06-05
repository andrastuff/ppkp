<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController as Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
	public function index()
    {
        $data['title']   = 'Welcome to Dashboard';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.dashboard.index',compact('data'));
		
		
    }
	
	public function setting()
    {
        $data['title']   = 'Pengaturan Aplikasi';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.dashboard.setting',compact('data'));
		
		
    }
	
	public function account()
    {
        $data['title']   = 'Pengaturan Akun';
		$data['user']    = Auth::user();

		
		$meta	= self::meta();
		$data	= array_merge($meta, $data);
		  
		return view('admin.dashboard.account',compact('data'));
		
		
    }
}
