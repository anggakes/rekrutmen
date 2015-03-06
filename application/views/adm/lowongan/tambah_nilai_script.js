
$(document).ready(function(){


	$('#datatables').DataTable();

	var peserta = [
		<?php
			$psrt = '';
			foreach($peserta as $p){
				$psrt.= "'".$p->no_peserta." - ".$p->nama_peserta."',";
			}
			$psrt= substr($psrt,0,-1);
			echo $psrt;
		?>
	];
	$("input[name='no_peserta']").autocomplete({
		source: peserta
	});

	$(".pilih").click(function(e){
		e.preventDefault();
		$("input[name='no_peserta']").val($(this).data("value"));
		
	});

});