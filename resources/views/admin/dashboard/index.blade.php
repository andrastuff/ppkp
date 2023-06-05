@extends('layouts.admin.app')
@section('content')
 
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
                  Dashboard
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  
                  <a href="{{ url('administrator/data_tpk/create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Tambah Petugas TPK
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon">
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
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">DATA CATIN</div>
                      <div class="ms-auto lh-1">
                        <div class="dropdown">
                          <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="{{ url('/administrator/data_catin/grafik') }}">Tampilkan Grafik</a>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="h1 mb-2 t7-catin">--</div>
                     
                  </div>
                </div>
              </div>
			  <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">DATA BUMIL</div>
                      <div class="ms-auto lh-1">
                        <div class="dropdown">
                          <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="{{ url('/administrator/data_bumil/grafik') }}">Tampilkan Grafik</a>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="h1 mb-2 t7-bumil">--</div>
                     
                  </div>
                </div>
              </div>
			  <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">PASCA PERSALINAN</div>
                      <div class="ms-auto lh-1">
                        <div class="dropdown">
                          <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="{{ url('/administrator/data_pasca_persalinan/grafik') }}">Tampilkan Grafik</a>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="h1 mb-2 t7-pasca-persalinan">--</div>
                     
                  </div>
                </div>
              </div>
			  <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">DATA BADUTA</div>
                      <div class="ms-auto lh-1">
                        <div class="dropdown">
                          <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="{{ url('/administrator/data_baduta/grafik') }}">Tampilkan Grafik</a>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="h1 mb-2 t7-baduta">--</div>
                     
                  </div>
                </div>
              </div>
               <div class="col-12">
                <div class="row row-cards">
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1"></path><circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle></svg>                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium t-catin">
                              --
                            </div>
                            <div class="text-muted">
                              Catin Terinput
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1"></path><circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle></svg>                            </span>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium t-bumil">
                              --
                            </div>
                            <div class="text-muted">
                              Bumil Terinput
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1"></path><circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle></svg>                            </span>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium t-pasca-persalinan">
                              --
                            </div>
                            <div class="text-muted">
                              Pasca Persalinan Terinput
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1"></path><circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle></svg>                            </span>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium t-baduta">
                              --
                            </div>
                            <div class="text-muted">
                              Baduta Terinput
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			  <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <h3 class="card-title">Grafik Kunjungan Harian</h3>
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
                      <div class="col-11">
                        <h3 class="h1"><?php echo $data['judul']; ?></h3>
                        <div class="markdown text-muted row">
						
                         <div class="col-10">                          Sebuah inovasi
untuk menekan angka stunting yang ditujukan kepada
calon pengantin, pasangan usia subur, ibu hamil,
ibu pasca persalinan, dan balita.
                        </div><div class="col"><img src="{{ asset('/assets/administrator/tb.png') }}" width="60"  alt="Tabler" ></div>
                        </div>
                        <div class="mt-3">
                          <a href="{{ url('/administrator/setting') }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 8h4v4h-4z"></path><path d="M6 4l0 4"></path><path d="M6 12l0 8"></path><path d="M10 14h4v4h-4z"></path><path d="M12 4l0 10"></path><path d="M12 18l0 2"></path><path d="M16 5h4v4h-4z"></path><path d="M18 4l0 1"></path><path d="M18 9l0 11"></path></svg> Pengaturan</a>
                        </div>
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
    
     <!-- Libs JS -->
    <script src="{{ asset('assets/administrator/dist/libs/apexcharts/dist/apexcharts.min118a.js?1684106145') }}" defer></script>
    
    <!-- Tabler Core -->
	
 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js"></script>
	<script>
 
	 
	var id = window.location.pathname.split('/').pop();
	
	
	 
	
	function loadData(){
		
		
		$.ajax({
					data: {},
					url: BaseUrl+"/api/v1/meta/report",
                    crossDomain: false,
                   
                    method: 'GET',
                    complete: function(response){ 		
                        if(response.status == 200){
							  $(".t-bumil").html(response.responseJSON.data.attribut.t_bumil);
							  $(".t7-bumil").html(response.responseJSON.data.attribut.t7_bumil);
							  $(".t-catin").html(response.responseJSON.data.attribut.t_catin);
							  $(".t7-catin").html(response.responseJSON.data.attribut.t7_catin);
							  $(".t-pasca-persalinan").html(response.responseJSON.data.attribut.t_pasca_persalinan);
							  $(".t7-pasca-persalinan").html(response.responseJSON.data.attribut.t7_pasca_persalinan);
							  $(".t-baduta").html(response.responseJSON.data.attribut.t_baduta);
							  $(".t7-baduta").html(response.responseJSON.data.attribut.t7_baduta);
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
      		series: data.series,
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
      		series: data.series,
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