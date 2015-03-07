<div class="col-sm-8">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Lowongan Pekerjaan</h5>
		</div>
		<div class="panel-body">
			<?php if( $this->session->flashdata('error') != "" ){ ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
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
			<br>
			<div class="alert alert-info alert-dismissible" role="alert">
			Untuk pengumuman tes dan kelulusan akan di informasikan lebih lanjut melalui <b>handphone</b> atau <b>email</b>
			</div>
			<br>
			<table class='table table-bordered'>
				<thead>
				</thead>
				<tbody>
					<?php foreach ($lowongan as $l):
					?>
					<tr>
						<td >
							<strong><?php echo $l->kode_lowongan?> - <?php echo $l->nama?></strong>
							<br>
							<?php
								echo nl2br($l->deskripsi);
							?>
						</td>
						<td class='col-sm-2' style='vertical-align:middle;text-align:center'>
						<?php if($l->apply==0){?>
							<a href='<?php echo site_url("user/apply_lowongan/".$l->id.""); ?>' class='btn btn-danger'>apply</a>
						<?php }else{
							echo "<span class='label label-success'>Sudah dilamar</span>";
						}
						?>
						</td>
						
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="panel-footer">

		</div>
	</div>
</div>