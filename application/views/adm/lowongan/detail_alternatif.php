<div class="box span6">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Perhitungan</h2>
						<div class="box-icon">
							
								
							
						</div>
					</div>
					<div class="box-content">
					<hr>
					<table class='table'>
						<thead><tr>
							<td>Kode</td>
							<td>Bobot</td>
							<td>Intensitas</td>
							<td>Jumlah</td>
						</tr>
						</thead>
						<tbody>
							<?php	
							$total =0;
							foreach ($prioritas as $key => $value) {
							$jumlah = $value*$alternatif->$key;
							$total+=$jumlah;
							echo "<tr>
								<td>".strtoupper($key)."</td>
								<td>".$value."</td>
								<td>".$alternatif->$key."</td>
								<td>".$jumlah."</td>
							</tr>";	
							}
							?>
							<tr style='background:#c0c0c0'><td colspan="3">TOTAL</td><td><?php echo $total?></td></tr>
						</tbody>
					</table>
						</div>

											<div class="clearfix"></div>
					</div>



<div class="box span6">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Identitas Peserta</h2>
						<div class="box-icon">
							
								
							
						</div>
					</div>
					<div class="box-content">
					<hr>
					<table class='table table-striped'>
						<tr>
							<td>Nomor Peserta</td><td>:</td><td><?php echo $peserta->no_peserta; ?></td> 
						</tr>
						<tr>
							<td>Nama Peserta</td><td>:</td><td><?php echo $peserta->nama_peserta; ?></td> 
						</tr>
					</table>
						</div>

											<div class="clearfix"></div>
			
</div>	


<div class="box span6">	
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Konversi </h2>
						<div class="box-icon">
							
								
							
						</div>
					</div>
					<div class="box-content">
					<hr>
					<table class='table table-bordered'>
						<tr style='background:pink'>
							<td>Kriteria</td>
							<td>Nilai</td>
							<td>Intensitas</td>
						</tr>
						<tr>
							<td>IPK (K1)</td><td><?php echo $peserta->IPK; ?></td>
							<td><?php echo $alternatif->k1 ?></td> 
						</tr>
						<tr>
							<td>Pendidikan / Lama (K2) </td><td><?php echo $peserta->pendidikan."/".$peserta->lama_pendidikan." tahun"; ?></td>
							<td><?php echo $alternatif->k2?></td> 
						</tr>
						<tr>
							<td>Proporsional (K3SK1) </td><td><?php echo $peserta->tinggi_badan." cm"; ?></td>
							<td><?php echo $alternatif->k3sk1?></td> 
						</tr>
						<tr>
							<td>Umur (K3SK2) </td><td><?php echo $peserta->umur." tahun"; ?></td>
							<td><?php echo $alternatif->k3sk2?></td> 
						</tr>
						<tr>
							<td>Ketekunan (K3SK3) </td><td><?php echo $peserta->ketekunan; ?></td>
							<td><?php echo $alternatif->k3sk3?></td> 
						</tr>
						<tr>
							<td>Psikotes (K4) </td><td><?php echo $psikotes->nilai; ?></td>
							<td><?php echo $alternatif->k4?></td> 
						</tr>

					</table>
						</div>

											<div class="clearfix"></div>
				</div>	
<div class='row' style='margin-left:0px'>
<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Konversi Wawancara</h2>
						<div class="box-icon">
							
								
							
						</div>
					</div>
					<div class="box-content">
					<hr>
					<table class='table table-bordered'>
						<tr style='background:pink'>
							<td>Kriteria</td>
							<td>#1</td>
							<td>#2</td>
							<td>#3</td>
							<td>#4</td>
							<td>Jumlah</td>
							<td>Intensitas</td>
						</tr>
						<?php 
							$alt = ["Komunikasi","Dampak","Motivasi","Wawasan","Pengendalian Diri","Keterampilan Sosial","Inisiatif"];
							$p = 1;
							foreach ($alt as $v) {
								$k = "sk".$p;
								$n='';
								$jumlah =0;
								for($i=1;$i<=4;$i++){
									$o = $k.$i;
									$n.="<td>".$pw->$o."</td>";
									$jumlah+=$pw->$o;
								}
								$kode = "k5sk".$p;
								echo "
									<tr>
									<td>$v (K5SK$p)</td>
									".$n." 
									<td>$jumlah</td>
									<td>".$alternatif->$kode."</td>
									</tr>
								";
								$p++;
							}
							

						?>
						
					</table>
						</div>

											<div class="clearfix"></div>
			
</div>	
</div>