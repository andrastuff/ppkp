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
                    <div class="subheader">Total Kunjungan</div>
                    <div class="h3 m-0 total_kunjungan">--</div>
                  </div>
                </div>
              </div>
			  <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <div class="subheader">Kunjungan Bulan Ini</div>
                    <div class="h3 m-0 kunjungan_bulan">--</div>
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
              
             </div>
			  
            <div class="card mb-4">
               <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <h3 class="card-title">Grafik Kunjungan Hari</h3>
                      <div class="ms-auto">
                        <div class="dropdown">
                          <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            
                            <a class="dropdown-item active" href="#">Last 7 days</a>
                             
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="chart-kunjungan-1"></div>
                  </div>
                </div>
              </div>
			</div>
			<div class="card">			
			  <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <h3 class="card-title">Grafik Kunjungan Per Kecamatan</h3>
                      <div class="ms-auto">
                        
                      </div>
                    </div>
                    <div id="chart-kunjungan-2"></div>
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
    <script src="{{ asset('assets/administrator/dist/libs/apexcharts/dist/apexcharts.min118a.js?1684106145') }}" defer></script>
    
    <!-- Tabler Core -->
	
 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js"></script>
	<script>
 
	 
	var id = window.location.pathname.split('/').pop();
	
	
	 
	
	function loadData(){
		
		
		$.ajax({
					data: {},
					url: BaseUrl+"/api/v1/baduta/report",
                    crossDomain: false,
                   
                    method: 'GET',
                    complete: function(response){ 		
                        if(response.status == 200){
							 $(".kunjungan_terakhir").html(response.responseJSON.data.attribut.kunjungan_terakhir);
							 $(".total_kunjungan").html(response.responseJSON.data.attribut.total_kunjungan);
							 $(".kunjungan_bulan").html(response.responseJSON.data.attribut.kunjungan_bulan);
							 
							 loadReport1(response.responseJSON.data.report1)
							 loadReport2(response.responseJSON.data.report2)
							 
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
<script>
      // @formatter:off
    function loadReport1(data){
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-kunjungan-1'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 288,
      			parentHeightOffset: 0,
      			toolbar: {
      				show: false,
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		fill: {
      			opacity: 1,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "straight",
      		},
      		series: [data.series],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			padding: {
      				top: -20,
      				right: 0,
      				left: -4,
      				bottom: -4
      			},
      			strokeDashArray: 4,
      			xaxis: {
      				lines: {
      					show: true
      				}
      			},
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			type: 'datetime',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: data.label,
      		 
      		legend: {
      			show: true,
      			position: 'bottom',
      			offsetY: 12,
      			markers: {
      				width: 10,
      				height: 10,
      				radius: 100,
      			},
      			itemMargin: {
      				horizontal: 8,
      				vertical: 8
      			},
      		},
      	})).render();
      };
      // @formatter:on
	  
	  function loadReport2(data){
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-kunjungan-2'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 288,
      			parentHeightOffset: 0,
      			toolbar: {
      				show: false,
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		fill: {
      			opacity: 1,
      		},
      		stroke: {
      			width: 2,
      			lineCap: "round",
      			curve: "straight",
      		},
      		series: [data.series],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			padding: {
      				top: -20,
      				right: 0,
      				left: -4,
      				bottom: -4
      			},
      			strokeDashArray: 4,
      			xaxis: {
      				lines: {
      					show: true
      				}
      			},
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			 
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: data.label,
      		 
      		legend: {
      			show: true,
      			position: 'bottom',
      			offsetY: 12,
      			markers: {
      				width: 10,
      				height: 10,
      				radius: 100,
      			},
      			itemMargin: {
      				horizontal: 8,
      				vertical: 8
      			},
      		},
      	})).render();
      };
    </script>

@endsection