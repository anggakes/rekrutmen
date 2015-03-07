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
		border-top:1px solid #000;
	}

	td{
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
				<center>
<h3>Biodata</h3><hr>
		<table class='table table-striped' style='width:80%;margin:15px' id='datatables'>
					<tr><td style='font-weight:bold'>No Peserta</td><td>:</td><td>  <?php echo $peserta->no_peserta?></td></tr>
<tr><td style='font-weight:bold'>Nama </td><td>:</td><td>  <?php echo $peserta->nama_peserta?></td></tr>
<tr><td style='font-weight:bold'>Tempat, Tanggal Lahir</td><td>: </td><td> <?php echo $peserta->tempat_lahir.", ".$peserta->tgl_lahir ?></td></tr>
<tr><td style='font-weight:bold'>Jenis Kelamin</td><td>:</td><td>  <?php echo $peserta->jenis_kelamin?></td></tr>
<tr><td style='font-weight:bold'>Agama</td><td>:</td><td>  <?php echo $peserta->agama?></td></tr>
<tr><td style='font-weight:bold'>Alamat</td><td>: </td><td> <?php echo $peserta->alamat?></td></tr>
<tr><td style='font-weight:bold'>Kontak</td><td>: </td><td> <?php echo $peserta->no_telp." / ".$peserta->no_hp?></td></tr>
<tr><td style='font-weight:bold'>Warga Negara</td><td>: </td><td> <?php echo $peserta->warga_negara?></td></tr>
<tr><td style='font-weight:bold'>Email</td><td>: </td><td> <?php echo $peserta->email?></td></tr>
<tr><td style='font-weight:bold'>Tinggi Badan</td><td>: </td><td> <?php echo $peserta->tinggi_badan?> cm</td></tr>
<tr><td style='font-weight:bold'>Berat Badan</td><td>: </td><td> <?php echo $peserta->berat_badan?> kg</td></tr>
<tr><td style='font-weight:bold'>Hobi</td><td>: </td><td> <?php echo $peserta->hobby?></td></tr>

					</table>

<h3>Pendidikan</h3><hr>
		<table class='table table-striped' style='width:80%;margin:15px' id='datatables'>
<tr><td style='font-weight:bold'>Jenjang</td><td>:</td><td>  <?php echo $peserta->pendidikan?></td></tr>
<tr><td style='font-weight:bold'>jenjang </td><td>:</td><td>  <?php echo $peserta->institusi?></td></tr>
<tr><td style='font-weight:bold'>Jurusan</td><td>: </td><td> <?php echo $peserta->jurusan?></td></tr>
<tr><td style='font-weight:bold'>IPK</td><td>:</td><td>  <?php echo $peserta->IPK?></td></tr>
<tr><td style='font-weight:bold'>Tahun Masuk</td><td>: </td><td> <?php echo $peserta->tahun_masuk?></td></tr>
<tr><td style='font-weight:bold'>Tahun Lulus</td><td>: </td><td> <?php echo $peserta->tahun_ijazah?></td></tr>
<tr><td style='font-weight:bold'>Lama</td><td>: </td><td> <?php echo $peserta->lama_pendidikan?></td></tr>
					</table>
				</center>
</body>
</html>