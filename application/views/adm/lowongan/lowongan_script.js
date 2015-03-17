
$(document).ready(function(){
	
	$('#datatables').DataTable();

	$(".edit").click(function(){


		$("#modal_edit").find(".modal-body").find("#nama_edit").val($(this).data('nama'));
		$("#modal_edit").find(".modal-body").find("#kode_lowongan_edit").val($(this).data('kode_lowongan'));
		$("#modal_edit").find(".modal-body").find("#deskripsi_edit").val($(this).data('deskripsi'));

		$("#modal_edit").find(".modal-body").find("#berakhir_edit").val($(this).data('berakhir'));

		$("#modal_edit").find(".modal-body").find("#id_edit").val($(this).data('id'));
		$("#modal_edit").find(".modal-body").find("#min_pendidikan").val($(this).data('min_pendidikan'));
		$("#modal_edit").find(".modal-body").find("#min_usia").val($(this).data('min_usia'));
		$("#modal_edit").find(".modal-body").find("#min_ipk").val($(this).data('min_ipk'));
		
		
	});

	$("input[name='berakhir']").datepicker({
		dateFormat:"yy-mm-dd"
	});

});
