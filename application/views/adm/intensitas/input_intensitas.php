
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo (isset( $kriteria ) ? "Edit" : "Tambah" ) ?> Kriteria</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
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
						<form class="form-horizontal" action="<?php echo ( isset( $kriteria ) ? site_url("administrasi/update_kriteria") : site_url("administrasi/simpan_kriteria") ) ?>" method="post"> 
							<fieldset>
								<legend>Formulir Intensitas Kepentingan</legend>
								<div class="control-group">
									<label class="control-label">Kode Kriteria</label>
									<div class="controls">
									  <input class="input-xlarge" <?php echo isset($kriteria) ? "disabled" : "" ?> type="text" value="<?php echo (isset($kriteria) ? $kriteria->kode_kriteria : "") ?>" name="kode_kriteria" value="" placeholder="Kode Kriteria">
									</div>
								</div>
								<?php if( isset($kriteria) ) { ?>
									<input type="hidden" name="k_krit" value="<?php echo $kriteria->id_kriteria; ?>" />
								<?php } ?>
								<?php if( strtolower($kriteria->nama_kriteria) == "pendidikan" ){ ?>	
								<div class="control-group">
									<label class="control-label">Jenjang Pendidikan</label>
									<div class="controls">
										<select name="tambahan">
											<option value="D3">D3</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
									</div>
								</div>	
								<?php } ?>	
								<div class="control-group">
									<label class="control-label">
										<?php 
											$nkriteria = strtolower($kriteria->nama_kriteria);
											switch ( $nkriteria ) {
												case 'pendidikan':
													echo "Lama Pendidikan";
													break;
												case 'ipk':
													echo "Range IPK";
													break;
												case 'ipk':
													echo "Range IPK";
													break;
												case 'proporsional':
													echo "Range Berat Proporsional";
													break;
												default:
													echo "Range Nilai";
													break;
											}
										?>
									</label>
									<div class="controls">
										<input type="text" class="input-small" name="range_bawah" value="0"/> - <input type="text" class="input-small" name="range_atas" value="0"/> 
									</div>
								</div>								
								<div class="control-group">
									<label class="control-label">Intensitas</label>
									<div class="controls">
									  <select class="" name="intensitas">
									  	<?php for ($i=1; $i < 10; ++$i) { ?>
									  		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									  	<?php } ?>
									  </select>
									</div>
								</div>
								<div class="form-actions">
								  <button type="submit" class="btn btn-primary"><i class="icon icon-white icon-save"></i>Simpan</button>
								  <button type="reset" class="btn">Reset</button>
								  <a href="<?php echo site_url('administrasi/intensitas') ?>" class="btn btn-default"><i class="icon icon-black icon-undo"></i>Kembali</a>
								</div>
							</fieldset>
						</form>       
					</div>
				</div><!--/span-->