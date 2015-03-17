
				<div class="box span6">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Lowongan</h2>
						<div class="box-icon">
							
								
							
						</div>
					</div>
					<div class="box-content">
						
					<table class='table table-bordered'>
				<thead>
				</thead>
				<tbody>
					<?php foreach ($l as $l):
					?>
					<tr>
						<td >
							<strong><?php echo $l->kode_lowongan?> - <?php echo $l->nama?></strong>
							<span class='pull-right'><a href="<?php echo site_url('administrasi/pelamar/'.$l->id)?>"><?php echo $l->pelamar?> Pelamar</a></span>
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

											<div class="clearfix"></div>
					</div>
		



				<div class="box span6">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Dashboard</h2>
						<div class="box-icon">
							
								
							
						</div>
					</div>
					<div class="box-content">
						<table class='table'>
						<tr> 
							<td>Total Semua User : </td><td> <strong><?php echo $pelamar->total?> orang </strong></td>
						</tr>
						<tr> 
							<td>Total Semua Lowongan : </td><td> <strong><?php echo $lowongan->total?> lowongan </strong></td>
						</tr>
					</table>

						</div>

											<div class="clearfix"></div>
					</div>
					






