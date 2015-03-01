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
					
 <a href="#" id='input_barang' class='btn btn-warning pull-right' data-toggle="modal" data-target="#modal_tambah"> Lowongan Baru </a>

                    <div class='clearfix'></div><br>

					<table class='table table-bordered' id='datatables'>
						<thead>
						<tr>
							<td>Nama</td>
							<td>Kode</td>
							<td>Tanggal Berakhir</td>
							<td>Aksi</td>
							<td>Hasil</td>
							<td>Input Nilai</td>
						</tr>
						</thead>
						<tbody>
							<?php
foreach ($lowongan as $l) {
	echo "<tr>";
	echo "
		<td>".$l->nama."</td>
		<td>".$l->kode_lowongan."</td>
		<td>".$l->berakhir."</td>
		<td></td>
		<td></td>
		<td></td>
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
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Tambah Lowongan</h3>
<form method='post' action="<?php echo site_url('administrasi/lowongan_simpan'); ?>">		
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
									<textarea class="" name="keterangan" id="textarea2" rows="3"></textarea>
								  </div>
								</div>

			</div>
			<div class="modal-footer">
				<input type='submit' class='btn btn-primary' value='simpan'>
				<a href="#" class="btn" data-dismiss="modal">Tidak</a>
</form>
	
			</div>
		</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#datatables').DataTable();
});
</script>