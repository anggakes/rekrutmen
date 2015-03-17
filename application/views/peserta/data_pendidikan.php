<div class="col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Data Pendidikan Terakhir</h5>
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
<?php 
if(count($pendidikan)>0){
?>
<div id='edit' style='display:none'>
			<form class='form-horizontal' action="<?php echo site_url("user/update_data_pendidikan"); ?>" method="post">
				<div class='form-group'>
					<label class='control-label col-sm-2'>Tingkatan <span class="danger "></span></label>
					<div class='col-sm-8'>
					<select name="tingkat" class=" form-control">
						<?php 
							$tingkatan = ["D3","S1","S2","S3"];

							foreach ($tingkatan as $value) {
								$selected=(isset( $pendidikan->pendidikan) and $pendidikan->pendidikan == $value ) ? "selected" : "";
								echo "<option value='$value' $selected >$value</option>";
							}
						?>
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Institusi <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="nama_sekolah" value="<?php echo ( isset( $pendidikan->institusi ) ? $pendidikan->institusi : "" ) ?>" />
				</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Jurusan <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="jurusan" value="<?php echo ( isset( $pendidikan->jurusan ) ? $pendidikan->jurusan : "" ) ?>"/> 
				</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Tahun Masuk <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="tahun_masuk" value="<?php echo ( isset( $pendidikan->tahun_masuk ) ? $pendidikan->tahun_masuk : "" ) ?>"/> 
				</div>
				<div class='col-sm-2'>(yyyy-mm-dd)</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Tahun keluar <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="tahun_keluar" value="<?php echo ( isset( $pendidikan->tahun_ijazah ) ? $pendidikan->tahun_ijazah : "" ) ?>" /> 
				</div>				<div class='col-sm-2'>(yyyy-mm-dd)</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Ipk <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="ipk" value="<?php echo ( isset( $pendidikan->IPK ) ? $pendidikan->IPK : "" ) ?>" />
				</div>
				</div>
				
		<center>
		<input type="submit" name="submit" value="SIMPAN" class="btn btn-success"/>
		</center>		
				</form>
<div class='clearfix'></div>
</div> <!-- End Edit -->

<div id='tampil' >			
					
			<table class='table'>
					<tr>
					<td><b>Tingkatan </b></td>
					<td>
					
						<?php 
						echo $pendidikan->pendidikan;	
						?>
					
					</td>
				</tr>
				<tr>
					<td><b>Institusi </b></td>
					<td>
					
						<?php 
						echo $pendidikan->institusi;	
						?>
					
					</td>
				</tr>
				<tr>
					<td><b>Jurusan </b></td>
					<td>
					
						<?php 
						echo $pendidikan->jurusan;	
						?>
					
					</td>
				</tr>
				<tr>
					<td><b>Tahun Masuk / Keluar </b></td>
					<td>
					
						<?php 
						echo $pendidikan->tahun_masuk." / ".$pendidikan->tahun_ijazah;	
						?>
					
					</td>
				</tr>
				
				<tr>
					<td><b>Ipk </b></td>
					<td>
					
						<?php 
						echo $pendidikan->IPK;	
						?>
					
					</td>
				</tr>
			</table>

<div class='clearfix'></div>
</div> <!-- End Edit -->


<hr>
 <a href="#" id='tmbl_edit' class='btn btn-primary pull-right' >Edit Data Pendidikan</a>
    
		<div class='clearfix'></div>
<br>	
<?php } else{ ?>
<form class='form-horizontal' action="<?php echo site_url("user/update_data_pendidikan"); ?>" method="post">
				<div class='form-group'>
					<label class='control-label col-sm-2'>Tingkatan <span class="danger "></span></label>
					<div class='col-sm-8'>
					<select name="tingkat" class=" form-control">
						<?php 
							$tingkatan = ["D3","S1","S2","S3"];

							foreach ($tingkatan as $value) {
								$selected=(isset( $pendidikan->pendidikan) and $pendidikan->pendidikan == $value ) ? "selected" : "";
								echo "<option value='$value' $selected >$value</option>";
							}
						?>
					</select>
					</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Institusi <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="nama_sekolah" value="<?php echo ( isset( $pendidikan->institusi ) ? $pendidikan->institusi : "" ) ?>" />
				</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Jurusan <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="jurusan" value="<?php echo ( isset( $pendidikan->jurusan ) ? $pendidikan->jurusan : "" ) ?>"/> 
				</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Tahun Masuk <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="tahun_masuk" value="<?php echo ( isset( $pendidikan->tahun_masuk ) ? $pendidikan->tahun_masuk : "" ) ?>"/> 
				</div>
				<div class='col-sm-2'>(yyyy-mm-dd)</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Tahun keluar <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="tahun_keluar" value="<?php echo ( isset( $pendidikan->tahun_ijazah ) ? $pendidikan->tahun_ijazah : "" ) ?>" /> 
				</div>				<div class='col-sm-2'>(yyyy-mm-dd)</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Ipk <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="ipk" value="<?php echo ( isset( $pendidikan->IPK ) ? $pendidikan->IPK : "" ) ?>" />
				</div>
				</div>
				
		<center>
		<input type="submit" name="submit" value="SIMPAN" class="btn btn-success"/>
		</center>		
				</form>
<div class='clearfix'></div>
<?php } ?>

</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("[name='tahun_masuk']").datepicker({
		'format':'yyyy-mm-dd'
	});
	$("[name='tahun_keluar']").datepicker({
		'format':'yyyy-mm-dd'
	});

	$("#tmbl_edit").click(function(e){
		$("#edit").slideToggle();
		$("#tampil").slideToggle();
	});

});
</script>