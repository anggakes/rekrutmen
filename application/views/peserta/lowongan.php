<div class="col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Lowongan Pekerjaan</h5>
		</div>
		<div class="panel-body">
			<?php if( $this->session->flashdata('error') != "" ){ ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Warning!</strong> <?php echo $this->session->flashdata('error'); ?>
			</div>
			<?php } 
			if( $this->session->flashdata('success') != '' ){ ?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo $this->session->flashdata('success') ?><br>
			  Untuk pengumuman dapat dilihat langsung ke PT.TELKOM
			</div>
			<?php }?>
			<br>
<?php if($peserta->tgl_lahir != null AND $peserta->tinggi_badan != null and count($pendidikan)>0){ ?>
			<table class='table table-bordered'>
				<thead>
				</thead>
				<tbody>
					<?php foreach ($lowongan as $l):
					?>
					<tr>
						<td >
							<strong><?php echo $l->kode_lowongan?> - <?php echo $l->nama?></strong>
							
							<hr>
							<?php
								echo nl2br($l->deskripsi);
								echo "<br> <b>Syarat :</b>";
								echo "<br> - Minimal Pendidikan : ".$l->min_pendidikan;								
								echo "<br> - Minimal IPK : ".$l->min_ipk;
								echo "<br> - Minimal Usia : ".$l->min_usia." tahun";
							?><hr>
							<span class='pull-right'>Akhir pendaftaran : <b><?php echo ubah_tanggal($l->berakhir) ?></b></span>
						</td>

						<td class='col-sm-2' style='vertical-align:middle;text-align:center'>
						<?php if($l->apply==0){?>
							<a href='<?php echo site_url("user/apply_lowongan/".$l->id.""); ?>' class='btn btn-danger'>apply</a>
						<?php }else{
							echo "<span class='label label-success'>Accepted</span>";
						}
						?>
						</td>
						
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
<?php } else{?>
<div class="alert alert-danger">
<b> Data Belum Lengkap </b><br>
Anda belum dapat mengajukan lowongan, harap Lengkapi data diri dan data pendidikan anda !

</div>
<?php } ?>
		</div>
		<div class="panel-footer">

		</div>
	</div>
</div>