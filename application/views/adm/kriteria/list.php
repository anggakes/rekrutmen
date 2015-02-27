				<?php
//buat dulu array nya. ::
				$parent = array();
				$nama_parent=array();
				foreach($kriterias as $kriteria){
					if(!in_array($kriteria->parent_kriteria,$parent) and $kriteria->parent_kriteria != NULL){
						array_push($parent, $kriteria->parent_kriteria);
					}
					if($kriteria->parent_kriteria==NULL){
						$nama_parent[$kriteria->id_kriteria]=$kriteria->nama_kriteria;
					}
				}

				?>

				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Kriteria dan Sub Kriteria</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
					<h2>Kriteria</h2><hr>	
					
					<?php if(count($kriterias)>0){ ?>
						<table class="table table-striped table-bordered ">
						  <thead>
							  <tr>
								  <th>Kode Kriteria</th>
								  <th>Nama Kriteria</th>
								  <th>Keterangan</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php foreach ($kriterias as $key => $kriteria) {
						  	if($kriteria->parent_kriteria == NULL){
						   ?>
						  	<tr>
								<td><?php echo $kriteria->kode_kriteria ?></td>
								<td class="center"><?php echo $kriteria->nama_kriteria ?></td>
								<td><?php echo $kriteria->keterangan; ?></td>
								
								<td class="center">
									<a class="btn btn-success" href="<?php echo site_url('administrasi/lihat_kriteria/'.$kriteria->kode_kriteria) ?>">
										<i class="icon-zoom-in icon-white"></i>  
										View                                            
									</a>
									<a class="btn btn-info" href="<?php echo site_url('administrasi/edit_kriteria/'.$kriteria->kode_kriteria) ?>">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
				
								</td>
							</tr>
						  <?php } }?>
						  </tbody>
					  </table>    

<center><a href="<?php echo site_url('administrasi/pair_comparison/') ?>" class='btn btn-xlarge btn-warning'><i class='icon-th icon-white'></i> Perbandingan berpasangan</a></center> <br>
<?php }else{
	echo "<center>Data Masih Kosong ..</center><br>";
} // end tabel ?>
					  
<?php 
foreach ($parent as $key => $kode_parent) { 
?>
<br>
<h2>Sub Kriteria <?php echo $nama_parent[$kode_parent]; ?></h2><hr>

				<table class="table table-striped table-bordered ">
						  <thead>
							  <tr>
								  <th>Kode Kriteria</th>
								  <th>Nama Kriteria</th>
								  <th>Keterangan</th>
								 
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php foreach ($kriterias as $key => $kriteria) {
						  	if($kriteria->parent_kriteria == $kode_parent){
						   ?>
						  	<tr>
								<td><?php echo $kriteria->kode_kriteria ?></td>
								<td class="center"><?php echo $kriteria->nama_kriteria ?></td>
								<td><?php echo $kriteria->keterangan; ?></td>
								
								<td class="center">
									<a class="btn btn-success" href="<?php echo site_url('administrasi/lihat_kriteria/'.$kriteria->kode_kriteria) ?>">
										<i class="icon-zoom-in icon-white"></i>  
										View                                            
									</a>
									<a class="btn btn-info" href="<?php echo site_url('administrasi/edit_kriteria/'.$kriteria->kode_kriteria) ?>">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
									
								</td>
							</tr>
						  <?php } }?>
						  </tbody>
					  </table>  
<center><a href="<?php echo site_url('administrasi/pair_comparison/'.$kode_parent) ?>" class='btn btn-xlarge btn-warning'><i class='icon-th icon-white'></i> Perbandingan berpasangan</a></center> <br>
	<?php } ?> 	        
					</div>
				</div><!--/span-->
			<div class="modal hide fade" id="deleteModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Hapus Kriteria/Subkriteria</h3>
			</div>
			<div class="modal-body">
				<p>Apakah Anda Yakin akan menghapus data ini?</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Tidak</a>
				<a href="#" class="btn btn-primary" id="btn-ya">Ya</a>
			</div>
		</div>