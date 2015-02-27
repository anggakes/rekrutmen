
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Intensitas Kepentingan Subkriteria</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<legend>Kriteria</legend>
						<table id="view" class="table table-bordered table-striped" style="tr td:first-child{width:20%;}">
							  <tbody>
								<tr>
									<td>Kode Kriteria</td>
									<td><?php echo $kriteria->kode_kriteria; ?></td>                                    
								</tr>
								<tr>
									<td>Nama Kriteria</td>
									<td><?php echo $kriteria->nama_kriteria; ?></td>                                    
								</tr>
								<tr>
									<td>Keterangan</td>
									<td><?php echo $kriteria->keterangan; ?></td>                                    
								</tr>
							  </tbody>
						 </table> 
						 <legend>Subkriteria</legend>
						 <div class="well">
						 	<a href="<?php echo site_url('administrasi/tambah_subkriteria/'.$kriteria->kode_kriteria) ?>" class="btn btn-primary">Tambah Subkriteria</a>
						 </div>
						 <table class="table table-bordered table-striped">
						 	<thead>
						 		<tr>
						 			<th>Kode Subkriteria</th>
						 			<th>Nama Subkriteria</th>
						 			<th>Keterangan</th>
						 			<th>Actions</th>
						 		</tr>
						 	</thead>
						 	<tbody>
						 	<?php if( count($subkriterias) <= 0 ){ ?>
						 		<tr><td colspan="4">Tidak ada subkriteria</td></tr>
						 	<?php }else{ ?>
						 		<?php foreach ($subkriterias as $key => $subkriteria) { ?>
							 		<tr>
							 			<td><?php echo $subkriteria['kode_kriteria']; ?></td>
							 			<td><?php echo $subkriteria['nama_kriteria']; ?></td>
							 			<td><?php echo $subkriteria['keterangan']; ?></td>
									 	<td class="center">
											<a class="btn btn-info" href="<?php echo site_url('administrasi/edit_kriteria/'.$subkriteria['id_kriteria']) ?>">
												<i class="icon-edit icon-white"></i>  
												Edit                                            
											</a>
											<a class="btn btn-danger hapus" data-kode="<?php echo $subkriteria['kode_kriteria'] ?>" href="<?php echo site_url('administrasi/hapus_kriteria/'.$subkriteria['kode_kriteria']) ?>">
												<i class="icon-trash icon-white"></i> 
												Delete
											</a>
										</td>
							 		</tr>
						 		<?php } ?>
						 	<?php } ?>
						 	</tbody>
						 </table>
						 <div class="form-actions">
						 	<a href="<?php echo site_url('administrasi/edit_kriteria/'.$kriteria->kode_kriteria) ?>" class="btn btn-primary">
						 		<i class="icon icon-white icon-edit"></i> Edit
						 	</a>
						 	<a href="<?php echo site_url('administrasi/intensitas') ?>" class="btn btn-default"><i class="icon icon-black icon-undo"></i> Kembali</a>
						 </div>
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