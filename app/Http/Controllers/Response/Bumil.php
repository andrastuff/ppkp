<?php

namespace App\Http\Controllers\Response;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api as Controller;
use App\Models\Tbl_bumil;

use Validator;
use Illuminate\Support\Arr;
use Image;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Bumil extends Controller
{
    //STOCK DATATABLE
	public function index(Request $request){
		
		$dateStart	= $request->input('dateStart');	
		if ($dateStart == ''){$dateStart = "2022-01-01"; };
		$dateEnd	= $request->input('dateEnd');
		if ($dateEnd == ''){$dateEnd = date("Y-m-d"); };
		
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
		 
		$data 	= Tbl_bumil::orderBy($columns, $sort)
					->whereRaw('Year(`tgl_kunjungan`)'.$year)
					->whereBetween('tgl_kunjungan', [$dateStart, $dateEnd])					
					->where('kunjungan', 1)
					->where('nama', 'like', '%'.$search.'%')
					->offset($offset)
					->limit($limit)
					->get();
					
		$total  = Tbl_bumil::where('nama', 'like', '%'.$search.'%')
					->whereRaw('Year(`tgl_kunjungan`)'.$year)
					->whereBetween('tgl_kunjungan', [$dateStart, $dateEnd])
					->where('kunjungan', 1)
					->count();
		
		$result['draw']           = $draw ;
		$result['recordsTotal']   = $total;
		$result['recordsFiltered']= $total;
		$result['data'] = $data;
		
		return  $this->sendResponseOk($result);
	}
	
	public function view_id(Request $request){
		$result          = Tbl_bumil::find($request->id);
		
		
		if(empty($result)){
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendResponseError($message);
		}

		return $this->sendResponseOk($result);

	}
	
	//MELIHAT SEMUA RIWAYAT KUNJUNGAN PER BUMIL
	public function view_kode(Request $request){
		$result          = Tbl_bumil::where('kode_bumil', $request->kode_bumil)->get();
		
		
		if(empty($result)){
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendResponseError($message);
		}

		return $this->sendResponseOk($result);

	}
	
	//CREATE DAN KUNJUNGAN
	public function create(request $request){
		
        $validator = Validator::make($request->all(), [
            'wilayah_id' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendResponseError(json_encode($validator->errors()));       
        }
		
		//BEGIN INPUT PROCESS
		$img = '';
		$kunjungan = 1;
		$kode_bumil = $this->created(uniqid());
		
		if($request->file('userfile')) {
			$img = $this->upload($request);
		}
		
		if($request->kode_bumil != ''){ $kode_bumil = $request->kode_bumil; };
		
		//CEK JIKA SUDAH PERNAH KUNJUNGAN
		$get_k  = Tbl_bumil::where('nik', $request->nik)->latest()->first();
		if($get_k){ 
		$kunjungan = $get_k+1; 
		};
		
		$input  = Tbl_bumil::create([
			'kode_bumil'    => $kode_bumil,
    		'wilayah_id'    => $request->wilayah_id,
    		'pendamping_id' => Auth::user()->id,
    		'nik' 			=> $request->nik,
    		'nama'   		=> $request->nama,
    		'alamat'        => $request->alamat,
    		'jumlah_anak'   => $request->jumlah_anak,
    		'status_jumlah_anak' => $request->status_jumlah_anak,
    		'usia_hamil'      => $request->usia_hamil,
    		'tfu'         => $request->tfu,
    		'status_tfu'       => $request->status_tfu,
    		'bb'       => $request->bb,
    		'tb'       => $request->tb,
    		'imt'       => $request->imt,
			'status_imt'       => $request->status_imt,
    		'riwayat_penyakit'       => $request->riwayat_penyakit,
    		'status_riwayat_penyakit'       => $request->status_riwayat_penyakit,
    		'kadar_hb'       => $request->kadar_hb,
    		'status_hb'       => $request->status_hb,
    		'lila'       => $request->lila,
    		'status_lila'       => $request->status_lila,
    		'tbj'       => $request->tbj,
    		'status_tbj'       => $request->status_tbj,
    		'terpapar_rokok'       => $request->terpapar_rokok,
    		'suplement_darah'       => $request->suplement_darah,
    		'rujukan_pelayanan'       => $request->rujukan_pelayanan,
    		'bansos'       => $request->bansos,
    		'tgl_kunjungan'       => $request->tgl_kunjungan,
    		'kunjungan'       => $kunjungan,
    		'catatan_kunjungan'       => $request->catatan_kunjungan,
    		 
    		]);
			
		return $this->sendResponseCreate($input);	
		
		
	}
	
	//UPDATE BUMIL
	public function update(request $request, $id){
		
		$validator = Validator::make($request->all(), [
            'wilayah_id' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            
        ]);

        if($validator->fails()){
            return $this->sendResponseError(json_encode($validator->errors()));       
        }
		
		//BEGIN INPUT PROCESS
		$img = '';
		 
		if($request->file('userfile')) {
			$result = Tbl_bumil::find($id);
			
			$image_path     = base_path('/assets/images/bumil').$result->img;

			if(file_exists($image_path)) {
				@unlink($image_path);
			}
			
			$img = $this->upload($request);
		}
		 
		$input = Tbl_bumil::where('id', $id)->update([
			'kode_bumil'    => $request->kode_bumil,
			'wilayah_id'    => $request->wilayah_id,
    		'pendamping_id' => Auth::user()->id,
    		'nik' 			=> $request->nik,
    		'nama'   		=> $request->nama,
    		'alamat'        => $request->alamat,
    		'jumlah_anak'   => $request->jumlah_anak,
    		'status_jumlah_anak' => $request->status_jumlah_anak,
    		'usia_hamil'      => $request->usia_hamil,
    		'tfu'         => $request->tfu,
    		'status_tfu'       => $request->status_tfu,
    		'bb'       => $request->bb,
    		'tb'       => $request->tb,
    		'imt'       => $request->imt,
			'status_imt'       => $request->status_imt,
    		'riwayat_penyakit'       => $request->riwayat_penyakit,
    		'status_riwayat_penyakit'       => $request->status_riwayat_penyakit,
    		'kadar_hb'       => $request->kadar_hb,
    		'status_hb'       => $request->status_hb,
    		'lila'       => $request->lila,
    		'status_lila'       => $request->status_lila,
    		'tbj'       => $request->tbj,
    		'status_tbj'       => $request->status_tbj,
    		'terpapar_rokok'       => $request->terpapar_rokok,
    		'suplement_darah'       => $request->suplement_darah,
    		'rujukan_pelayanan'       => $request->rujukan_pelayanan,
    		'bansos'       => $request->bansos,
    		'tgl_kunjungan'       => $request->tgl_kunjungan,
    		'catatan_kunjungan'       => $request->catatan_kunjungan,
		]);
		return $this->sendResponseUpdate(null);
	}
	
	//DELETE BUMIL
	public function delete($id){
		$data = Tbl_bumil::find($id);


		$data->delete();
		 
		return $this->sendResponseDelete($data);
	}

	
	public function upload($request){
		
       
		$originalImage  = $request->file('file');
		$thumbnailImage = Image::make($originalImage);
		$originalPath   = base_path('/assets/images/bumil/');
		$time = time();
        $image          = $time.str_replace(" ", "-",$originalImage->getClientOriginalName());
		if(!is_dir($originalPath)) {
			mkdir($originalPath, 0755, true);
		}

        $thumbnailImage->save($originalPath.$image);
       
		return $image;
	}
	
	
}
