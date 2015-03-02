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
			<form class='form-horizontal' action="<?php echo site_url("user/update_data_pendidikan"); ?>" method="post">
				<div class='form-group'>
					<label class='control-label col-sm-2'>Tingkatan <span class="danger "></span></label>
					<div class='col-sm-8'>
					<select name="tingkat" class=" form-control">
						<?php 
							$tingkatan = ["D3","S1","S2"];

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
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Tahun keluar <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="tahun_keluar" value="<?php echo ( isset( $pendidikan->tahun_ijazah ) ? $pendidikan->tahun_ijazah : "" ) ?>" /> 
				</div>
				</div>
				<div class='form-group'>
					<label class='control-label col-sm-2'>Ipk <span class="danger "></span></label>
					<div class='col-sm-8'>
					<input type="text" class="form-control" name="ipk" value="<?php echo ( isset( $pendidikan->IPK ) ? $pendidikan->IPK : "" ) ?>" />
				</div>
				</div>
		</div>
		<div class="panel-footer">
			<div class="form-action">
				<input type="submit" name="submit" value="SIMPAN" class="pull-right btn btn-primary"/>
				</form>
				<div class='clearfix'></div>
			</div>
		</div>
	</div>
</div>