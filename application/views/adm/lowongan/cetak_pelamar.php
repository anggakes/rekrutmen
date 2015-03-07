<html>
<head>
	<script type="text/javascript">
		window.print();
	</script>
	<style>
	body{
		text-align: center;
	}
	table {
    border-collapse: collapse;
    margin:0px auto;
	}
	table, th, td{
		border:1px solid #000;
	}

	td{
		width:100px;
		text-align: center;
	}

	thead tr{
		background:#c0c0c0;
		height:40px;
	}

	h3{	
		margin-top: 100px;
	}
	</style>
</head>
<body>

	<h3>Daftar Peserta<br> <?php echo $lowongan->kode_lowongan." - ".$lowongan->nama?>

	</h3>
	<table class='table table-bordered' id='datatables'>
						<thead>
						<tr>
							<td>Peringkat</td>
							<td>No Peserta</td>
							<td style='width:150px'>Nama</td>
							<td>Tanggal Lahir</td>
							
						</tr>
						</thead>
						<tbody>
							<?php
$i=1;
foreach ($peserta as $l) {
	echo "<tr>";
	echo "
		<td>".$i."</td>
		<td>".$l->no_peserta."</td>
		<td>".$l->nama_peserta."</td>
		<td>".$l->tgl_lahir."</td>
		
	"; 
	echo "</tr>";
	$i++;
}


							?>
						</tbody>


					</table>
</body>
</html>