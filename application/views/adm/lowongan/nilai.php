				<div class="box span12">
					<div class="box-header well" data-original-title>
						
					</div>
					<div class="box-content">
					<h2>Nilai <a href='<?php echo site_url('administrasi/tambah_nilai')?>' id='input_nilai' class='btn btn-info pull-right'> Input Nilai </a></h2><hr>
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
					

						
                    <div class='clearfix'></div><br>

					<table class='table table-bordered' id='datatables'>
						<thead>
						<tr>
							<td>Nama</td>
							<td>Kode</td>
							<td>Tanggal Lahir</td>
							<td>Aksi</td>
						</tr>
						</thead>
						<tbody>
							<?php
foreach ($peserta as $l) {
	echo "<tr>";
	echo "
		<td>".$l->no_peserta."</td>
		<td>".$l->nama_peserta."</td>
		<td>".$l->tgl_lahir."</td>
		<td><a href='#' id='hapus' class='btn btn-danger'><i class='icon icon-sign'></i> Hapus </a></td>
	"; 
	echo "</tr>";
}


							?>
						</tbody>


					</table>

<br><br>
					</div>
				</div><!--/span-->

<script type="text/javascript">
$(document).ready(function(){
	$('#datatables').DataTable();
	

});
</script>