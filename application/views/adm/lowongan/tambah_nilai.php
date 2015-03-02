
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo (isset( $nilai ) ? "Edit" : "Tambah" ) ?> Nilai</h2>
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
						<form class="form-horizontal" action="<?php echo ( isset( $kriteria ) ? site_url("administrasi/update_nilai") : site_url("administrasi/simpan_nilai") ) ?>" method="post"> 
							<fieldset>
								<div class="control-group">
									<label class="control-label">No Peserta </label>
									<div class="controls">
									 <select class="input-xlarge" name="parent_kriteria" >
										<option value='' >- No Peserta -</option>
									 <?php 
									 	foreach($nilai_peserta as $p){
									 		$selected = (isset($nilai) and $nilai->nilai_peserta==$p->no_peserta) ? 'selected': '';
									 	echo "<option value='$p->no_peserta' $selected >$p->no_peserta</option>";
																			
									 	}
									 ?>


									 </select>									 
									 
									   <span class='label '>Pilih jika sebagai subkriteria</span>
									</div>
								</div>
								<!--div class="control-group">
									<label class="control-label">Kode Kriteria</label>
									<div class="controls">
									  <input class="input-xlarge"  type="text" value="<?php echo (isset($kriteria) ? $kriteria->kode_kriteria : "") ?>" name="kode_kriteria" value="" placeholder="Kode Kriteria">
									</div>
								</div>
								-->
								<?php /*if( isset($kriteria) ) { ?>
									<input type="hidden" name="k_krit" value="<?php echo $kriteria->id_kriteria; ?>" />
									<input class="input-xlarge" type="hidden" value="<?php echo $kriteria->kode_kriteria ?>" name="kode_kriteria_lama" >
								<?php }*/ ?>



								<fieldset>
									<legend>1. Psikotes </legend>
									<div class="control-group">
									<label class="control-label">Psikotes</label>
									<div class="controls">
									  <input class="input-xlarge" type="text" name="psikotes" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="Psikotes">
									</div>
								</div>
								</fieldset>

								<fieldset>
									<legend>2. Komunikasi </legend>
									<div class="control-group">
										<label class="control-label">Penyampaian Informasi</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Kecepatan</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Komunikasi Non Verbal</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mendengarkan Masukan</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>3. Komunikasi </legend>
									<div class="control-group">
										<label class="control-label">Berpakaian Sesuai Acara</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Citra Diri</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Keramahan</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Tenang</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>4. Motivasi </legend>
									<div class="control-group">
										<label class="control-label">Menunjukkan Keinginan</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mengetahui Tujuan Yang Ingin Dicapai</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Kemampuan Memberikan Alasan</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Tidak Mudah Menyerah</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>5. Wawasan </legend>
									<div class="control-group">
										<label class="control-label">Wawasan Yang Luas</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Penguasaan Bidang</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mengetahui Manfaat</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mengenal Kelemahan Dan Kekuatan </label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>6. Pengendalian Diri </legend>
									<div class="control-group">
										<label class="control-label">Menunjukkan Hasil Kerja Efektif</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Kemampuan Berpikir</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Tidak Mudah Terpengaruh</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mampu Menghindari Reaksi Emosi</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>7. Keterampilan Sosial </legend>
									<div class="control-group">
										<label class="control-label">Dapat Menjalin Relasi</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mampu Memahami Individu Lain</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Menciptakan Hubungan Kerja Sama</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>8. Inisiatif </legend>
									<div class="control-group">
										<label class="control-label">Proaktif Mengidentifikasi Kesempatan</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mencari Cara Penyelesaian Yang Tepat</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mengambil Tindakan Dalam Menyelesaikan Masalah</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mengusulkan Cara Baru Yang Efektif</label>
										<div class="controls">
										  <input class="input-xlarge" type="text" name="k1" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="">
										</div>
									</div>
								</fieldset>
								
								

								<div class="form-actions">
								  <button type="submit" class="btn btn-primary"><i class="icon icon-white icon-save"></i>Simpan</button>
								  <button type="reset" class="btn">Reset</button>
								  <a href="<?php echo site_url('administrasi/kriteria') ?>" class="btn btn-default"><i class="icon icon-black icon-undo"></i>Kembali</a>
								</div>
							</fieldset>
						</form>       
					</div>
				</div><!--/span-->