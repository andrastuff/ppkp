<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Tbl_ket_variabel;
use App\Models\Tbl_user_tpk;
use App\Models\Tbl_wilayah;

class Api extends Controller
{
   
    public function sendResponseCustom($mssg, $result)
    {
        $response = [
            'success' => true,
            'message' => $mssg,
        ];
        if (!empty($result)) {
            $response['data'] = $result;
        }

        return response()->json($response, 200);
    }

    public function sendResponseOk($result)
    {
        $response = [
            'success' => true,
            'message' => 'Your request has been found',
        ];
        if (!empty($result)) {
            $response['data'] = $result;
        }

        return response()->json($response, 200);
    }

    public function sendResponseCreate($result)
    {
        $response = [
            'success' => true,
            'message' => 'Your request has been saved',
        ];
        if (!empty($result)) {
            $response['data'] = $result;
        }

        return response()->json($response, 201);
    }

    public function sendResponseUpdate($result)
    {
        $response = [
            'success' => true,
            'message' => 'Your request has been updated',
        ];
        if (!empty($result)) {
            $response['data'] = $result;
        }

        return response()->json($response, 201);
    }

    public function sendResponseDelete($result)
    {
        $response = [
            'success' => true,
            'message' => 'Your request has been deleted',
        ];
        if (!empty($result)) {
            $response['data'] = $result;
        }

        return response()->json($response, 200);
    }

    public function sendResponseError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
	
	private function created($uniqid) {
		$ticket = rand(10, 99).str_pad(substr($uniqid,4), 4, STR_PAD_LEFT);
		$ticket = strtoupper($ticket);
		return $ticket;
	}
	
	public function ket_variabel($tbl, $val){
	 $items = $val->toArray();
	 \DB::statement("SET SQL_MODE=''");
	 $get =  Tbl_ket_variabel::select('tbl_variabel','nama_variabel')->where('tbl_variabel', $tbl)->groupBy('nama_variabel')->get();
	 $get = $get->toArray();
	 foreach($items as $k=>$v){
		 
			$items[$k] = $this->check_var($tbl, $k, $v);
	 }
	   
	 /* foreach($items as $i=>$v){
		 
			$items[$item['nama_variabel']] = $x->ket_kode;
		 foreach($get as $item){
			  
			 $x = Tbl_ket_variabel::where('nama_variabel', $item['nama_variabel'])->where('kode', $v)->first();
			   
			 if($x){
					
				$items[$item['nama_variabel']] = $x->ket_kode;
				 
			 }
		 }
		 
	 } */
	   
	 return $items;
	 
	}
	public function check_var($tbl, $k, $v){
		 \DB::statement("SET SQL_MODE=''");
	 $get =  Tbl_ket_variabel::select('tbl_variabel','nama_variabel')->where('tbl_variabel', $tbl)->groupBy('nama_variabel')->get();
	 $get = $get->toArray();
	  
	 foreach($get as $item){
		 if($item['nama_variabel'] == $k){
			 $x = Tbl_ket_variabel::where('nama_variabel', $k)->where('kode', $v)->first();
			 return $x->ket_kode;
			 
		 }
	 }
		if($k == 'wilayah_id'){
			return $this->attr_wilayah($v);
		}
		if($k == 'pendamping_id'){
			return $this->attr_pendamping($v);
		} 
	 return $v;
	}
	
	public function attr_pendamping($id){
	 
	 $result =  Tbl_user_tpk::find($id);
	   if(!$result){
		   return $id;
	   }
	 return $result->nama;
	 
	}
	
	public function attr_wilayah($id){
	 
	 $result =  Tbl_wilayah::where('kode',$id)->first();
	  if(!$result){
		   return $id;
	   }
	 return $result->nama;
	 
	}

}
