$(function(){

	var alert = "<div id='alertku' class='alert alert-success alert-dismissible' role='alert'>"+
			  "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+
			  "<strong id='status'>Warning!</strong> <p id='messages'></p>"+
			"</div>";

	

	$("form#ubahEmail").submit(function(e){
		
		e.preventDefault();

		var method 		= $(this).attr("method");
		var action 		= $(this).attr("action");
		var email 		= $("input[name=email_baru]").val();
		var password 	= $("input[name=password_email").val();

		$.ajax({
			url : action,
			type : "POST",
			data : {"email_baru":email,"password_email":password},
			dataType : 'json',
			success: function(res){
				$("#resultEmail").html( alert );
				if( res.status == "success" ){
					$("#alertku").removeClass("alert-danger");
					$("#alertku").addClass("alert-success");
					$("#alertku").find("#status").html("Berhasil!");
					$("#alertku").find("#messages").html( res.messages );
					$("#alertku").slideDown();
			   		setInterval(function(){
			   			window.location.href = "<?php echo site_url('karir'); ?>";
			   		},1000);
				}else{
					$("#alertku").removeClass("alert-success");
					$("#alertku").addClass("alert-danger");
					$("#alertku").find("#status").html("Gagal!");
					$("#alertku").find("#messages").html( res.messages );
					$("#alertku").show();					
				}

			}
		});

	});

	$("form#ubahPassword").submit(function(e){
		
		e.preventDefault();

		var method 			= $(this).attr("method");
		var action 			= $(this).attr("action");
		var password_lama	= $("input[name=password_lama]").val();
		var password_baru	= $("input[name=password_baru").val();

		$.ajax({
			url : action,
			type : "POST",
			data : {"password_baru":password_baru,"password_lama":password_lama},
			dataType : 'json',
			success: function(res){
				$("#resultPassword").html( alert );
				if( res.status == "success" ){
					$("#alertku").removeClass("alert-danger");
					$("#alertku").addClass("alert-success");
					$("#alertku").find("#status").html("Berhasil!");
					$("#alertku").find("#messages").html( res.messages );
					$("#alertku").slideDown();
			   		setInterval(function(){
			   			window.location.href = "<?php echo site_url('karir'); ?>";
			   		},1000);
				}else{
					$("#alertku").removeClass("alert-success");
					$("#alertku").addClass("alert-danger");
					$("#alertku").find("#status").html("Gagal!");
					$("#alertku").find("#messages").html( res.messages );
					$("#alertku").show();					
				}

			}
		});

	});

});