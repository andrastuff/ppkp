<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<!-- profile box -->
				<div class="profileBox pt-2 pb-2">
					<div class="image-wrapper">
					<?php if( $data['user']->avatar) { ?>
						<img src="{{ $data['user']->avatar }}" alt="image" class="imaged  w36">
					<?php }else{ ?>
						<img src="{{ asset('assets/tpk/img/sample/avatar/avatar1.jpg') }}" alt="image" class="imaged  w36">
					<?php } ?>
					</div>
					<div class="in">
						<strong>{{ $data['user']->nama }}</strong>
						<div class="text-muted">{{ $data['user']->wilayah }}</div>
					</div>
					<a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
						<ion-icon name="close-outline"></ion-icon>
					</a>
				</div>
				<!-- * profile box -->
				<!-- balance -->
				<div class="sidebar-balance">
					 
				</div>
				<!-- * balance -->

				

				<!-- menu -->
				<div class="listview-title mt-1">Menu</div>
				<ul class="listview flush transparent no-line image-listview">
					
					<li>
						<a href="{{ url('tpk/catin') }}" class="item">
							<div class="icon-box bg-primary">
								<ion-icon name="document-text-outline"></ion-icon>
							</div>
							<div class="in">
								Calon Pengantin
							</div>
						</a>
					</li>
					<li>
						<a href="{{ url('tpk/bumil') }}" class="item">
							<div class="icon-box bg-primary">
								<ion-icon name="document-text-outline"></ion-icon>
							</div>
							<div class="in">
								Ibu Hamil
							</div>
						</a>
					</li>
					<li>
						<a href="{{ url('tpk/pasca_persalinan') }}" class="item">
							<div class="icon-box bg-primary">
								<ion-icon name="document-text-outline"></ion-icon>
							</div>
							<div class="in">
								Pasca Persalinan
							</div>
						</a>
					</li>
					<li>
						<a href="{{ url('tpk/baduta') }}" class="item">
							<div class="icon-box bg-primary">
								<ion-icon name="document-text-outline"></ion-icon>
							</div>
							<div class="in">
								Baduta
							</div>
						</a>
					</li>
					<li>
						<a href="{{ url('tpk/report') }}" class="item">
							<div class="icon-box bg-primary">
								<ion-icon name="pie-chart-outline"></ion-icon>
							</div>
							<div class="in">
								Laporan
								<span class="badge badge-primary">4</span>
							</div>
						</a>
					</li>
				</ul>
				<!-- * menu -->

				<!-- others -->
				<div class="listview-title mt-1">Others</div>
				<ul class="listview flush transparent no-line image-listview">
					<li>
						<a href="{{ url('tpk/ganti_password') }}" class="item">
							<div class="icon-box bg-primary">
								<ion-icon name="settings-outline"></ion-icon>
							</div>
							<div class="in">
								Pengaturan Akun
							</div>
						</a>
					</li>
					 
					<li>
						<a id="logout" href="javascript:void(0);" class="item">
							<div class="icon-box bg-primary">
								<ion-icon name="log-out-outline"></ion-icon>
							</div>
							<div class="in">
								Log out
							</div>
						</a>
					</li>


				</ul>
				<!-- * others -->
 

			</div>
		</div>
	</div>
</div>
<script>
$('#logout').click(() => {
        
        $.ajax({
            url: BaseUrl+'/api/tpk/signout',
            method: 'POST',
            complete: (response) => {
                if(response.status == 200) {
					window.location.replace('{{ url("/signout") }}');
                    //window.location.replace(BaseUrl+'/');
                }
            }
        });
    });
</script>
        