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
                   
                  <a href="{{ url('/administrator/data_tpk/create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Tambah Petugas
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
                    <table id="datatable-tpk" class="table card-table table-vcenter table-bordered text-nowrap datatable bg-muted-lt">
                      <thead>
					   <tr>
						  <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
                          </th>
						  
						  <th>NIP</th>
                          <th>Nama</th>
                          <th>Wilayah</th>
                          <th>Alamat Lengkap</th>
                          <th>Telp</th>
                          <th>Email</th>
                          <th>Aksi</th>
						  
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
			dom: '<"datatable-header pb-4"fl><"datatable-scroll py-4"t><"datatable-footer"ipB>', 	
			buttons: ['copy',
            'excel',
            'csv',
            'pdf'],
            language: {
                search: '<span>NIP :</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });
	
	var data 	= getUrlVars();
		 
    var table 	= $('#datatable-tpk').DataTable( {
		"responsive": true,
        "processing": true,
        "serverSide": true,
		"ajax": {
            "url": BaseUrl+"/api/v1/user_tpk/list",
            "data": data,
            "type": "POST",
			"dataSrc"	: function(json){
						   json.draw = json.data.draw;
						   json.recordsTotal = json.data.recordsTotal;
						   json.recordsFiltered = json.data.recordsFiltered;  
						   return json.data.data;
						},
            "beforeSend": function(){ 
							$('#datatable-tpk tbody').html('');
							$('.loader').show();
						},
			"complete"	: function (response) {
							 
							if(response.responseJSON.meta){
							 
							if(response.responseJSON.breadcrumb !="[]"){
							$('.filter').html('Showing Filter : '+response.responseJSON.breadcrumb);
							}
							}
						},
        },
        "columns": [
			{ "data": null },
            { "data": "nip" },
			{ "data": "nama" },
            { "data": "wilayah_id"},
            { "data": "alamat"},
            { "data": "no_telp" },
            { "data": "email" },
             
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
                                 
                                '<a class="dropdown-item" id="update" href="#">Update Data</a>'+
                                '<a class="dropdown-item" id="hapus" href="#">Hapus Data</a>'+
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
		   
        } 
		  
			
    } );
	
	$('#datatable-tpk tbody').on( 'click', '#open', function () {
        var data = table.row( $(this).parents('tr') ).data();
		window.location.href = BaseUrl+"/administrator/data_tpk/open/"+data['id'];
    } );
	$('#datatable-tpk tbody').on( 'click', '#update', function () {
        var data = table.row( $(this).parents('tr') ).data();
		window.location.href = BaseUrl+"/administrator/data_tpk/update/"+data['id'];
    } );
    
    $('#datatable-tpk tbody').on( 'click', '#hapus', function () {
         var data = table.row( $(this).parents('tr') ).data();
		 deleteUser(data['id']);
			 
    } );
	
	function deleteUser(id) {
		if($.isNumeric(id)){
			var path = BaseUrl+"/api/v1/user_tpk/delete/"+id;
		}
		swal("Are you sure?", {
                buttons: {
                    cancel: "No, cancel!!",
                    catch: {
                        text: "Yes, Delete it!",
                        value: "yes",
                    },
                    
                },
            })
            .then((value) => {
                if(value == 'yes'){
                    $(":submit").prop("disabled", true);
                        $.ajax({
                            data: "",
                            url: path,
                            method: 'DELETE',
                            complete: function(response){                
                            if(response.status == 200){
                                swal({
                                        title: 'deleted!',
                                        text: response.responseJSON.message,
                                        icon:'success'
                                    }); 
                                    table.ajax.reload();
                            }else{
                                swal({
                                        title: 'Aborted!',
                                        text: response.responseJSON.message,
                                        icon:'warning'
                                    });	
                                table.ajax.reload();
                                 
                            }
                            },
                            dataType:'json'
                    });
                    }
                });
	};
	 
	 
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