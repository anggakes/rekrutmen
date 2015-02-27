$(function(){
	$(".datepicker").datepicker({'format':'yyyy-mm-dd'});

	var kelamin = "{kelamin}";
	var agama = "{agama}";

	$("select[name=jenis_kelamin] option").each(function(){
		if ( $(this).val() == kelamin ) {
			$(this).prop('selected',true);
		};
	});

	$("select[name=agama] option").each(function(){
		if ( $(this).val() == agama ) {
			$(this).prop('selected',true);
		};
	});


});