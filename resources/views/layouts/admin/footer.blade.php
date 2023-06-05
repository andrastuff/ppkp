<footer class="footer footer-transparent d-print-none">
<div class="container-xl">
<div class="row text-center align-items-center flex-row-reverse">
  <div class="col-lg-auto ms-lg-auto">
	<ul class="list-inline list-inline-dots mb-0">
	   
	  <li class="list-inline-item">
		<a href="#" target="_blank" class="link-secondary" rel="noopener">
		  
		  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
		  Andrastuff
		</a>
	  </li>
	</ul>
  </div>
  <div class="col-12 col-lg-auto mt-3 mt-lg-0">
	<ul class="list-inline list-inline-dots mb-0">
	  <li class="list-inline-item">
		{{ $data['footer'] }}
	  </li>
	  <li class="list-inline-item">
		<a href="#" class="link-secondary" rel="noopener">
		  v1.0
		</a>
	  </li>
	</ul>
  </div>
</div>
</div>
</footer>
<form id="logout" method="POST" action="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    @csrf
                  
</form>	
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

	function signOut() {
		swal("Are you sure?", {
                    buttons: {
                        cancel: "No, cancel!!",
                        catch: {
                            text: "Yes, save it!",
                            value: "yes",
                        },
                        
                    },
                })
                .then((value) => {
                  if(value == 'yes'){
                  	$('#logout').trigger('submit')
                  }
      });
		 
	
	}
</script>