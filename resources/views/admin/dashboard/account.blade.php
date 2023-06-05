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
                  Dashboard
                </div>
                <h2 class="page-title">
                  <?php echo $data['title']; ?>
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Tambah Pengguna
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
            <div class="card">
              <div class="row g-0">
                <div class="col-3 d-none d-md-block border-end">
                  <div class="card-body">
                    <h4 class="subheader">GLOBAL settings</h4>
                    <div class="list-group list-group-transparent">
                      <a href="{{ url('/administrator/setting')}}" class="list-group-item list-group-item-action d-flex align-items-center ">Aplikasi</a>
                      <a href="{{ url('/administrator/setting/account')}}" class="list-group-item list-group-item-action d-flex align-items-center active">Akun Saya</a>
                      <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Pengguna</a>
                      
                    </div>
                    <h4 class="subheader mt-4">Experience</h4>
                    <div class="list-group list-group-transparent">
                      <a href="#" class="list-group-item list-group-item-action">Give Feedback</a>
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column">
                  <div class="card-body">
				  <form role="form" id="form-account" enctype="multipart/form-data">
				  <input name="id" type="hidden" class="form-control" value="">
				   
                    <h2 class="mb-4">ACCOUNT INFORMATION</h2>
                    <h3 class="card-title"></h3>
                    
                     
                    <div class="row g-3">
                      <div class="col-md-8">
                        <div class="form-label">Nama</div>
                        <input name="nama" type="text" class="form-control" value="">
                      </div>
                      <div class="col-md-8">
                        <div class="form-label">Alamat</div>
                        <textarea name="alamat" type="text" class="form-control" value=""></textarea>
                      </div>
                      <div class="col-md-5">
                        <div class="form-label">Kontak Telp.</div>
                        <input name="telp" type="text" class="form-control" value="">
                      </div>
					   
                    </div>
                    <h3 class="card-title mt-4">Email</h3>
                    <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.</p>
                    <div>
                      <div class="row g-3">
                        <div class="col-auto">
                          <input name="email" type="text" class="form-control w-auto" disabled>
                        </div>
                        
                      </div>
                    </div>
					<h3></h3>
					<h3>Password</h3>
					<p class="card-subtitle">Blank the field if you don't want to update,be carefully.</p>
                    <div class="row g-3">
                      <div class="col-auto">
                         
                        <input name="password" type="text" class="form-control" value="">
                      </div>
					  
					</div>
					<h3></h3>
                  <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                      
                      <button type="submit" class="btn btn-primary">
                        Simpan Perubahan</button>
                      </a>
                    </div>
                  </div>
				  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
		
        @include('layouts.admin.footer')
		
      </div>
    </div>
     
     <!-- Libs JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js"></script>
	<script>
 
	function loadView(){
		
		$.ajax({
					data: "",
					url: BaseUrl+"/api/v1/administrator/account",
					crossDomain: false,
					method: 'GET',
					complete: function(response){ 				
					if(response.status == 200){
								
								$('input[name=id]').val(response.responseJSON.data.id);
								$('input[name=nama]').val(response.responseJSON.data.nama);
								$('input[name=telp]').val(response.responseJSON.data.telp);
								$('input[name=email]').val(response.responseJSON.data.email);
								 
								$('textarea[name=alamat]').val(response.responseJSON.data.alamat);
								 
								 
						}else if(response.status == 401){
							e('info','401 server conection error');
						}
					},
				dataType:'json'
				})
	
	};
	loadView();
	
	$("#form-account").submit(function(event) {
		event.preventDefault();
		  
		 swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
				buttons: true,
                dangerMode: true,
				
            }).then((hapus) => {
				if(hapus){
					
				event.preventDefault();
				var form = $('#form-account')[0]; 
				var data = new FormData(form);

				$(".btn-primary").prop("disabled", true);
				var id = $("input[name=id]").val();
				$.ajax({
							data: data,
							url: BaseUrl+"/api/v1/administrator/account_update",
							processData: false,
							contentType: false,
							cache: false,
							type: 'POST',
							complete: function(response){                
							  if(response.status == 201){
									swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message,
										type:'success',
									}).then((value) => { 
										$(".btn-primary").prop("disabled", false); 
										loadView(); 
									});
							  }else{
								  $(".btn-primary").prop("disabled", false);
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
									}).then((value) => { 
										$(".btn-primary").prop("disabled", false); 
										loadView(); 
									});
									 
							  }
							},
							dataType:'json'
				})
				} else {
					swal("Your imaginary file is safe!", {
					  buttons: false,
					  timer: 500,
					});
				}
				 
            });
			
    });
    </script>
	
@endsection