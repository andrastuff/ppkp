@extends('layouts.admin.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/administrator/dist/js/datatables.min.css') }}">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	  <div class="page">
	  @include('layouts.admin.navbar')
	  <div class="page-wrapper">
        <!-- Page header -->
		<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Overview
                </div>
                <h2 class="page-title">
				{{ $data['title'] }}
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                 <div class="btn-list">
                 
                  <a onclick="goBack()" href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l14 0"></path><path d="M5 12l6 6"></path><path d="M5 12l6 -6"></path></svg>
					Kembali
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
		
        <div class="page-body">
          <div class="container-xl">
		   <div class="row row-cards pb-4">
			  <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <div class="subheader">Ticket Kunjungan</div>
                    <div class="h3 m-0 kode_baduta">--</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <div class="subheader">Kunjungan Terakhir</div>
                    <div class="h3 m-0 kunjungan_terakhir">--</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <div class="subheader">Jumlah Kunjungan</div>
                    <div class="h3 m-0 jumlah_kunjungan">-</div>
                  </div>
                </div>
              </div>
             </div>
			  
            <div class="card">
              <div class="row g-0">
                 
                <div class="col d-flex flex-column">
                  <div class="card-body">
                    <h2 class="mb-4 "> </h2>
                    <h3 class="card-title nama">--</h3>
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url(static/avatars/000m.jpg)"></span>
                      </div>
                       
                    </div>
                    <h3 class="card-title mt-4">Data IBU</h3>
                    <div class="row g-3">
                      <div class="col-md">
                        <div class="form-label">NIK</div>
                        <div class="form-label nik">--</div>
                      </div>
                       
					  <div class="col-md">
                        <div class="form-label">Tgl. Lahir</div>
                        <div class="form-label tgl_lahir">--</div>
                      </div>
					  <div class="col-md">
                        <div class="form-label">Usia</div>
                        <div class="form-label usia">--</div>
                      </div>
					  
					  
                    </div>
                    <h3 class="card-title mt-4">Hasil Screening</h3>
                    <p class="card-subtitle">This data will be shown to others publicly, so choose it carefully.</p>
                    <div>
                      <div class="row g-2">
                       <table id="table-intervensi" class="table table-striped table-bordered detail-view">
							<tbody>
								 
								<tr><th width="30%">Kunjungan Ke</th><td><span class="kunjungan"></span></td></tr>
								<tr><th>Pendamping TPK</th><td><span class="pendamping_id"></span></td></tr>
								<tr><th>Tgl. Kunjungan</th><td><span class="tgl_kunjungan"></span></td></tr>
								<tr><th>Kampung</th><td><span class="wilayah_id"></span></td></tr>
								<tr><th> </th><td><span class=" "></span></td></tr>
								<tr><th>Tgl. Lahir Anak Sebelumnya</th><td><span class="tgl_lahir_anak_sebelum"></span></td></tr>
								<tr><th>Penggunaan Kontrasepsin</th><td><span class="penggunaan_kontrasepsi"></span></td></tr>
								<tr><th>Air Minum Layak</th><td><span class="air_minum_layak"></span></td></tr>
								<tr><th>Tempat Bab Layak</th><td><span class="tempat_bab_layak"></span></td></tr>
								<tr><th> </th><td><span class=" "></span></td></tr>
								<tr><th>Nama Bayi</th><td><span class="nama_bayi"></span></td></tr>
								<tr><th>Tgl. Lahir Bayi</th><td><span class="tgl_lahir_bayi"></span></td></tr>
								<tr><th>Usia Bayi</th><td><span class="usia_bayi"></span></td></tr>
								<tr><th>Jenis Kelamin</th><td><span class="jenis_kelamin"></span></td></tr>
								<tr><th>Anak Ke</th><td><span class="urutan_anak_ke"></span></td></tr>								
								<tr><th>Umur Kehamilan</th><td><span class="umur_kehamilan"></span></td></tr>								
								<tr><th>PB Lahir</th><td><span class="pb_lahir"></span></td></tr> 
								<tr><th>BB Kehamilan</th><td><span class="bb_kehamilan"></span></td></tr> 
								<tr><th>ASI Ekslusif</th><td><span class="asi_ekslusif"></span></td></tr> 
								<tr><th>Tgl. pengukuran Saat Ini</th><td><span class="tgl_pengukuran_saat_ini"></span></td></tr> 
								<tr><th>BB Saat Ini Pelayanan</th><td><span class="bb_saat_ini"></span></td></tr> 
								<tr><th>PB Saat Ini</th><td><span class="pb_saat_ini"></span></td></tr> 
								<tr><th>Pengisian KKA</th><td><span class="pengisian_kka"></span></td></tr> 
								<tr><th>Kehadiran Posyandu</th><td><span class="kehadiran_posyandu"></span></td></tr> 
								<tr><th>Penyuluhan KIE</th><td><span class="penyuluhan_kie"></span></td></tr> 
								<tr><th>Fasilitas Rujukan</th><td><span class="pemberian_fasilitas_rujukan"></span></td></tr> 
								 
								<tr><th>BANSOS</th><td><span class="bansos"></span></td></tr>
								<tr><th>Catatan Kunjungan</th><td><span class="catatan_kunjungan"></span></td></tr>
							 
							</tbody>
						</table>
                      </div>
                    </div>
                    
                  </div>
                  <div class="card-footer bg-transparent mt-auto">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
		<!-- Page body -->
        
        @include('layouts.admin.footer')
		
      </div>
    </div>
   
    <!-- Libs JS -->
     
    <!-- Tabler Core -->
 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js"></script>
<script>
 
	var id = window.location.pathname.split('/').pop();
	
	
	 
	
	function loadData(){
		
		
		$.ajax({
					data: {},
					url: BaseUrl+"/api/v1/baduta/view_id/"+id,
                    crossDomain: false,
                   
                    method: 'GET',
                    complete: function(response){ 		
                        if(response.status == 200){
							 $(".nama").html(response.responseJSON.data.nama);
							 $(".nik").html(response.responseJSON.data.nik);
							 $(".usia").html(response.responseJSON.data.usia);
							 $(".tgl_lahir").html(response.responseJSON.data.tgl_lahir);
							 
							 $(".wilayah_id").html(response.responseJSON.data.wilayah_id);
							 $(".pendamping_id").html(response.responseJSON.data.pendamping_id);
							 $(".tgl_kunjungan").html(response.responseJSON.data.tgl_kunjungan);
							 $(".kunjungan").html(response.responseJSON.data.kunjungan);
							 $(".catatan_kunjungan").html(response.responseJSON.data.catatan_kunjungan);
							 
							 $(".nama_bayi").html(response.responseJSON.data.nama_bayi);
							 $(".tgl_lahir_bayi").html(response.responseJSON.data.tgl_lahir_bayi);
							 $(".usia_bayi").html(response.responseJSON.data.usia_bayi);
							 $(".jenis_kelamin").html(response.responseJSON.data.jenis_kelamin);
							 $(".urutan_anak_ke").html(response.responseJSON.data.urutan_anak_ke);
							 $(".umur_kehamilan").html(response.responseJSON.data.umur_kehamilan);
							 $(".pb_lahir").html(response.responseJSON.data.pb_lahir);
							 $(".bb_kehamilan").html(response.responseJSON.data.bb_kehamilan);
							 $(".asi_ekslusif").html(response.responseJSON.data.asi_ekslusif);
							 $(".tgl_pengukuran_saat_ini").html(response.responseJSON.data.tgl_pengukuran_saat_ini);
							 $(".bb_saat_ini").html(response.responseJSON.data.bb_saat_ini);
							 $(".pb_saat_ini").html(response.responseJSON.data.pb_saat_ini);
							 $(".pengisian_kka").html(response.responseJSON.data.pengisian_kka);
							 $(".kehadiran_posyandu").html(response.responseJSON.data.kehadiran_posyandu);
							 $(".penyuluhan_kie").html(response.responseJSON.data.penyuluhan_kie);
							 $(".pemberian_fasilitas_rujukan").html(response.responseJSON.data.pemberian_fasilitas_rujukan);
							 
							 $(".bansos").html(response.responseJSON.data.bansos);
							 $(".jumlah_kunjungan").html(response.responseJSON.data.jumlah_kunjungan+' <a class="text-info small ps-4" href="'+BaseUrl+'/administrator/data_baduta/kode_baduta/'+response.responseJSON.data.kode_baduta+'">Lihat Riwayat</a>');
							 $(".kunjungan_terakhir").html(response.responseJSON.data.kunjungan_terakhir);
							 
							 $(".kode_baduta").html('<a class="text-info" href="'+BaseUrl+'/administrator/data_baduta/kode_baduta/'+response.responseJSON.data.kode_baduta+'">'+response.responseJSON.data.kode_baduta+'</a>');
							 
							 
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}else if(response.status == 404){
							 
							 //window.location.replace(BaseUrl+'/skpd/'+param);
						}
                    },
					dataType:'json'
                })
	}
	
	loadData();

	
	function nullToDash(obj){
			if(obj===null){
				return "";
			}else{
				return obj;
			} 
	}
	
	function prints() {
		$('td:nth-child(11), th:nth-child(11)').hide();
		$('td:nth-child(10), th:nth-child(10)').hide();
		$('#datatable-intervensi thead').removeClass('bg-teal-700');
		$(".datatable-scroll").printArea({ mode: 'popup', popClose: true });
	};

	
	 
</script>

@endsection