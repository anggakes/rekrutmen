<div class="col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Data Akun</h5>
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
			<table class="table">
				<tr>
					<td><b>Email</b></td>
					<td>:</td>
					<td><?php echo $peserta->email; ?>
						<div class="collapse" id="ubahEmail">
						  <div id="resultEmail">
						  </div>
						  <div class="well">
						    	<form id="ubahEmail" action="<?php echo site_url('user/ganti_email') ?>" method="post">
						    		<div class="form-group">
						    			<label>Email Baru</label>
						    			<input type="text" class="form-control" name="email_baru" />
						    		</div>
						    		<div class="form-group">
						    			<label>Password</label>
						    			<input type="password" class="form-control" name="password_email" />
						    		</div>						    		
						    		<div class="form-action">
						    			<input type="submit" value="Simpan" class="btn btn-primary" />
						    		</div>
						    	</form>
						  </div>
						</div>
					</td>
					<td><a data-toggle="collapse" href="#ubahEmail" aria-expanded="false" aria-controls="ubahEmail">Ubah</a></td>
				</tr>
				<tr>
					<td><b>Password</b></td>
					<td>:</td>
					<td>*******
						<div class="collapse" id="ubahPassword">
						  <div id="resultPassword">
						  </div>
						  <div class="well">
						    	<form id="ubahPassword" action="<?php echo site_url('user/ganti_password') ?>" method="post">
						    		<div class="form-group">
						    			<label>Password Lama</label>
						    			<input type="password" class="form-control" name="password_lama" />
						    		</div>
						    		<div class="form-group">
						    			<label>Password Baru</label>
						    			<input type="password" class="form-control" name="password_baru" />
						    		</div>						    		
						    		<div class="form-action">
						    			<input type="submit" value="Simpan" class="btn btn-primary" />
						    		</div>
						    	</form>
						  </div>
						</div>
					</td>
					<td><a data-toggle="collapse" href="#ubahPassword" aria-expanded="false" aria-controls="ubahPassword">Ubah</a></td>
				</tr>
			</table>
		</div>
	</div>
</div>