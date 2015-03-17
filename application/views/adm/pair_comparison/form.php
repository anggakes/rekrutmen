<?php
function buatSelect($val){
	$select = [
			'9'=>9,'8'=>8,'7'=>7,'6'=>6,'5'=>5,'4'=>4,'3'=>3,'2'=>2,'1'=>1,
			'1/2'=>0.5,'1/3'=>0.33,'1/4'=>0.25,'1/5'=>0.2,'1/6'=>0.17,'1/7'=>0.14,'1/8'=>0.13,'1/9'=>0.11
			];
	$tampil = '';
	foreach ($select as $key => $value) {
		$selected = ($value==$val) ? "selected":"";
		$tampil.="<option value='$value' $selected>$key</option>";
	}
			     	
	return $tampil;
}
?>


				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo (isset( $kriteria ) ? "Edit" : "Tambah" ) ?> Kriteria</h2>
						
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						
						</div>
						<a href="#" data-toggle='modal' data-target='#modal' class='btn btn-info pull-right'>Keterangan Intensitas</a>

					</div>
					<div class="box-content">
<!-- Pesan SUKSES-->
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

<!-- PESAN SUKSES --><br>
<center><h3>Matriks Perbandingan Berpasangan</h3></center><br>
	<form id='form' class="form-horizontal" action="<?php echo ($parent=='') ? site_url("administrasi/simpan_pair_comparison") : site_url("administrasi/simpan_pair_comparison/$parent") ?>" method="post"> 

						<table class='table table-striped table-bordered'>

						<thead>
							<tr>
								<td></td>
								<?php foreach ($kriteria as $head) {
									echo "<td style='text-align:center'>$head->nama_kriteria</td>";
								}?>
							</tr>
						</thead>
						<tbody>
			     		<?php
			     		
			     		$posisi_kriteria = reset($kriteria);
			     		echo "<tr>";
			     		echo "<td style='text-align:center'>$posisi_kriteria->nama_kriteria</td>";
			     		
			     		foreach ($perbandingan_berpasangan as $pb) {
			     			if ($posisi_kriteria->id_kriteria!=$pb->baris){
			     				$posisi_kriteria = next($kriteria);
			     				echo "</tr>";
			     				echo "<tr>";
								echo "<td style='text-align:center'>$posisi_kriteria->nama_kriteria</td>";
			     			}

			     			if($pb->baris==$pb->kolom)
			     				{
			     				echo "<td style='text-align:center'>
			     				<input name='".$pb->id."' style='width:60px' class='".$pb->kolom."_val perbandingan' data-kolom='".$pb->kolom."' data-baris='".$pb->baris."' value='1' type='number' readonly id='".$pb->baris."_".$pb->kolom."'>
			     				</td>";
			     				}else
			     				{
			     				$readonly = ($pb->baris>$pb->kolom) ? "disabled" : "" ;
			     				$select = buatSelect($pb->nilai);
			     				echo "<td style='text-align:center'>
			     				<select name='".$pb->id."' $readonly style='width:60px' class='".$pb->kolom."_val perbandingan' data-kolom='".$pb->kolom."' data-baris='".$pb->baris."' id='".$pb->baris."_".$pb->kolom."'> 
			     					$select
			     				</select>
			     				</td>";
			     				}
			     		}
			     		?>
			     		<tr style='background:pink'><td style='text-align:center;'>Jumlah</td>
			     			<?php
			     			foreach ($kriteria as $krit) {

			     				echo "
			     					<td style='text-align:center;'><input id='jumlah_".$krit->id_kriteria."' type='number' style='width:60px' disabled /></td>
			     				";
			     			}
			     			?>
			     		</tr>
			     		</tbody>
			     		</table>

			     		<hr>
<center><h3>Matriks Nilai Kriteria</h3></center>
<br>
<!-- 
	membuat table matrik baru 
	Rumus: nilai table lama/jumlah kolom
											-->
			     		<table class='table table-bordered'>
			     		<thead>
							<tr>
								<td></td>
								<?php foreach ($kriteria as $head) {
									echo "<td style='text-align:center'>$head->nama_kriteria</td>";
								}?>
								<td style='text-align:center;'>Jumlah</td>
								<td style='text-align:center;background:#d2ffa8'>Prioritas</td>
														
							</tr>
						</thead>

						<tbody>
							<?php
						foreach ($kriteria as $row) {
			     			
			     			echo "<tr>";
			     			echo "<td style='text-align:center'>$row->nama_kriteria</td>";
			     			foreach ($kriteria as $col) {
			     		
			     				echo "<td style='text-align:center' id='matrik_".$row->id_kriteria."_".$col->id_kriteria."' class='matrik_".$row->id_kriteria." matrik' data-kolom='".$col->id_kriteria."' data-baris='".$row->id_kriteria."'>
			     				</td>";
			     				
			     			}
			     			echo "<td style='text-align:center;background:#f4f4f4' id='jumlah_matrik_".$row->id_kriteria."'></td>";
			     			echo "<td style='text-align:center;background:#d2ffa8'><input style='width:60px' type='number' id='prioritas_matrik_".$row->id_kriteria."' name='prioritas[]' readonly/></td>";

			      			echo "</tr>";
			     		}
			     		echo "<tr style='background:#c0c0c0'><td style='text-align:center'>Jumlah</td>";
			     		foreach ($kriteria as $value) {
			     			echo "
			     				<td  style='text-align:center' id='jumlah_baris_nilai_kriteria_".$value->id_kriteria."'>1</td>
			     			";
			     		}
			     		echo "<td></td>
			     		<td style='text-align:center'>1</td>
			     		</tr>";
			     		?>


			     		</tbody>
			     		</table>
<hr>
<center><h3>Matriks Penjumlahan Setiap Baris</h3></center>
<br>
<table class='table table-bordered'>
			     		<thead>
							<tr>
								<td></td>
								<?php foreach ($kriteria as $head) {
									echo "<td style='text-align:center'>$head->nama_kriteria</td>";
								}?>
								<td style='text-align:center;'>Jumlah</td>
								<td style='text-align:center;background:#d2ffa8'>Prioritas</td>
								<td style='text-align:center;'>Hasil</td>
								
							</tr>
						</thead>

						<tbody>
							<?php
						foreach ($kriteria as $row) {
			     			
			     			echo "<tr>";
			     			echo "<td style='text-align:center'>$row->nama_kriteria</td>";
			     			foreach ($kriteria as $col) {
			     		
			     				echo "<td style='text-align:center' id='psb_".$row->id_kriteria."_".$col->id_kriteria."' class='psb_".$row->id_kriteria." psb' data-kolom='".$col->id_kriteria."' data-baris='".$row->id_kriteria."'>
			     				</td>";
			     				
			     			}
			     			echo "<td style='text-align:center;background:#f4f4f4' id='jumlah_hasil_psb_".$row->id_kriteria."'></td>";
			     			echo "<td style='text-align:center;background:#d2ffa8'><input style='width:60px' type='number' id='psb_prioritas_".$row->id_kriteria."' name='prioritas[]' readonly/></td>";
			     			echo "<td style='text-align:center;background:#f4f4f4' id='hasil_matrik_".$row->id_kriteria."' class='hasil_matrik'></td>";
			     			echo "</tr>";
			     		}
			     		?>
			     		<tr><td colspan=<?php echo count($kriteria)+3; ?> style='text-align:center'>TOTAL HASIL</td><td style='text-align:center;' id='total_hasil_matrik' >aaa</td><tr>
			     		</tbody>
			     		</table>

<hr>


<div class='container_cr'>
CR = <span class='cr'>-1234</span> 
</div><br>
<div class='kesimpulan' style='font-size:15pt'>
Maka, Rasio Konsistensi <span style='font-size:15pt' class=' label '>dapat diterima</span>
</div>


<hr>

<br>			     		
<center><input type='submit' class='btn btn-xlarge btn-warning btn-simpan' value='Simpan Tabel'></center> <br>

			     	</form>
					</div>
				</div><!--/span-->

<!--   modal keterangan Intensitas ================  -->

<div class="modal hide fade" id="modal">
<form class='form-horizontal' method='post' action="<?php echo site_url('administrasi/lowongan_edit'); ?>">	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Tabel Keterangan Intensitas</h3>
	
</div>
			<div class="modal-body">
<table class='table'>
	<thead>
		<tr>
			<td>Nilai</td>
			<td>Keterangan</td>
		</tr>
	</thead><tbody>
<?php
foreach ($keterangan_intensitas as  $value) {
	echo "<tr>
		<td>".$value->nilai."</td>
		<td>".$value->keterangan."
	</tr>";
}
?>
</tbody>
</table>

			</div>
			<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">tutup</a>

	
			</div>
			</form>
		</div>