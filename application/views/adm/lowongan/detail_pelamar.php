				<div class="box span12">
					<div class="box-header well" data-original-title>
						
					</div>
					<div class="box-content">
					
						
                    <div class='clearfix'></div>
                    <a href='#' onClick="window.open('<?php echo site_url("administrasi/cetak_detail_pelamar/".$peserta->no_peserta) ?>', '_blank');" class='btn btn-danger pull-right'><i class='icon-print icon-white'></i> cetak</a><br><br>
		<h3>Biodata</h3><hr>
		<table class='table table-striped' style='width:80%;margin:15px' id='datatables'>
					<tr><td style='width:400px;font-weight:bold'>No Peserta</td><td>:</td><td>  <?php echo $peserta->no_peserta?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Nama </td><td>:</td><td>  <?php echo $peserta->nama_peserta?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Tempat, Tanggal Lahir</td><td>: </td><td> <?php echo $peserta->tempat_lahir.", ".$peserta->tgl_lahir ?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Jenis Kelamin</td><td>:</td><td>  <?php echo $peserta->jenis_kelamin?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Agama</td><td>:</td><td>  <?php echo $peserta->agama?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Alamat</td><td>: </td><td> <?php echo $peserta->alamat?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Kontak</td><td>: </td><td> <?php echo $peserta->area_telp.$peserta->no_telp." / +62".$peserta->no_hp?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Warga Negara</td><td>: </td><td> <?php echo $peserta->warga_negara?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Email</td><td>: </td><td> <?php echo $peserta->email?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Tinggi Badan</td><td>: </td><td> <?php echo $peserta->tinggi_badan?> cm</td></tr>
<tr><td style='width:400px;font-weight:bold'>Berat Badan</td><td>: </td><td> <?php echo $peserta->berat_badan?> kg</td></tr>
<tr><td style='width:400px;font-weight:bold'>Hobi</td><td>: </td><td> <?php echo $peserta->hobby?></td></tr>

					</table>

<h3>Pendidikan</h3><hr>
		<table class='table table-striped' style='width:80%;margin:15px' id='datatables'>
<tr><td style='width:400px;font-weight:bold'>Jenjang</td><td>:</td><td>  <?php echo $peserta->pendidikan?></td></tr>
<tr><td style='width:400px;font-weight:bold'>jenjang </td><td>:</td><td>  <?php echo $peserta->institusi?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Jurusan</td><td>: </td><td> <?php echo $peserta->jurusan?></td></tr>
<tr><td style='width:400px;font-weight:bold'>IPK</td><td>:</td><td>  <?php echo $peserta->IPK?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Tahun Masuk</td><td>: </td><td> <?php echo $peserta->tahun_masuk?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Tahun Lulus</td><td>: </td><td> <?php echo $peserta->tahun_ijazah?></td></tr>
<tr><td style='width:400px;font-weight:bold'>Lama</td><td>: </td><td> <?php echo $peserta->lama_pendidikan?></td></tr>
					</table>

<br><br>
					</div>
				</div><!--/span-->

<script type="text/javascript">
$(document).ready(function(){

	

});
</script>