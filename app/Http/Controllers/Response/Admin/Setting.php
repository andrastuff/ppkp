<?php

namespace App\Http\Controllers\Response\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api as Controller;
use App\Models\Tbl_setting;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Setting extends Controller
{
    
	public function index(){
		 
		$result	= Tbl_setting::first();
		
		if (!empty($result->logo)) {
			$result->logo = asset('/assets/images/web/'.$result->logo);
		 }
		 
		return  $this->sendResponseOk($result);
	}
	
	public function update(request $request){
	    $result = Tbl_setting::firstOrFail();
	    
		if($request->file('userfile')){
			$originalImage  = $request->file('userfile');
			$imageFile      = Image::make($originalImage);
			$originalPath   = asset('/assets/images/web/');
			$time           = time();
			$image          = $time.str_replace(" ", "-",$originalImage->getClientOriginalName());
			$image_path     = $originalPath.$result->logo;

			if(!is_dir($originalPath)) {
				mkdir($originalPath, 0755, true);
			}
			
			if(file_exists($image_path)) {
				@unlink($image_path);
			}
		
	        $imageFile->save($originalPath.$image);
	        
		}else{
			$image = $result->logo;
		}		

		$input = Tbl_setting::where('idset', 1)->update([
			'judul'      => $request->judul,
			'deskripsi'  => $request->deskripsi,
			 
			'footer'     => $request->footer,
			'alamat'     => $request->alamat,
			'telp'       => $request->telp,
			'telp2'      => $request->telp2,
			'email'      => $request->email,
			'logo'       => $image,	
			 
		]);
		return $this->sendResponseUpdate(null);
	}
	
	 
}
