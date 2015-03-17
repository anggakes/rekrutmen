
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
						<form class="form-horizontal" action="<?php echo site_url("administrasi/hitung_alt/".$id_lowongan)  ?>" method="post"> 
							<fieldset>
								<div class="control-group" >
									<label class="control-label">No Peserta </label>
									<div class="controls">
									<input type='text' class='' name='no_peserta' required/>
									<a href='#' class='btn btn-success' data-toggle="modal" data-target="#modal_tambah">Cari Peserta</a>
									<span class='label'>ketik no.peserta atau nama peserta</span>
									 
									</div>
								</div>
								<fieldset>
									<legend>Ketekunan </legend>
									<div class="control-group">
									<label class="control-label">Ketekunan</label>
									<div class="controls">
									  <input class="input-xlarge" type="number" name="ketekunan" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="Ketekunan" min='0' max='9' required> <span class='label'>1-9</span>
									</div>
								</div>
								</fieldset>
		

								<fieldset>
									<legend>1. Psikotes </legend>
									<div class="control-group">
									<label class="control-label">Psikotes</label>
									<div class="controls">
									  <input class="input-xlarge" type="number" name="psikotes" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="Psikotes" required>
									</div>
								</div>
								</fieldset>

								<fieldset>
									<legend>2. Komunikasi </legend>
									<div class="control-group">
										<label class="control-label">Penyampaian Informasi</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk11" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Kecepatan</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk12" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Komunikasi Non Verbal</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk13" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mendengarkan Masukan</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk14" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>3. Dampak </legend>
									<div class="control-group">
										<label class="control-label">Berpakaian Sesuai Acara</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk21" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Citra Diri</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk22" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Keramahan</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk23" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Tenang</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk24" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>4. Motivasi </legend>
									<div class="control-group">
										<label class="control-label">Menunjukkan Keinginan</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk31" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mengetahui Tujuan Yang Ingin Dicapai</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk32" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Kemampuan Memberikan Alasan</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk33" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Tidak Mudah Menyerah</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk34" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>5. Wawasan </legend>
									<div class="control-group">
										<label class="control-label">Wawasan Yang Luas</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk41" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Penguasaan Bidang</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk42" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mengetahui Manfaat</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk43" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mengenal Kelemahan Dan Kekuatan </label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk44" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>6. Pengendalian Diri </legend>
									<div class="control-group">
										<label class="control-label">Menunjukkan Hasil Kerja Efektif</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk51" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Kemampuan Berpikir</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk52" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Tidak Mudah Terpengaruh</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk53" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mampu Menghindari Reaksi Emosi</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk54" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>7. Keterampilan Sosial </legend>
									<div class="control-group">
										<label class="control-label">Dapat Menjalin Relasi</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk61" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mampu Memahami Individu Lain</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk62" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Menciptakan Hubungan Kerja Sama</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk63" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Menyatakan pendapat pribadi dan keberatan</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk64" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>8. Inisiatif </legend>
									<div class="control-group">
										<label class="control-label">Proaktif Mengidentifikasi Kesempatan</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk71" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mencari Cara Penyelesaian Yang Tepat</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk72" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mengambil Tindakan Dalam Menyelesaikan Masalah</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk73" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Mengusulkan Cara Baru Yang Efektif</label>
										<div class="controls">
										  <input class="input-xlarge" type="number" name="sk74" value="<?php // echo (isset($nilai) ? $nilai->psikotes : "") ?>" placeholder="" min='0' max='5' required>  <span class='label'>1-5</span>
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

<!-- Modal Tambah -->

<div class="modal hide fade" id="modal_tambah">
		<div class="modal-header">
		
</div>
			<div class="modal-body">

	<table class='table' id='datatables'>
		<thead>
			<tr>
			<td>No. peserta</td>
			<td>Nama</td>
			<td>Tanggal Lahir</td>
			<td></td>
		</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($peserta as  $value) {
					echo "<tr>";
					echo "
						<td>".$value->no_peserta."</td>
						<td>".$value->nama_peserta."</td>
						<td>".$value->tgl_lahir."</td>
						<td><a href='#' data-dismiss='modal' class='pilih' data-value = '".$value->no_peserta." - ".$value->nama_peserta."'>pilih</a></td>
					";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>

			</div> <!-- End body modal -->
			<div class="modal-footer">
				
	
			</div>
			
		</div>

