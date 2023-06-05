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
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
     
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title nama"></h3>
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
                          <th rowspan="2" class="text-center">Kunjungan Ke</th>
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
			  
			   
			</div>
          </div>
        </div>
		
        @include('layouts.admin.footer')
		
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
	var id = window.location.pathname.split('/').pop();	 
    var table 	= $('#datatable-baduta').DataTable( {
		"responsive": true,
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": BaseUrl+"/api/v1/baduta/view_kode/"+id,
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
							$('.nama').html(response.responseJSON.data.data[0].nama.toUpperCase());
							
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
       
             
            { "data": "kunjungan" },
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
		      $('td', row).eq(26).addClass('bg-yellow-lt');
            
        } 
		  
			
    } );
	
	$('#datatable-baduta tbody').on( 'click', '#open', function () {
        var data = table.row( $(this).parents('tr') ).data();
		window.location.href = BaseUrl+"/administrator/data_baduta/open/"+data['id'];
    } );
	 
    $('#datatable-baduta tbody').on( 'click', 'td:nth-child(2)', function () {
         var data = table.row( $(this).parents('tr') ).data();
		window.location.href = BaseUrl+"/administrator/data_baduta/open/"+data['id'];
			 
    } );
	
	 


	function filter(){
		$("#modal_filter").modal("show");
		loadInstansi();  
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