<div class="col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Formulir Pendaftaran Akun</h5>
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
			<form action="<?php echo site_url('karir/proses_daftar'); ?>" method="post" class='form-horizontal'>
				
				<div class="form-group">
					<label for="email" class='col-sm-2 control-label'>Email </label>
					<div class='col-sm-5'>
					<input class="form-control" type="text" name="email" value="<?php echo $this->session->flashdata('email'); ?>" />
					</div>
				</div>

				<div class="form-group">
					<label for="password" class='col-sm-2 control-label'>Password </label>
					<div class='col-sm-5' >
					<input class="form-control" type="password" name="password" />
					</div>
				</div>
				<div class="form-group">
					<label for="password" class='col-sm-2 control-label'>Konfirmasi Password </label>
					<div class='col-sm-5' >
					<input class="form-control" type="password" name="konfirmasi_password" />
					</div>
				</div>
		</div>
		<div class="panel-footer">
			<div class="form-action">
				<input type="submit" class="btn btn-primary pull-right" name="submit" value="Daftar"/>
			</div>
			<div class='clearfix'></div>
		</div>
	</div>
</div>