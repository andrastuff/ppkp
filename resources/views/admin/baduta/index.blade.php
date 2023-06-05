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
                  <span class="d-none d-sm-inline">
                    <a href="{{ url('administrator/data_baduta/grafik') }}" class="btn">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 3v18h18"></path><path d="M20 18v3"></path><path d="M16 16v5"></path><path d="M12 13v8"></path><path d="M8 16v5"></path><path d="M3 11c6 0 5 -5 9 -5s3 5 9 5"></path></svg>
                      Lihat Grafik
                    </a>
                  </span>
                  <a onclick="filter()" href="#" class="btn btn-primary d-none d-sm-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 3v4a1 1 0 0 0 1 1h4"></path><path d="M12 21h-5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v4.5"></path><path d="M16.5 17.5m-2.5 0a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0"></path><path d="M18.5 19.5l2.5 2.5"></path></svg>
                    Filter Data
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
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
     
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"> </h3>
                  </div>
                  <div class="card-body border-bottom py-3">
                     
                  
                  <div class="table-responsive">
                    <table id="datatable-baduta" class="table card-table table-vcenter table-bordered text-nowrap datatable bg-muted-lt">
                      <thead>
					   <tr >
						  <th rowspan="2" class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
                          </th>
						  
						  <th colspan="8" class="text-center">Data IBU</th>
						 
						  
                          <th colspan="17" class="text-center">Data Screening</th>
                          <th rowspan="2" class="text-center">Tgl. Kunjungan</th>
                          <th rowspan="2" class="text-center">Pendamping TPK</th>
                          <th rowspan="2" class="text-center">Aksi</th>
						</tr>
                        <tr>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Tgl. Lahir</th>
                          <th>Usia</th>
                          <th>Tgl. Lahir Anak Sebelumnya</th>
                          <th>Penggunaan Kontrasepsi</th>
                          <th>Air Minum Layak</th>
                          <th>Tempat BAB Layak</th>
                          
                          <th>Nama Bayi</th>
                          <th>Tgl. Lahir Bayi</th>
                          <th>Usia Bayi</th>
                          <th>Janis Kelamin</th>
                          <th>Anak Ke</th>
                          <th>Umur Kehamilan</th>
                          <th>PB Lahir</th>
                          <th>BB Kehamilan</th>
                          <th>ASI Ekslusif</th>
                          <th>Tgl. Pengukuran</th>
                          <th>BB Saat Ini</th>
                          <th>PB Saat Ini</th>
                          <th>Pengisian KKA</th>
                          <th>Kehadiran Posyandu</th>
                          <th>Penyuluhan KIE</th>
                          <th>Fasilitas Rujukan</th>
                          <th>Bansos</th>
                           
                 
                          
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
				  <div class="card-footer d-flex align-items-center">
                     <ul class="pagination m-0 ms-auto">
                       
                      <li class="page-item">
                        <a class="page-link" href="#">
                          Geser Tabel Ke Kanan <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
			  
			   <div class="col-12">
                <div class="card card-md">
                  <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-primary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" /><path d="M10 10l.01 0" /><path d="M14 10l.01 0" /><path d="M10 14a3.5 3.5 0 0 0 4 0" /></svg>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-10">
                        <h3 class="h1">Perlu Kunjungan Baduta ?</h3>
                        <div class="markdown text-muted">
                         Sebuah inovasi
untuk menekan angka stunting yang ditujukan kepada
calon pengantin, pasangan usia subur, ibu hamil,
ibu pasca persalinan, dan balita.
                        </div>
                        <!-- <div class="mt-3">
                          <a href="https://tabler-icons.io/" class="btn btn-primary" target="_blank" rel="noopener">Tampilkan Data</a>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			</div>
          </div>
        </div>
		
        @include('layouts.admin.footer')
		
      </div>
    </div>
    <div class="modal modal-blur fade" id="modal_report" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
	  <form id="form-filter" action="">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Filter Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-body">
            <div class="row" id="filter">
               
            </div>
          </div>
          <div class="modal-footer">
            
            <button type="submit" class="btn">Apply Filter</button>
          </div>
        </div>
		</form>
      </div>
    </div>
    <!-- Libs JS -->
    
    <!-- Tabler Core -->
	

	<script src="{{ asset('assets/administrator/dist/js/datatables.min.js') }}"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script> 
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script> 

	<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js"></script>
<script>

	$.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            selected: true,
			dom: '<"datatable-header pb-4"fl><"datatable-scroll py-4"t><"datatable-footer"pB><"dataTables_info"i>', 	
			buttons: [{
                        extend: 'copy',
                        className: 'btn btn-primary',
                       
                    },
					{
                        extend: 'excel',
                        className: 'btn btn-success',
                       
                    },
					{
                        extend: 'csv',
                        className: 'btn btn-secondary',
                       
                    },
					{
                        extend: 'pdf',
                        className: 'btn btn-info',
                       
                    }],
			
      initComplete: function() { 
        var btns = $('.dt-button');
        btns.removeClass('dt-button');
      },
            language: {
                search: '<span>NIK:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
    });
	
	
	var data 	= getUrlVars();
		 
    var table 	= $('#datatable-baduta').DataTable( {
		"responsive": true,
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": BaseUrl+"/api/v1/baduta/list",
            "data": data,
            "type": "POST",
			"dataSrc"	: function(json){
						   json.draw = json.data.draw;
						   json.recordsTotal = json.data.recordsTotal;
						   json.recordsFiltered = json.data.recordsFiltered;  
						   return json.data.data;
						},
            "beforeSend": function(){ 
							$('#datatable-baduta tbody').html('');
							$('.loader').show();
						},
			"complete"	: function (response) {
							$('td:nth-child(10), th:nth-child(10)').show();
							$('td:nth-child(11), th:nth-child(11)').show();
							 
							if(response.responseJSON.meta){
							 
							if(response.responseJSON.breadcrumb !="[]"){
							$('.filter').html('Showing Filter : '+response.responseJSON.breadcrumb);
							}
							}
						},
        },
        "columns": [
			{ "data": null },
            { "data": "nik" },
			{ "data": "nama" },
            { "data": "tgl_lahir" },
            { "data": "usia" },
            { "data": "tgl_lahir_anak_sebelum" },
            { "data": "penggunaan_kontrasepsi" },
            { "data": "air_minum_layak" },
            { "data": "tempat_bab_layak" },
			
            { "data": "nama_bayi" },
            { "data": "tgl_lahir_bayi" },
            { "data": "usia_bayi" },
            { "data": "jenis_kelamin" },
            { "data": "urutan_anak_ke" },
            { "data": "umur_kehamilan" },
            { "data": "pb_lahir" },
            { "data": "bb_kehamilan" },
            { "data": "asi_ekslusif" },
            { "data": "tgl_pengukuran_saat_ini" },
            { "data": "bb_saat_ini" },
            { "data": "pb_saat_ini" },
            { "data": "pengisian_kka" },
            { "data": "kehadiran_posyandu" },
            { "data": "penyuluhan_kie" },
            { "data": "pemberian_fasilitas_rujukan" },
            { "data": "bansos" },
       
             
            { "data": "tgl_kunjungan" },
            
            { "data": "pendamping_id" },
            { "data": null }
        ],
		 "columnDefs": [ {
            "targets": -1,
            "data": null,
			"orderable": false,
            "defaultContent": '<td class="text-end">'+
                            '<span class="dropdown">'+
                              '<button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 6l16 0"></path><path d="M4 12l16 0"></path><path d="M4 18l12 0"></path></svg></button>'+
                              '<div class="dropdown-menu dropdown-menu-end">'+
                                '<a class="dropdown-item" id="open" href="#">Lihat Data</a>'+
                                '<a class="dropdown-item" id="riwayat" href="#">Riwayat Kunjungan</a>'+
                              '</div>'+
                            '</span>'+
                          '</td>'
        },{
            "searchable": false,
            "orderable": false,
            "targets": 0,
			"data": "id",
			render: function (data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			}
			 
        } ],
		"createdRow": function ( row, data, index ) {
		      $('td', row).eq(1).addClass('text-info');
            
        } 
		  
			
    } );
	
	$('#datatable-baduta tbody').on( 'click', '#open', function () {
        var data = table.row( $(this).parents('tr') ).data();
		window.location.href = BaseUrl+"/administrator/data_baduta/open/"+data['id'];
    } );
	$('#datatable-baduta tbody').on( 'click', '#riwayat', function () {
        var data = table.row( $(this).parents('tr') ).data();
		window.location.href = BaseUrl+"/administrator/data_baduta/kode_baduta/"+data['kode_baduta'];
    } );
    
    $('#datatable-baduta tbody').on( 'click', 'td:nth-child(2)', function () {
         var data = table.row( $(this).parents('tr') ).data();
		window.location.href = BaseUrl+"/administrator/data_baduta/open/"+data['id'];
			 
    } );
	
	function loadfilter(){
		$.ajax({
				data:  {"tbl_variabel":"tbl_baduta"},
				url: BaseUrl+"/api/v1/meta/filter",
				crossDomain: false,
				 
				method: 'GET',
				complete: function(response){ 			
					if(response.status == 200){
						 
						var opt_1 = '';
						 
						$.each(response.responseJSON.data, function(k,v){
							opt_1 +='<div class="col-lg-6"><div class="mb-3">';
							  opt_1 +='<label class="form-label">'+v.ket_variabel+'</label>';
							  opt_1 +='<select name="'+v.nama_variabel+'" class="form-select tomselected">';
							  opt_1 += '<option value="">Tampilkan Semua</option>';
							  $.each(v.series, function(x,y){
								opt_1 += '<option value='+y.kode+'>'+y.ket_kode.toUpperCase()+'</option>';
							  });
							  opt_1 +='</select>';
							opt_1 +='</div></div>';
							 
						});
					
						$('#filter').html(opt_1);
						 
					} 
				},
				dataType:'json'
			})
	
	};
	


	function filter(){
		$("#modal_report").modal("show");
		 loadfilter(); 
	}
	
	 
	 
	function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
			vars[key] = value.replace(/\+/g, ' ').replace(/\#/g, ' ');
		});
		return vars;
	}
	
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