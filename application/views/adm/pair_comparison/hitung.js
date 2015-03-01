$(function(){

var ri = <?php echo $ri->nilai; ?>;
var n = <?php echo count($kriteria); ?>;
var baris = [<?php
$baris=''; 
foreach($kriteria as $k){
	$baris.= "$k->id_kriteria, ";
}
$baris = substr($baris,0,-2);
echo $baris;
?>];
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
		hitungHasil();
		hitungCr();
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

		hitung_jumlah_matrik(baris,kolom);
	}

	function hitung_jumlah_matrik(baris,kolom){
		var jumlah=0;

		$('.matrik_'+baris).each(function(){
			var nilai = $(this).html();
			jumlah += parseFloat(nilai);
		});

		$("#jumlah_matrik_"+baris).html(jumlah.toFixed(2));

		var prioritas = jumlah.toFixed(2)/n;
		$("#prioritas_matrik_"+baris).val(prioritas.toFixed(2));

}

function hitungHasil(){
	baris.forEach(function(entry){
	var hasil =0;
	$('.matrik_'+entry).each(function(){
		var baris =$(this).data('baris');
		var kolom=$(this).data('kolom'); 
		var nilai = $(this).html();
		var nilai_pb = parseFloat($('#'+baris+"_"+kolom).val());
			var l = nilai*nilai_pb;
			console.log("l "+baris+"-"+kolom+" :"+l);
			console.log("nilai pb :"+nilai_pb);
			hasil += parseFloat(l); 

	});
	console.log("hasil"+entry+":"+hasil);
	var hm = parseFloat(hasil)+parseFloat($("#prioritas_matrik_"+entry).val());
	$("#hasil_matrik_"+entry).html(hm.toFixed(4));
	
	});
}

 function hitungCr(){
	var total =0;
	$(".hasil_matrik").each(function(){
		var nilai = $(this).html();
		total += parseFloat(nilai);
	});

	$("#total_hasil_matrik").html(total.toFixed(2));

	var cr = CI(total,n)/ri;

	$('.cr').html(cr);
	
	$(".kesimpulan").find("span").removeClass('label-success');
	$(".kesimpulan").find("span").removeClass('label-alert');

	if(cr<0.1 && isFinite(cr) ){
		$(".kesimpulan").find("span").addClass('label-success').html("DAPAT DITERIMA");
		$("input[type='submit']").removeAttr("disabled");
	}else{
		$(".kesimpulan").find("span").addClass('label-danger').html("TIDAK DAPAT DITERIMA");
		$('input[type="submit"]').attr("disabled","disabled");
	}

}

function lamda_max(jumlah,n){
	var hasil = jumlah/n;
	return hasil;
}

function CI(jumlah,n){
	var hasil = (lamda_max(jumlah,n)-n)/n;
	return hasil;
}

/* jumlahkan semua kriteria saat awal loading  */
jumlah();

hitungHasil();
hitungCr();

});