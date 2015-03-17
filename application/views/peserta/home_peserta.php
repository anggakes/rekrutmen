            <div class="col-sm-8">
                <h3>Selamat Datang </h3>
<hr>
<center></center>
<?php if(($peserta->tgl_lahir == null and $peserta->tinggi_badan == null) or count($data_pendidikan)<=0){ ?>

<div class='alert alert-danger' >
	<table><tr>
<td class='col-sm-2'><img src ='<?php echo base_url("assets/img/attention.png");?>' style='width:50px'/></td>
<td>
	<ul>
<?php if($peserta->tgl_lahir == null and $peserta->tinggi_badan == null){ ?>
	<li>
	Harap lengkapi data diri anda <a href='<?php echo site_url("user/data_diri")?>'>disini</a>.
	</li>
<?php } ?>
<?php if(count($data_pendidikan)<=0){ ?>
	<li>
	Harap lengkapi Pendidikan anda <a href='<?php echo site_url("user/data_pendidikan")?>'>disini</a>.
	</li>
<?php } ?>
	</ul>
</td>
</tr>
</table>
</div>
<?php }?>

<a href="<?php echo site_url('user/lowongan')?>" class='btn btn-primary pull-right'>Apply Lowongan</a>
<br><br><table class='table table-bordered'>
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
								echo "<br> - Minimal IPK : ".$l->min_ipk." ";
								echo "<br> - Minimal Usia : ".$l->min_usia." tahun";

							?><hr>
							<span style='float:right'><?php echo (blink($l->berakhir)) ?  "<img src=".base_url("assets/img/warning.gif")." width='150px' style='margin-bottom:5px;'/>" : "Akhir pendaftaran" ?>   : <b><span style='<?php echo (blink($l->berakhir)) ?  "color:red" : "" ?> '><?php echo ubah_tanggal($l->berakhir) ?></span></b></span>
						</td>
						
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
            </div>