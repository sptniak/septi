<div class="container">
	<div class="row-fluid">
		<div class="span8">
			<h4>Akun Saya</h4>
					
				<div id="tabs-wrapper" class="clear-block">
					<h3 class="with-tabs"><?php print_r($_SESSION['fullname']); ?></h3>
					<?php foreach ($user as $key) {?>
					<a href="<?php echo base_url('/dashboard/edit/'.$key->username) ?>">Edit</a>
				</div>		  					  					  					  	
						  					  		
				  <h3>Profil</h3><hr>

				<dl>
				  	<dt class="profile-profile_nama_lengkap">Nama Lengkap</dt>
					<dd class="profile-profile_nama_lengkap"><?php echo $key->username; ?></dd>
					<dt class="profile-profile_tanggal_lahir">Tanggal Lahir</dt>
					<dd class="profile-profile_tanggal_lahir"><?php echo $key->tgl.'/'.$key->bln.'/'.$key->tahun; ?></dd>
					<dt class="profile-profile_kota">Kota Domisili</dt>
					<dd class="profile-profile_kota"><?php echo $key->kota; ?></dd>
					<dt class="profile-profile_provinsi">Provinsi</dt>
					<dd class="profile-profile_provinsi"><?php echo $key->province; ?></dd>
					<dt class="profile-profile_no_handphone">No Handphone</dt>
					<dd class="profile-profile_no_handphone"><?php echo $key->no_phone; ?></dd>
					<dt class="profile-profile_pekerjaan">Pekerjaan</dt>
					<dd class="profile-profile_pekerjaan"><?php echo $key->pekerjaan; ?></dd>
					<?php } ?>
				</dl>
		</div>
	</div>
</div>