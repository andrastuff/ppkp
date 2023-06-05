<?php

namespace App\Http\Controllers\Response\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api as Controller;
use App\Models\Tbl_baduta;
use App\Models\Tbl_wilayah;
use App\Models\Tbl_ket_variabel;

use Validator;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DataBaduta extends Controller
{
    //STOCK DATATABLE
	public function index(Request $request){
		
		$dateStart	= $request->dateStart;	
		if ($dateStart == ''){$dateStart = "2022-01-01"; };
		$dateEnd	= $request->dateEnd;
		if ($dateEnd == ''){$dateEnd = date("Y-m-d"); };
		
		\DB::statement("SET SQL_MODE=''");
		$variabel	= Tbl_ket_variabel::where('tbl_variabel', 'tbl_baduta')->orderBy('ket_variabel', 'ASC')->groupBy('nama_variabel')->get();
		$filter = [];
		foreach ($variabel as $item) {
			$filter[$item['nama_variabel']]	= $request->input($item->nama_variabel);
			
		}
		
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
		 
		$data 	= Tbl_baduta::query();
		$data	= $data->orderBy($columns, $sort);
		$data	= $data->whereRaw('Year(`tgl_kunjungan`)'.$year);
		$data	= $data->whereBetween('tgl_kunjungan', [$dateStart, $dateEnd])	;				
		$data	= $data->where('kunjungan', 1);
		$data	= $data->where('nik', 'like', '%'.$search.'%');
		if($filter){
			foreach ($filter as $key=>$val) {
				if ($val != null ){			 
		$data	= $data->where($key, $val);
				}	 
			}
		}
		$data	= $data->offset($offset);
		$data	= $data->limit($limit);
		$data	=$data->get();
		
		 
					
		$total  = Tbl_baduta::query();
		$total  = $total->where('nik', 'like', '%'.$search.'%');
		$total  = $total->whereRaw('Year(`tgl_kunjungan`)'.$year);
		$total  = $total->whereBetween('tgl_kunjungan', [$dateStart, $dateEnd]);
		$total  = $total->where('kunjungan', 1);
		if($filter){
			foreach ($filter as $key=>$val) {
				if ($val != null ){			 
		$data	= $data->where($key, $val);
				}	 
			}
		}
		$total  = $total->count();
					
		Foreach($data as $key=>$val){
			$data[$key] = $this->ket_variabel('tbl_baduta', $val);
			
		}
		
		$result['s']           = $filter ;
		$result['draw']           = $draw ;
		$result['recordsTotal']   = $total;
		$result['recordsFiltered']= $total;
		$result['data'] = $data;
		
		return  $this->sendResponseOk($result);
	}
	
	public function view_id($id){
		$result          = Tbl_baduta::find($id);
		 
		
		$result->jumlah_kunjungan           = Tbl_baduta::where('kode_baduta', $result->kode_baduta)->count();
		$result->kunjungan_terakhir         = Tbl_baduta::where('kode_baduta', $result->kode_baduta)->orderBy('id', 'DESC')->first()->tgl_kunjungan;
		$result->pendamping_id         		= $this->attr_pendamping($result->pendamping_id);
		$result->wilayah_id         		= $this->attr_wilayah($result->wilayah_id);
		$result = $this->ket_variabel('tbl_baduta', $result);
		
		if(empty($result)){
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendResponseError($message);
		}

		return $this->sendResponseOk($result);

	}
	
	//MELIHAT SEMUA RIWAYAT KUNJUNGAN PER BUMIL
	public function view_kode(Request $request, $id){
		$data          = Tbl_baduta::where('kode_baduta', $id)->orderBy('kunjungan', 'ASC')->get();
		Foreach($data as $key=>$val){
			$data[$key] = $this->ket_variabel('tbl_baduta', $val);
			
		}
		$result['data'] = $data;
		
		$result['recordsTotal']  = count($result['data']);
		$result['recordsFiltered']  = count($result['data']);
		if(empty($result['data'])){
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendResponseError($message);
		}

		return $this->sendResponseOk($result);

	}
	
	 
	
	//MELIHAT GRAFIK KUNJUNGAN BUMIL
	public function report(Request $request){
		 
		 //MELIHAT GRAFIK 7 HARI KUNJUNGAN BUMIL
		$m = today()->format('m');
		$y = today()->format('Y');
		$last = today()->subDays(7)->format('m');
		$result = Tbl_baduta::where('tgl_kunjungan','>=',$last)->get();
		
		$period = now()->subDays(7)->daysUntil(now());
		$attribut = [];
		$report2 = [];
		$report2 = [];
		 
		foreach ($period as $date)
		{
		   $report1['series']['data'][] = Tbl_baduta::where('tgl_kunjungan', $date->format('Y-m-d'))->count();
		   $report1['label'][] = $date->format('Y-m-d');
		} 
		
		//MELIHAT GRAFIK KECAMATAN KUNJUNGAN BUMIL
		$kecamatan = Tbl_wilayah::whereRaw('LENGTH(kode) <= 8')->get();
		foreach ($kecamatan as $kec)
		{
		    
		   $report2['series']['data'][] = Tbl_baduta::where('wilayah_id', $kec->kode)->count();
		   $report2['label'][] = $kec->nama;
		} 
		
		$attribut['kunjungan_terakhir'] = Tbl_baduta::orderBy('id', 'DESC')->first()->tgl_kunjungan;
		$attribut['total_kunjungan'] = Tbl_baduta::count();
		$attribut['kunjungan_bulan'] = Tbl_baduta::whereMonth('tgl_kunjungan', $m)->whereYear('tgl_kunjungan', $y)->count();
		
		$result['attribut']  = $attribut;
		$result['report1']  = $report1;
		$result['report2']  = $report2;
		 
		 
		return $this->sendResponseOk($result);

	}
	
	
}
