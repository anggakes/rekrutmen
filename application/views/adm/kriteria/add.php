
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
						<form class="form-horizontal" action="<?php echo ( isset( $kriteria ) ? site_url("administrasi/update_kriteria") : site_url("administrasi/simpan_kriteria") ) ?>" method="post"> 
							<fieldset>
								<legend>Formulir <?php echo (isset( $kriteria ) ? "Edit" : "Tambah" ) ?> Kriteria</legend>
								<div class="control-group">
									<label class="control-label">Parent </label>
									<div class="controls">
									 <select class="input-xlarge" name="parent_kriteria" >
										<option value='' >- tidak sebagai subkriteria -</option>
									 <?php 
									 	foreach($parent_kriteria as $p){
									 		$selected = (isset($kriteria) and $kriteria->parent_kriteria==$p->id_kriteria) ? 'selected': '';
									 	echo "<option value='$p->id_kriteria' $selected >$p->nama_kriteria</option>";
																			
									 	}
									 ?>


									 </select>									 
									 
									   <span class='label '>Pilih jika sebagai subkriteria</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Kode Kriteria</label>
									<div class="controls">
									  <input class="input-xlarge"  type="text" value="<?php echo (isset($kriteria) ? $kriteria->kode_kriteria : "") ?>" name="kode_kriteria" value="" placeholder="Kode Kriteria">
									</div>
								</div>
								<?php if( isset($kriteria) ) { ?>
									<input type="hidden" name="k_krit" value="<?php echo $kriteria->id_kriteria; ?>" />
									<input class="input-xlarge" type="hidden" value="<?php echo $kriteria->kode_kriteria ?>" name="kode_kriteria_lama" >
								<?php } ?>
								<div class="control-group">
									<label class="control-label">Nama Kriteria</label>
									<div class="controls">
									  <input class="input-xlarge" type="text" name="nama_kriteria" value="<?php echo (isset($kriteria) ? $kriteria->nama_kriteria : "") ?>" placeholder="Nama Kriteria">
									</div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="textarea2">Keterangan</label>
								  <div class="controls">
									<textarea class="cleditor" name="keterangan" id="textarea2" rows="3"><?php echo (isset($kriteria) ? $kriteria->keterangan : "") ?></textarea>
								  </div>
								</div>

								<div class="form-actions">
								  <button type="submit" class="btn btn-primary"><i class="icon icon-white icon-save"></i>Simpan</button>
								  <button type="reset" class="btn">Reset</button>
								  <a href="<?php echo site_url('administrasi/kriteria') ?>" class="btn btn-default"><i class="icon icon-black icon-undo"></i>Kembali</a>
								</div>
							</fieldset>
						</form>       
					</div>
				</div><!--/span-->