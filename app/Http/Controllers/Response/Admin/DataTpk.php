<?php

namespace App\Http\Controllers\Response\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api as Controller;
use App\Models\Tbl_user_tpk;
use App\Models\Tbl_wilayah;
use App\Models\Tbl_ket_variabel;

use Validator;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DataTpk extends Controller
{
    //STOCK DATATABLE
	public function index(Request $request){
		
		 
		$year 		= $request->year; if ($year == ''){$year = 'IS NOT NULL'; }else {$year = '= '.$year;};
		$draw 		= $request->draw;
		$offset		= $request->start; if ($offset == ''){$offset = 0; };
		$limit		= $request->length; if ($limit == ''){$limit = 25; };
		if(isset($request->search['value'])){
			$search = $request->search['value']; 
			} else { 
			$search = ''; 
		};
		if(isset($request->order[0]['column'])){
			$order = $request->order[0]['column']; 
			} else { 
			$order = ''; 
		};		
		if(isset($request->order[0]['dir'])){
			$sort 		= $request->order[0]['dir'];
			} else { 
			$sort = 'DESC'; 
		};	 
		if(isset($request->columns[$order]['data'])){
			$columns	= $request->columns[$order]['data']; 
			} else { 
			$columns = 'id'; 
		}; 
		 
		$data 	= Tbl_user_tpk::query();
		$data	= $data->orderBy($columns, $sort);
		$data	= $data->where('nip', 'like', '%'.$search.'%');		
		$data	= $data->offset($offset);
		$data	= $data->limit($limit);
		$data	=$data->get();
		
		Foreach($data as $key=>$val){
			$data[$key]->wilayah_id = $this->attr_wilayah($val->wilayah_id);
			
		} 
					
		$total  = Tbl_user_tpk::query();
		$total  = $total->where('nip', 'like', '%'.$search.'%');
		$total  = $total->count();
		 
		$result['draw']           = $draw ;
		$result['recordsTotal']   = $total;
		$result['recordsFiltered']= $total;
		$result['data'] = $data;
		
		return  $this->sendResponseOk($result);
	}
	
	public function view_id($id){
		$result          = Tbl_user_tpk::find($id);
		$result->wilayah_id         		= $this->attr_wilayah($result->wilayah_id);
		 
		if(empty($result)){
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendResponseError($message);
		}

		return $this->sendResponseOk($result);

	}
	
	public function update(request $request, $id){
		
		$validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'wilayah_id' => 'required',
			 
            
		]);
		if($validator->fails()){
            return $this->sendResponseError(json_encode($validator->errors()), $validator->errors());       
		}
		
		$result = Tbl_user_tpk::where('id', $id)->first();
			
		if ($request->password == "") {
			$realPassword = $result->password;
		} else {
			$realPassword = Hash::make($request->password);
		}

		$input = Tbl_user_tpk::where('id', $id)->update([
			'nip'   		=> $request->nip,
			'nama'   		=> $request->nama,
			'wilayah_id'   	=> $request->wilayah_id,
			'alamat'   		=> $request->alamat,
			'email'   		=> $request->email,
			'no_telp'    		=> $request->no_telp,
			'password'     	=> $realPassword,
		]);

		
		if($input){
			return $this->sendResponseCreate($input);
		}
	}

	public function create(request $request){
		$validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'wilayah_id' => 'required',
            
		]);
		if($validator->fails()){
            return $this->sendResponseError(json_encode($validator->errors()), $validator->errors());       
        }
		
		$input = Tbl_user_tpk::create([
			'nip'   		=> $request->nip,
			'nama'   		=> $request->nama,
			'wilayah_id'   	=> $request->wilayah_id,
			'alamat'   		=> $request->alamat,
			'email'   		=> $request->email,
			'no_telp'    		=> $request->no_telp,
			'password'     	=> Hash::make($request->password),
		]);

		

		if($input){
			return $this->sendResponseCreate($input);
		}
	}

	public function delete($id){	

		$user = Tbl_user_tpk::where('id', $id)->first();

		if($user){
			$user->delete();
			return $this->sendResponseDelete(null);
		}
	}
	
	
	
}
