				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Intensitas</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Kode Kriteria</th>
								  <th>Nama Kriteria</th>
								  <th>Keterangan</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php foreach ($kriterias as $key => $kriteria) { ?>
						  	<tr>
								<td><?php echo $kriteria->kode_kriteria ?></td>
								<td class="center"><?php echo $kriteria->nama_kriteria ?></td>
								<td><?php echo $kriteria->keterangan; ?></td>
								<td class="center">
									<?php if( $kriteria->jumlah > 0 ){ ?>
									<a class="btn btn-primary" href="<?php echo site_url('administrasi/intensitas_sub/'.$kriteria->id_kriteria) ?>">
										<i class="icon-th-list icon-white"></i>  
										Subkriteria                                         
									</a>
									<?php }else{?>
									<a class="btn btn-success" href="<?php echo site_url('administrasi/input_intensitas/'.$kriteria->id_kriteria) ?>">
										<i class="icon-th-list icon-white"></i>  
										Input Intensitas                                            
									</a>
									<?php } ?>
								</td>
							</tr>
						  <?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->