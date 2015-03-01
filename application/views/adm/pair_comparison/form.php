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

<!-- PESAN SUKSES -->

	<form class="form-horizontal" action="<?php echo ($parent=='') ? site_url("administrasi/simpan_pair_comparison") : site_url("administrasi/simpan_pair_comparison/$parent") ?>" method="post"> 

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
			     				$select = buatSelect($pb->nilai);
			     				echo "<td style='text-align:center'>
			     				<select name='".$pb->id."' style='width:60px' class='".$pb->kolom."_val perbandingan' data-kolom='".$pb->kolom."' data-baris='".$pb->baris."' id='".$pb->baris."_".$pb->kolom."'> 
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
<center><h3>Tabel Prioritas</h3></center>
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
								<td style='text-align:center;'>Hasil</td>
								
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
			     			echo "<td style='text-align:center;background:#f4f4f4' id='hasil_matrik_".$row->id_kriteria."' class='hasil_matrik'></td>";
			     			echo "</tr>";
			     		}
			     		?>
			     		<tr><td colspan=<?php echo count($kriteria)+3; ?> style='text-align:center'>TOTAL HASIL</td><td style='text-align:center;' id='total_hasil_matrik' >aaa</td><tr>
			     		</tbody>
			     		</table>
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