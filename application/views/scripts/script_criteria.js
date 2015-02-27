$(function(){


	$(".hapus").click(function(evt){
		evt.preventDefault();

		var kode = $(this).data('kode');
		var url = $(this).attr('href');

		$("#deleteModal").modal("show");

		$("#btn-ya").click(function(evtx){
			evtx.preventDefault();
			$.get(url,function(data){
				$("#deleteModal").modal("hide");
				setInterval(function(){
					window.location.href = "<?php site_url('administrasi/kriteria') ?>";
				},800);
			});
		})

	});

});