<div class="col-sm-10">
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
			<table class="table">
				<thead>
					<tr>
						<th>Tingkat</th>
						<th>Institusi</th>
						<th>Jurusan</th>
						<th>Tahun Masuk</th>
						<th>Tahun Keluar</th>
						<th>IPK</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<form action="<?php echo site_url("user/update_data_pendidikan"); ?>" method="post">
					<tr>
						<td class="col-xs-2"><select name="tingkat" class="form-control">
								<option value="D3">D3</option>
								<option value="S1">S1</option>
								<option value="S2">S2</option>
							</select>
						</td>
						<td> <input type="text" class="form-control" name="nama_sekolah" value="<?php echo ( isset( $pendidikan->institusi ) ? $pendidikan->institusi : "" ) ?>" /> </td>
						<td> <input type="text" class="form-control" name="jurusan" value="<?php echo ( isset( $pendidikan->jurusan ) ? $pendidikan->jurusan : "" ) ?>"/> </td>
						<td> <input type="text" class="form-control" name="tahun_masuk" value="<?php echo ( isset( $pendidikan->tahun_masuk ) ? $pendidikan->tahun_masuk : "" ) ?>"/> </td>
						<td> <input type="text" class="form-control" name="tahun_keluar" value="<?php echo ( isset( $pendidikan->tahun_ijazah ) ? $pendidikan->tahun_ijazah : "" ) ?>" /> </td>
						<td class="col-xs-1"> <input type="text" class="form-control" name="ipk" value="<?php echo ( isset( $pendidikan->IPK ) ? $pendidikan->IPK : "" ) ?>" /> </td>
						<td> <button type="submit" id="tambah" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button></td>
					</tr>
				</form>
				</tbody>
			</table>
		</div>
	</div>
</div>