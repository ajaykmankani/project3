// JavaScript Document
$(function(){
	$(".err").css({"color":"rgba(244,64,115,1.00)"});
	$("#admin_login_form").submit(function(event){
		event.preventDefault(); //stop default action of an element from happening.
		$.ajax({
			type:"POST",
			url:"login_process.php",
			dataType:"json",
			data:$("#admin_login_form").serialize(),
			success:function(res){
					if(res.status=="true"){
					  $("#success").html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><span>'+res.success+'</span></div>');
					  setTimeout(function(){
						 window.location.href="dashboard.php"; 
						  },2000);
					}else{
						
					  $("#err_user").html(res.err_u);
					  $("#err_pwd").html(res.err_pwd);
					  	 if(res.status=="every_err"){
							var msg='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><span>'+res.fail+'</span></div>';
							$("#alert").html(msg);
							window.setTimeout(function() {
								 $(".alert").fadeTo(400, 0).slideUp(400, function(){
									$(this).remove(); 
								});
							
							}, 1000);
						 }
					}
				
				},
			error:function(){
				
				alert("Internal Problem!!");
				}
		});
		
	});
	
});


 