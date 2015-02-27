<div class="col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Formulir Akun</h5>
		</div>
		<div class="panel-body">
			<?php if( $this->session->flashdata('error') != "" ){ ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Warning!</strong> <?php echo $this->session->flashdata('error'); ?>
			</div>
			<?php } 
			if( $this->session->flashdata('success') != '' ){ ?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo $this->session->flashdata('success') ?>
			</div>
			<?php }?>
			<form action="<?php echo site_url('karir/proses_daftar'); ?>" method="post">
				<div class="form-group">
					<label for="email">Nama :</label>
					<input class="form-control" type="text" name="nama" value="<?php echo $this->session->flashdata('nama'); ?>"/>
				</div>
				<div class="form-group">
					<label for="email">Email :</label>
					<input class="form-control" type="text" name="email" value="<?php echo $this->session->flashdata('email'); ?>" />
				</div>
				<div class="form-group">
					<label for="password">Password :</label>
					<input class="form-control" type="password" name="password" />
				</div>
				<div class="form-group">
					<label for="password">Konfirmasi Password :</label>
					<input class="form-control" type="password" name="konfirmasi_password" />
				</div>
		</div>
		<div class="panel-footer">
			<div class="form-action">
				<input type="submit" class="btn btn-primary" name="submit" value="Daftar"/>
			</div>
		</div>
	</div>
</div>