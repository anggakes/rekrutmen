				<div class="box span12">
					<div class="box-header well" data-original-title>
						
					</div>
					<div class="box-content">
					<h2>Data Pelamar</h2><hr>
						
                    <div class='clearfix'></div>
                    <a href='#' onClick="window.open('<?php echo site_url("administrasi/cetak_pelamar/".$id_lowongan) ?>', '_blank');" class='pull-right btn btn-danger'><i class='icon-print icon-white'></i> cetak</a><br><br>

					<table class='table table-bordered' width='98%' id='datatables'>
						<thead>
						<tr>
							<td>No Peserta</td>
							<td>Nama</td>
							<td>Tanggal Lahir</td>
							<td>Aksi</td>
						</tr>
						</thead>
						<tbody>
							<?php
$i=1;
foreach ($peserta as $l) {
	echo "<tr>";
	echo "
		<td>".$l->no_peserta."</td>
		<td>".$l->nama_peserta."</td>
		<td>".$l->tgl_lahir."</td>
		<td><a href='".site_url("administrasi/detail_pelamar/".$l->no_peserta."/".$id_lowongan)."'>lihat</a> - 
		<a href='#' onClick=\"window.open('".site_url("administrasi/cetak_detail_pelamar/".$l->no_peserta) ."', '_blank');\">cetak</a>
		</td>	"; 
	echo "</tr>";
	$i++;
}
		?>
						</tbody>


					</table>

<br><br>
					</div>
				</div><!--/span-->

<script type="text/javascript">
$(document).ready(function(){

	$("#datatables").dataTable();

});
</script>