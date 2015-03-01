<?php
	
	/* Pisahkan dulu sub dan kriterianya */



?>		

				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Kriteria dan Sub Kriteria</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
					<h2>Tabel Prioritas</h2><hr>	

<style type="text/css">
	td {
		text-align: center;
		vertical-align: middle;
	}
</style>

					<table class='table table-bordered'>
						<thead>
						<?php 
						$k='<tr>';
						$sk='<tr>';
							foreach($prioritas as $p){
								if($p->parent_kriteria==NULL){
									$k.="<td style='text-align:center;vertical-align:middle;'";
									if($p->banyak>0){
										$k .= "colspan='".$p->banyak."'";
									}else{
										$k .= "rowspan='2'";
									}
									$k.=">".$p->nama."</td>";
								}else{
									$sk.="<td>".$p->nama."</td>";
								
								}
								
							}
						$k.="</tr>";
						$sk.="</tr>";
						echo $k;
						echo $sk;
						?>
						
						</thead>
						<tbody>
							<tr>
							<?php
								foreach($prioritas as $p){
									if($p->parent_kriteria==null){

										if($p->banyak<1){
											echo "<td>".$p->nilai."</td>";	
										}else{
											foreach ($prioritas as $value) {
												if($value->parent_kriteria==$p->id_kriteria){
													echo "<td>".$value->nilai."</td>";	
									
												}
											}
										}
									}
									
								}
							?>
						</tr>
						</tbody>
					</table>
    
					</div>
				</div><!--/span-->