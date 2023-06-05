@extends('layouts.admin.app')
@section('content')

	
	<div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
          <div class="col-lg">
            <div class="container-tight">
              <div class="text-center mb-4">
                <a href="error-404.html" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/administrator/tb.png') }}" height="70" alt=""></a>
              </div>
              <div class="card card-md">
                <div class="card-body">
                  <h2 class="h2 text-center mb-4">Login administrator</h2>
				  <div id="alert" class="alert small text-center alert-danger d-none">Pastikan username dan password yang anda masukan benar !</div>
                  <form id="formSignin" autocomplete="off" novalidate>
                    <div class="mb-3">
                      <label class="form-label">Email address</label>
                      <input name="email" type="text" class="form-control" placeholder="gunakan e-mail atau no telp" autocomplete="off">
                    </div>
                    <div class="mb-2">
                      <label class="form-label">
                        Password
                        <span class="form-label-description">
                          <a href="forgot-password.html">I forgot password</a>
                        </span>
                      </label>
                      <div class="input-group input-group-flat">
                        <input name="password" type="password" class="form-control"  placeholder="Your password"  autocomplete="off">
                        <span class="input-group-text">
                          <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                          </a>
                        </span>
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="form-check">
                        <input type="checkbox" class="form-check-input"/>
                        <span class="form-check-label">Remember me on this device</span>
                      </label>
                    </div>
                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>
                  </form>
                </div>
                 
              </div>
              
            </div>
          </div>
          <div class="col-lg d-none d-lg-block">
            <img src="{{ asset('assets/administrator/static/illustrations/undraw_secure_login_pdn4.svg') }}" height="300" class="d-block mx-auto" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
 
<script>
 

let data = getUrlVars();
let message = decodeURIComponent(data.message);
if(message != 'undefined'){
	 
	$('#alert').removeClass('d-none');
	$('#alert').html(message);
}
 
 $('#formSignin').submit(function(event) {
    event.preventDefault();
     
    $('#btn-login').addClass('d-none');
    const form = $(this)[0];
    const data = new FormData(form);

    $.ajax({
        url: BaseUrl+'/api/auth/signin',
        data: data,
        method: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        complete: (response) => {
          if(response.status == 200) {
            window.location.replace(BaseUrl+'/set_cookie_admin?token='+response.responseJSON.access_token);
          }else if(response.status == 203) {
			$('#alert').removeClass('d-none');
			$('#alert').html(response.responseJSON.message);
			 
            $('#btn-login').removeClass('d-none');			
		  }else {
            $('#alert').removeClass('d-none');
            $('#alert').html('Pastikan username dan password yang anda masukan benar !');
            
            $('#btn-login').removeClass('d-none');
          }
        }
    });
  });
 
</script>
@endsection

