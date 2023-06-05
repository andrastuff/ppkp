<?php

namespace App\Http\Controllers\Response\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Api as Controller;
use App\Models\Tbl_bumil;
use App\Models\Tbl_catin;
use App\Models\Tbl_pasca_persalinan;
use App\Models\Tbl_baduta;
use App\Models\Tbl_ket_variabel;
use App\Models\Tbl_wilayah;

use Validator;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Meta extends Controller
{
    //STOCK Filter
	public function filter(request $request){
		
		$tbl_variabel	= $request->tbl_variabel;
		\DB::statement("SET SQL_MODE=''");
		$get	= Tbl_ket_variabel::where('tbl_variabel', $tbl_variabel)->orderBy('ket_variabel', 'ASC')->groupBy('nama_variabel')->get();
	 
		$result		= array();
		
		if(empty($get)){
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendResponseError($message);
		}
		foreach ($get as $item) {
			 //var_dump($get);
			$result[] = array(
						 
						'nama_variabel' => $item->nama_variabel,
						'ket_variabel' => $item->ket_variabel,
						'series' => Tbl_ket_variabel::where('tbl_variabel', $tbl_variabel)->where('nama_variabel', $item->nama_variabel)->orderBy('ket_variabel', 'ASC')->get(),
						);
		}
		
		 
		
		return  $this->sendResponseOk($result);
	}
	
	//MELIHAT GRAFIK KUNJUNGAN BUMIL
	public function report(Request $request){
		 
		 //MELIHAT GRAFIK 7 HARI KUNJUNGAN BUMIL
		$m = today()->format('m');
		$y = today()->format('Y');
		$last = today()->subDays(6)->format('m');
		$aa = Tbl_bumil::where('tgl_kunjungan','>=',$last)->get();
		
		$period = now()->subDays(6)->daysUntil(now());
		$attribut = [];
		
		$bumil = [];
		$catin = [];
		$pasca_p = [];
		$baduta = [];
		$kbumil = [];
		$kcatin = [];
		$kpasca_p = [];
		$kbaduta = [];
		$report1 = [];
		$report2 = [];
		 
		foreach ($period as $date)
		{
		   $bumil[] = Tbl_bumil::where('tgl_kunjungan', $date->format('Y-m-d'))->count();
		   $catin[] = Tbl_catin::where('tgl_kunjungan', $date->format('Y-m-d'))->count();
		   $pasca_p[] = Tbl_pasca_persalinan::where('tgl_kunjungan', $date->format('Y-m-d'))->count();
		   $baduta[] = Tbl_baduta::where('tgl_kunjungan', $date->format('Y-m-d'))->count();
		   $report1['label'][] = $date->format('Y-m-d');
		} 
		
		//MELIHAT GRAFIK KECAMATAN KUNJUNGAN BUMIL
		$kecamatan = Tbl_wilayah::whereRaw('LENGTH(kode) <= 8')->get();
		foreach ($kecamatan as $kec)
		{
		   $kbumil[] = Tbl_bumil::where('wilayah_id', $kec->kode)->count();
		   $kcatin[] = Tbl_catin::where('wilayah_id', $kec->kode)->count();
		   $kpasca_p[] = Tbl_pasca_persalinan::where('wilayah_id', $kec->kode)->count();
		   $kbaduta[] = Tbl_baduta::where('wilayah_id', $kec->kode)->count();
		   
		   //$report2['series']['data'][] = Tbl_bumil::where('wilayah_id', $kec->kode)->count();
		   $report2['label'][] = $kec->nama;
		} 
		
		$report1['series'] =array([
							"name" =>"BUMIL",
							"data" => $bumil
							],[
							"name" =>"CATIN",
							"data" => $catin
							],[
							"name" =>"PASCA PERSALINAN",
							"data" => $pasca_p
							],[
							"name" =>"BADUTA",
							"data" => $baduta
							]);
							
		$report2['series'] =array([
							"name" =>"BUMIL",
							"data" => $kbumil
							],[
							"name" =>"CATIN",
							"data" => $kcatin
							],[
							"name" =>"PASCA PERSALINAN",
							"data" => $kpasca_p
							],[
							"name" =>"BADUTA",
							"data" => $kbaduta
							]);
	 
		$attribut['t_bumil'] = Tbl_bumil::count();
		$attribut['t7_bumil'] = array_sum($bumil);
		
		$attribut['t_catin'] = Tbl_catin::count();
		$attribut['t7_catin'] = array_sum($catin);
		
		$attribut['t_pasca_persalinan'] = Tbl_pasca_persalinan::count();
		$attribut['t7_pasca_persalinan'] = array_sum($pasca_p); 
		
		$attribut['t_baduta'] = Tbl_baduta::count();
		$attribut['t7_baduta'] = array_sum($baduta);
		
		$result['attribut']  = $attribut;
		$result['report1']  = $report1;
		$result['report2']  = $report2;
		 
		 
		return $this->sendResponseOk($result);

	}
	
	public function wilayah_list(){
		
		
		$result	= Tbl_wilayah::orderBy('nama', 'ASC')->get();
	 
	 
		
		if(empty($result)){
		   $message 	= 'Your request couldn`t be found';
		   return $this->sendResponseError($message);
		}
		 
		 
		 
		return  $this->sendResponseOk($result);
	}
	
	 
}
