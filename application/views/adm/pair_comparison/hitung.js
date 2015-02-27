$(function(){
	var kriteria = [
		<?php 
		$tampil ='';
		foreach($kriteria as $k){
			$tampil.="'$k->nama_kriteria', ";
		}
		$tampil = substr($tampil,0,-2);
		echo $tampil
		?>
	];

/* 
|	Fungsi untuk mengecek perubahan pada kolom 
|	Jika ada perubahan maka jumlahkan lagi kolom
*/
	function reverse(val){
		var arr = [9,8,7,6,5,4,3,2,1,0.5,0.33,0.25,0.2,0.17,0.14,0.13,0.11];
		val = parseFloat(val);
		var pos=$.inArray(val,arr); //cek index dari val nya
		var kebalikan = 16-pos;

		return arr[kebalikan];
	}

	$('.perbandingan').change(function(){
		var kolom = $(this).data('kolom');//43
		var baris = $(this).data('baris');//42
		$('#'+kolom+"_"+baris).val(reverse($('#'+baris+"_"+kolom).val()));//42_43
		
		jumlah();
	});

/* 
| 	fungsi menjumlah kan baris 
|	k adalah nama barisnya didapat dari data('baris')
*/

	function jumlah(){
		$('.perbandingan').each(function(){
			var kolom = $(this).data('kolom');
			var baris = $(this).data('baris');
			
			hitung_jumlah(kolom);
			hitung_prioritas(baris,kolom);
			
		});
	}

/* untuk menghitung  */
	function hitung_jumlah(kolom){
		var jumlah =0;
		$("."+kolom+"_val").each(function(){
			var nilai = $(this).val();
			jumlah += parseFloat(nilai);
		});
			$("#jumlah_"+kolom).val(jumlah.toFixed(2));
	}

	function hitung_prioritas(baris,kolom){
		var nilai_lama = $('#'+baris+'_'+kolom).val();
		var jumlah_lama = $("#jumlah_"+kolom).val();
		var sum= nilai_lama/jumlah_lama;
		$('#matrik_'+baris+'_'+kolom).html(sum.toFixed(2));

		hitung_jumlah_matrik(baris);
	}

	function hitung_jumlah_matrik(baris){
		var jumlah=0;
		var n =0;
		$('.matrik_'+baris).each(function(){
			var nilai = $(this).html();
			jumlah += parseFloat(nilai);
			n++;
		});
		$("#jumlah_matrik_"+baris).html(jumlah.toFixed(2));

		var prioritas = jumlah.toFixed(2)/n;
		$("#prioritas_matrik_"+baris).val(prioritas.toFixed(2));
	}


/* jumlahkan semua kriteria saat awal loading  */
jumlah();
	



});