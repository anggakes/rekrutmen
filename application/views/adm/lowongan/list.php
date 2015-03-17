				<div class="box span12">
					<div class="box-header well" data-original-title>
						
					</div>
					<div class="box-content">
					<h2>Data Lowongan Pekerjaan</h2><hr>
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
<!-- Pesan Sukses -->
					
 <a href="#" id='input_barang' class='btn btn-info pull-right' data-toggle="modal" data-target="#modal_tambah"> Lowongan Baru </a>

                    <div class='clearfix'></div><br>

					<table width='99%' class='table table-bordered' id='datatables'>
						<thead>
						<tr>
							<td>Nama</td>
							<td>Kode</td>
							<td>Tanggal Berakhir</td>
							<td>Hasil dan Alternatif</td>
							<td>Pelamar</td>
							<td>Aksi</td>
						</tr>
						</thead>
						<tbody>
							<?php
foreach ($lowongan as $l) {
	$a = new DateTime($l->berakhir);
	$b= new DateTime(date("Y-m-d"));
	$label = ($a<$b) ? "label-danger" : "label-success" ;
	echo "<tr>";
	echo "
		<td>".$l->nama."</td>
		<td>".$l->kode_lowongan."</td>
		<td><span class='label $label'>".ubah_tanggal($l->berakhir)."</span></td>
		<td style='text-align:center'><a href='".site_url("administrasi/nilai/$l->id")."' class='btn btn-danger'>Hitung AHP</a></td>
		<td> <a href='".site_url("administrasi/pelamar/$l->id")."' class=''>".$l->pelamar." Pelamar</a></td>
		
		<td>
	<a class='edit' href='".site_url('administrasi/lihat_kriteria/'.$l->id)
	."'
	 data-toggle='modal' data-target='#modal_edit'
	 data-nama='".$l->nama."' data-deskripsi='".$l->deskripsi."' data-berakhir='".$l->berakhir."' data-kode_lowongan ='".$l->kode_lowongan."' data-id='".$l->id."'
	 data-min_usia='".$l->min_usia."' data-min_pendidikan='".$l->min_pendidikan."' data-min_ipk='".$l->min_ipk."'
	> 
	
		Edit                                           
	</a> - 
	<a class=' ' href='".site_url('administrasi/lowongan_hapus/'.$l->id)."'
	onClick='return confirm(\" yakin dihapus ? \")'
	>
	 
										Hapus       
	</a>

		</td>
	"; 
	echo "</tr>";
}


							?>
						</tbody>


					</table>

<br><br>
					</div>
				</div><!--/span-->

<!-- Modal Tambah -->

<div class="modal hide fade" id="modal_tambah">
<form class='form-horizontal' method='post' action="<?php echo site_url('administrasi/lowongan_simpan'); ?>">	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Tambah Lowongan</h3>
	
</div>
			<div class="modal-body">

	<div class="control-group">
		<label class="control-label">Nama </label>
		<div class="controls">
			<input class="" type="text" name="nama" value="" placeholder="Nama Lowongan">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Kode Lowongan </label>
		<div class="controls">
			<input class="" type="text" name="kode_lowongan" value="" placeholder="Kode Lowongan">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Berakhir </label>
		<div class="controls">
			<input class="" type="text" name="berakhir" value="" placeholder="Akhir Pendaftaran">
		</div>
	</div>
	
	<div class="control-group">
								  <label class="control-label" for="textarea2">Keterangan</label>
								  <div class="controls">
									<textarea class="" name="deskripsi" id="textarea2" rows="3"></textarea>
								  </div>
								</div>
<div class="control-group">
		<label class="control-label">Minimal Ipk </label>
		<div class="controls">
			<input class="" type="text" name="min_ipk" step='any' value="" placeholder="Minimal IPK">
		</div>
	</div>
<div class="control-group">
		<label class="control-label">Minimal Usia </label>
		<div class="controls">
			<input class="" type="text" name="min_usia" value="" placeholder="Minimal Usia">
		</div>
	</div>
<div class="control-group">
		<label class="control-label">Minimal Pendidikan </label>
		<div class="controls">
			<select name='min_pendidikan'>
				<option value='D3'>D3</option>
				<option value='S1'>S1</option>
				<option value='S2'>S2</option>
				<option value='S3'>S3</option>
			</select>
		</div>
	</div>
			</div>
			<div class="modal-footer">
				<input type='submit' class='btn btn-primary' value='simpan'>
				<a href="#" class="btn" data-dismiss="modal">Tidak</a>
	
			</div>
			</form>
		</div>

<!--   modal EDIT ================  -->

<div class="modal hide fade" id="modal_edit">
<form class='form-horizontal' method='post' action="<?php echo site_url('administrasi/lowongan_edit'); ?>">	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Edit Lowongan</h3>
	
</div>
			<div class="modal-body">

	<div class="control-group">
		<label class="control-label">Nama </label>
		<div class="controls">
			<input class="" type="hidden" name="id" id="id_edit">
	
			<input class="" type="text" name="nama" value="" placeholder="Nama Lowongan" id='nama_edit' >
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Kode Lowongan </label>
		<div class="controls">
			<input class="" type="text" name="kode_lowongan" value="" placeholder="Kode Lowongan" id="kode_lowongan_edit">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Berakhir </label>
		<div class="controls">

			<input class="" type="text" name="berakhir" value="" placeholder="Akhir Pendaftaran" id="berakhir_edit">
		</div>
	</div>
	
	<div class="control-group">
								  <label class="control-label" for="textarea2">Keterangan</label>
								  <div class="controls">
									<textarea class="" name="deskripsi"  rows="3" id="deskripsi_edit"></textarea>
								  </div>
								</div>
	<div class="control-group">
		<label class="control-label">Minimal Ipk </label>
		<div class="controls">
			<input class="" type="number" name="min_ipk" step='any' value="" placeholder="Minimal IPK" id='min_ipk' >
		</div>
	</div>
<div class="control-group">
		<label class="control-label">Minimal Usia </label>
		<div class="controls">
			<input class="" type="number" step='any' name="min_usia" value="" placeholder="Minimal Usia" id='min_usia'>
		</div>
	</div>
<div class="control-group">
		<label class="control-label">Minimal Pendidikan </label>
		<div class="controls">
			<select name='min_pendidikan' id='min_pendidikan'>
				<option value='D3'>D3</option>
				<option value='S1'>S1</option>
				<option value='S2'>S2</option>
				<option value='S3'>S3</option>
			</select>
		</div>
	</div>


			</div>
			<div class="modal-footer">
				<input type='submit' class='btn btn-primary' value='simpan'>
				<a href="#" class="btn" data-dismiss="modal">Tidak</a>

	
			</div>
			</form>
		</div>


