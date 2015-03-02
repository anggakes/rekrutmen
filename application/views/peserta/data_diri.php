<div class="col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Formulir Identitas Diri</h5>
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
			<div class='row'>
			<div class='col-sm-5'>	
			<form action="<?php echo site_url('user/update_data_diri'); ?>" method="post">
				<div class="form-group">
					<label>Nama <span class="danger">*</span></label>

					<input name="nama_peserta" class="form-control" type="text" value="<?php echo $peserta->nama_peserta; ?>" />
				</div>
				<div class="form-group">
					<label>Tempat Lahir<span class="danger">*</span></label>
					<input name="tempat_lahir" class="form-control" type="text" value="<?php echo $peserta->tempat_lahir; ?>" />
				</div>
				<div class="form-group">
					<label>Tanggal Lahir<span class="danger">*</span></label>
					<input name="tanggal_lahir" class="datepicker form-control" type="text" value="<?php echo $peserta->tgl_lahir; ?>" />
				</div>
				<div class="form-group">
					<label>Jenis Kelamin<span class="danger">*</span></label>
					<select class="form-control" name="jenis_kelamin">
						<option value="">Pilih</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label>Agama<span class="danger">*</span></label>
					<select class="form-control" name="agama">
						<option value="">Pilih</option>
						<option value="Islam">Islam</option>
						<option value="Protestan">Protestan</option>
						<option value="Khatolik">Khatolik</option>
						<option value="Hindu">Hindu</option>
						<option value="Budha">Budha</option>
						<option value="Lainnya">Lainnya</option>
					</select>
				</div>
				
				
				<div class="form-group">
					<label>Tinggi Badan<span class="danger">*</span></label>
					<input name="tinggi_badan" class="form-control" type="text" value="<?php echo $peserta->tinggi_badan; ?>" />
				</div>
				<div class="form-group">
					<label>Berat Badan<span class="danger">*</span></label>
					<input name="berat_badan" class="form-control" type="text" value="<?php echo $peserta->berat_badan; ?>" />
				</div>
				
		</div>
		 <!-- end sisi kiri -->
		<div class='col-sm-5'>
			<div class="form-group">
					<label>Kewarganegaraan</label>
					<input name="warga_negara" class="form-control" type="text" value="<?php echo $peserta->warga_negara; ?>" />
				</div>
			<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat"><?php echo $peserta->alamat; ?></textarea>
				</div>
				<div class="form-group">
					<label>Kode POS</label>
					<input class="form-control" name="kode_pos" type="text" value="<?php echo $peserta->kode_pos; ?>" />
				</div>
				<div class="form-group">
					<label>No. Telp</label>
					<input name="no_telp" class="form-control" type="text" value="<?php echo $peserta->no_telp; ?>" />
				</div>
				<div class="form-group">
					<label>No. HP<span class="danger">*</span></label>
					<input name="no_hp" class="form-control" type="text" value="<?php echo $peserta->no_hp; ?>" />
				</div>
				<div class="form-group">
					<label>Hobby</label>
					<textarea class="form-control" name="hobby"><?php echo $peserta->hobby; ?></textarea>
				</div>
		</div>	
	</div></div><!-- end row -->
		<div class="panel-footer">
			<div class="form-action">
				<input type="submit" name="submit" value="SIMPAN" class="pull-right btn btn-primary"/>
				</form>
				<div class='clearfix'></div>
			</div>
		</div>
	</div>
</div>
