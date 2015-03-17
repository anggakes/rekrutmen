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


<?php if($peserta->tgl_lahir != null and $peserta->tinggi_badan != null){ ?>
<div id='edit' style='display:none;margin-left:30px'>
<form action="<?php echo site_url('user/update_data_diri'); ?>" method="post">

			<div class='row'>
			<div class='col-sm-5'>	
				<div class="form-group">
					<label>Nama <span class="danger">*</span></label>

					<input name="nama_peserta" class="form-control" type="text" value="<?php echo $peserta->nama_peserta; ?>" />
				</div>
				<div class="form-group">
					<label>Tempat Lahir<span class="danger">*</span></label>
					<input name="tempat_lahir" class="form-control" type="text" value="<?php echo $peserta->tempat_lahir; ?>" />
				</div>
				<div class="form-group">
					<label>Tanggal Lahir<span class="danger">*</span></label><span class'label'> (yyyy-mm-dd)</span>
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
					<label>Tinggi Badan<span class="danger">* </span></label><span class'label'> Maks:165cm</span>
					<input name="tinggi_badan" class="form-control" type="number" value="<?php echo $peserta->tinggi_badan; ?>" max='165' /> 
				</div>
				<div class="form-group">
					<label>Berat Badan<span class="danger">*</span></label>
					<input readonly name="berat_badan" class="form-control" type="number" value="<?php echo $peserta->berat_badan; ?>" />
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
					<div class="input-group">
					<div class="input-group-addon"><input name="area_telp" style='width:60px' class="" type="text" value="<?php echo $peserta->area_telp; ?>" placeholder='kode' /></div>
					<input name="no_telp" class="form-control" type="text" value="<?php echo $peserta->no_telp; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label>No. HP<span class="danger">*</span></label>
					<div class="input-group">
						<div class="input-group-addon">+62</div>
					<input name="no_hp" class="form-control" type="text" value="<?php echo $peserta->no_hp; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label>Hobby</label>
					<textarea class="form-control" name="hobby"><?php echo $peserta->hobby; ?></textarea>
				</div>
		</div>	
	</div><!-- end row -->
<center>
<input style='margin:10px' type="submit" name="submit" value="SIMPAN" class="btn btn-success"/>
</center>		
				</form>
				<div class='clearfix'></div>
<!-- end FORM -->
</div>		
<!-- end edit -->		</div>

<div id='tampil' style='margin-left:30px'>
		<table class='table table-striped' id='datatables'>
					<tr><td style='font-weight:bold'>No Peserta</td><td>:</td><td>  <?php echo $peserta->no_peserta?></td></tr>
<tr><td style='font-weight:bold'>Nama </td><td>:</td><td>  <?php echo $peserta->nama_peserta?></td></tr>
<tr><td style='font-weight:bold'>Tempat, Tanggal Lahir</td><td>: </td><td> <?php echo $peserta->tempat_lahir.", ".$peserta->tgl_lahir ?></td></tr>
<tr><td style='font-weight:bold'>Jenis Kelamin</td><td>:</td><td>  <?php echo $peserta->jenis_kelamin?></td></tr>
<tr><td style='font-weight:bold'>Agama</td><td>:</td><td>  <?php echo $peserta->agama?></td></tr>
<tr><td style='font-weight:bold'>Alamat</td><td>: </td><td> <?php echo $peserta->alamat?></td></tr>
<tr><td style='font-weight:bold'>Kontak</td><td>: </td><td> <?php echo $peserta->area_telp.$peserta->no_telp." / +62".$peserta->no_hp?></td></tr>
<tr><td style='font-weight:bold'>Warga Negara</td><td>: </td><td> <?php echo $peserta->warga_negara?></td></tr>
<tr><td style='font-weight:bold'>Email</td><td>: </td><td> <?php echo $peserta->email?></td></tr>
<tr><td style='font-weight:bold'>Tinggi Badan</td><td>: </td><td> <?php echo $peserta->tinggi_badan?> cm</td></tr>
<tr><td style='font-weight:bold'>Berat Badan</td><td>: </td><td> <?php echo $peserta->berat_badan?> kg</td></tr>
<tr><td style='font-weight:bold'>Hobi</td><td>: </td><td> <?php echo $peserta->hobby?></td></tr>

					</table>
					<br>
					

</div><!-- End tampil-->
<hr>
 <a href="#" id='tmbl_edit' class='btn btn-primary pull-right' style='margin-right:5px'>Edit Data Diri</a>
    		<div class='clearfix'>
<br>	<br>
<?php } else{ ?>

<form action="<?php echo site_url('user/update_data_diri'); ?>" method="post">

			<div class='row'>
			<div class='col-sm-5'>	
				<div class="form-group">
					<label>Nama <span class="danger">*</span></label>

					<input name="nama_peserta" class="form-control" type="text" value="<?php echo $peserta->nama_peserta; ?>" />
				</div>
				<div class="form-group">
					<label>Tempat Lahir<span class="danger">*</span></label>
					<input name="tempat_lahir" class="form-control" type="text" value="<?php echo $peserta->tempat_lahir; ?>" />
				</div>
				<div class="form-group">
					<label>Tanggal Lahir<span class="danger">*</span></label><span class'label'> (yyyy-mm-dd)</span>
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
					<label>Tinggi Badan<span class="danger">* </span></label><span class'label'> Maks:165cm</span>
					<input name="tinggi_badan" class="form-control" type="number" value="<?php echo $peserta->tinggi_badan; ?>" max='165' /> 
				</div>
				<div class="form-group">
					<label>Berat Badan<span class="danger">*</span></label>
					<input readonly name="berat_badan" class="form-control" type="number" value="<?php echo $peserta->berat_badan; ?>" />
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
					<div class="input-group">
					<div class="input-group-addon"><input name="area_telp" style='width:60px' class="" type="text" value="<?php echo $peserta->area_telp; ?>" placeholder='kode' /></div>
					<input name="no_telp" class="form-control" type="text" value="<?php echo $peserta->no_telp; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label>No. HP<span class="danger">*</span></label>
					<div class="input-group">
						<div class="input-group-addon">+62</div>
					<input name="no_hp" class="form-control" type="text" value="<?php echo $peserta->no_hp; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label>Hobby</label>
					<textarea class="form-control" name="hobby"><?php echo $peserta->hobby; ?></textarea>
				</div>
		</div>	
	</div><!-- end row -->
<center>
<input style='margin:10px' type="submit" name="submit" value="SIMPAN" class="btn btn-success"/>
</center>		
				</form>
				<div class='clearfix'></div>
<!-- end FORM -->

<br>	
<?php } ?>
</div>
	</div> <!-- End panel -->

</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#tmbl_edit").click(function(e){
		$("#edit").slideToggle();
		$("#tampil").slideToggle();
	});

	$("[name='tinggi_badan']").change(function(){
		var tinggi = parseInt($("[name='tinggi_badan']").val());
		var proporsional = (tinggi - 100)*90/100;

		$("[name='berat_badan']").removeAttr('readonly');
		$("[name='berat_badan']").attr('max',proporsional+parseInt(proporsional*0.1));
		$("[name='berat_badan']").attr('min',proporsional-parseInt(proporsional*0.1));

	});


});
</script>
