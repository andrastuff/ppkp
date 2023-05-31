@extends('layouts.tpk.app')
@section('content')
         <!-- App Capsule -->
    <div id="appCapsule">
	 
        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            <h4>Silahkan Masukan Akses Login Anda</h4>
        </div>
        <div class="section mb-5 p-2">
<div id="alert" class="alert small text-center alert-danger d-none">Pastikan username dan password yang anda masukan benar !</div>
            <form id="formSignin" novalidate="">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail / No Telp</label>
                                <input name="email" type="email" class="form-control" id="email1" placeholder="e-mail / no telp">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input name="password" type="password" class="form-control" id="password1" autocomplete="off"
                                    placeholder="Your password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-links mt-2">
                    <div>
                         
                    </div>
                    <div><a href="{{ url('/lupa-password') }}" class="text-muted">Forgot Password?</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button id="btn-login" type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->
 
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
        url: BaseUrl+'/api/tpk/signin',
        data: data,
        method: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        complete: (response) => {
          if(response.status == 200) {
            window.location.replace(BaseUrl+'/set_cookie?token='+response.responseJSON.access_token);
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

