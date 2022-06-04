// JavaScript Document

$(function(){
	$("#checkbox").click(function(){
		if($('input:checkbox').prop('checked')){
		
		$('input:checkbox').prop('checked',true);

		} else{

		$('input:checkbox').prop('checked',false);	
		}
	});
});


//Data Load for Category Edit
$(".category_input_loader").click(function(){
	var cat_id=$(this).attr('id');
	$.ajax({
		method:"POST",
		url:"category_process.php",
		dataType:"json",
		data:{"cat_id_for_data_load":cat_id},
		success:function(res){
			$("#cat_name_visible").val(res.name);
			$("#cat_name_hidden").val(res.name);	
		}
	})
});

//Main Category Update Process
$("#category_update").submit(function(ev){
	ev.preventDefault();
	var old_cat_name=$("#cat_name_hidden").val();
	var new_cat_name=$("#cat_name_visible").val();
	$.ajax({
		method:"POST",
		url:"category_process.php",
		data:$(this).serialize(),
		success:function(res){
			if(res=='1'){
				$("#category_edit_modal").modal('hide');//hide modal
				$("table tbody tr").each(function() {
					$(this).find("td:eq(2)").each(function() {
						if($(this).text()==old_cat_name.toUpperCase()){
						$(this).text(new_cat_name.toUpperCase());
						}
					});
				});
					
			}
		}
	});
});


$(".category_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $cat_id=$(this).attr("id");
		var row_id="row"+$cat_id;
		if($cat_id!="" && $cat_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"category_process.php",
				method:"POST",
				data:{"cat_id":$cat_id},
				success:function(res){
					var response=res.trim();
					if(response==1){
						$("#"+row_id).remove();
					}
				}
			});	
		}
	}else{
		alert("your selected can not deleted..");
		return false;
	}
});

//Selected Main categorgy Deleter
$('#categoryFormDelete').submit(function(e){
	var con = confirm("Are you sure you want to Selected delete..");
	if(con==true){	
	e.preventDefault();
		$.ajax({
		 method:"POST",
		 url:"category_process.php",
		 dataType:"json",
		 data:$(this).serialize(),
		 success:function(res){
			if(res!=null){
					for(i=0;i<res.length;i++){
						 $("#row"+res[i]).remove();	
					}
				}
			 }
		 })
		}else{
			alert("your selected can not deleted..");
			return false;
		}
	});


//Data Load for Edit Specialization		
$(".specialization_input_loader").click(function(){
	var spec_id=$(this).attr('id');
	$.ajax({
		method:"POST",
		url:"specialization_process.php",
		dataType:"json",
		data:{"spec_id_for_data_load":spec_id},
		success:function(res){
			$("#spec_name_visible").val(res.name);
			$("#spec_name_hidden").val(res.name);	
		}
	})
});

//Specialization Update Process
$("#specialization_update").submit(function(ev){
	ev.preventDefault();
	var old_spec_name=$("#spec_name_hidden").val();
	var new_spec_name=$("#spec_name_visible").val();
	$.ajax({
		method:"POST",
		url:"specialization_process.php",
		data:$(this).serialize(),
		success:function(res){
			if(res=='1'){
				$("#specialization_edit_modal").modal('hide');//hide modal
				$("table tbody tr").each(function() {
					$(this).find("td:eq(2)").each(function() {
						if($(this).text()==old_spec_name.toUpperCase()){
						$(this).text(new_spec_name.toUpperCase());
						}
					});
				});
					
			}
		}
	});
});


$(".specialization_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $spec_id=$(this).attr("id");
		var row_id="row"+$spec_id;
		if($spec_id!="" && $spec_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"specialization_process.php",
				method:"POST",
				data:{"spec_id":$spec_id},
				success:function(res){
					var response=res.trim();
					if(response==1){
						$("#"+row_id).remove();
					}
				}
			});	
		}
	}else{
		alert("your selected can not deleted..");
		return false;
	}
});

//Selected Speciization Deleter
$('#specializationFormDelete').submit(function(e){
	var con = confirm("Are you sure you want to Selected delete..");
	if(con==true){	
		e.preventDefault();
		$.ajax({
		 method:"POST",
		 url:"specialization_process.php",
		 dataType:"json",
		 data:$(this).serialize(),
		 success:function(res){
			if(res!=null){
					for(i=0;i<res.length;i++){
						 $("#row"+res[i]).remove();	
					}
				}
			 }
		 })
		}else{
			alert("your selected can not deleted..");
			return false;
		}
	});

	
//Data Load for Edit Sub Category
$(".sub_category_input_loader").click(function(){
	var sub_cate_id=$(this).attr("id");
	$.ajax({
		method:"POST",
		url:"sub_category_process.php",
		dataType:"json",
		data:{"sub_cat_id_for_data_load":sub_cate_id},
		success:function(res){
			$("#sub_cat_visible").val(res.name);
			$("#sub_cat_hidden").val(res.name);
			$("#cat_id option").removeAttr("selected");
			$("#cat_name_hidden").val(res.cat_id);
			$("#cat_id option").each(function() {
				if($(this).val()==res.cat_id){
					$(this).attr("selected","selected");
				}	
			});
		}
	});
});


//Brand Edit Process
$("#sub_category_edit_process").submit(function(e){
	e.preventDefault(); //stop the submit work
	var sub_cat_old_name=$("#sub_cat_hidden").val();
	var sub_cat_new_name=$("#sub_cat_visible").val();
	$.ajax({
		method:"POST",
		url:"sub_category_process.php",
		dataType:"json",
		data:$(this).serialize(),
		success:function(res){
			$c_n_name=res.cat_new_name.trim();
			$c_o_name=res.cat_old_name.trim().toLowerCase();
			if(res!=""){
			$("#sub_category_modal").modal('hide');//hide modal
			$("table tbody tr").each(function() {
				$(this).find("td:eq(2)").each(function() {
					if($(this).text()==sub_cat_old_name.toUpperCase()){
						$(this).text(sub_cat_new_name.toUpperCase());
						$(this).parent().find("td:eq(3)").text($c_n_name.toUpperCase());
						}
					});
					
				});    //end table concept
			
			}
		}
	})
});

$(".sub_category_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $cat_id=$(this).attr("id");
		var row_id="row"+$cat_id;
		if($cat_id!="" && $cat_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"sub_category_process.php",
				method:"POST",
				data:{"sub_cat_id":$cat_id},
				success:function(res){
					var response=res.trim();
					if(response==1){
						$("#"+row_id).remove();
					}
				}
			});	
		}
	}else{
		alert("your selected can not deleted..");
		return false;
	}
});

//Selected Main categorgy Deleter
$('#sub_categoryFormDelete').submit(function(e){
	var con = confirm("Are you sure you want to Selected delete..");
	if(con==true){	
	e.preventDefault();
		$.ajax({
		 method:"POST",
		 url:"sub_category_process.php",
		 dataType:"json",
		 data:$(this).serialize(),
		 success:function(res){
			if(res!=null){
					for(i=0;i<res.length;i++){
						 $("#row"+res[i]).remove();	
					}
				}
			 }
		 })
		}else{
			alert("your selected can not deleted..");
			return false;
		}
	});
	
	
//Data Load for Edit brand
$(".brand_input_loader").click(function(){
	var brand_id=$(this).attr("id");
	$.ajax({
		method:"POST",
		url:"brand_process.php",
		dataType:"json",
		data:{"brand_id_for_data_load":brand_id},
		success:function(res){
			$("#brand_visible").val(res.name);
			$("#brand_hidden").val(res.name);
			$("#sub_cat_id option").removeAttr("selected");
			$("#sub_cat_name_hidden").val(res.sub_cat_id);
			$("#sub_cat_id option").each(function() {
				if($(this).val()==res.sub_cat_id){
					$(this).attr("selected","selected");
				}	
			});
		}
	});
});	

//Brand Edit Process
$("#brand_edit_process").submit(function(e){
	e.preventDefault(); //stop the submit work
	var brand_old_name=$("#brand_hidden").val();
	var brand_new_name=$("#brand_visible").val();
	$.ajax({
		method:"POST",
		url:"brand_process.php",
		dataType:"json",
		data:$(this).serialize(),
		success:function(res){
			$s_c_n_name=res.sub_cat_new_name.trim();
			$s_c_o_name=res.sub_cat_old_name.trim().toLowerCase();
			if(res!=""){
			$("#brand_model").modal('hide');//hide modal
			$("table tbody tr").each(function() {
				$(this).find("td:eq(2)").each(function() {
					if($(this).text()==brand_old_name.toUpperCase()){
						$(this).text(brand_new_name.toUpperCase());
						$(this).parent().find("td:eq(3)").text($s_c_n_name.toUpperCase());
						//$(this).parent().find("td:eq(4)").text($c_n_name.toUpperCase());
						//$(this).parent().find("td:eq(5)").text($m_c_n_name.toUpperCase()).css({ 'font-weight': 'bold' });
						}
					});
					
				});    //end table concept
			
			}
		}
	})
});

//brand delete
$(".brand_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $brand_id=$(this).attr("id");
		var row_id="row"+$brand_id;
		if($brand_id!="" && $brand_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"brand_process.php",
				method:"POST",
				data:{"brand_id":$brand_id},
				success:function(res){
					var response=res.trim();
					if(response==1){
						$("#"+row_id).remove();
					}
				}
			});	
		}
	}else{
		alert("your selected can not deleted..");
		return false;
	}
});

//Selected Main categorgy Deleter
$('#brandFormDelete').submit(function(e){
	var con = confirm("Are you sure you want to Selected delete..");
	if(con==true){	
	e.preventDefault();
		$.ajax({
		 method:"POST",
		 url:"brand_process.php",
		 dataType:"json",
		 data:$(this).serialize(),
		 success:function(res){
			if(res!=null){
					for(i=0;i<res.length;i++){
						 $("#row"+res[i]).remove();	
					}
				}
			 }
		 })
		}else{
			alert("your selected can not deleted..");
			return false;
		}
	});
	
	
//Data Load for Edit Heading
$(".heading_input_loader").click(function(){
	var heading_id=$(this).attr("id");
	$.ajax({
		method:"POST",
		url:"heading_process.php",
		dataType:"json",
		data:{"heading_id_for_data_load":heading_id},
		success:function(res){
			$("#heading_visible").val(res.name);
			$("#heading_hidden").val(res.name);
			$("#sub_cat_id option").removeAttr("selected");
			$("#sub_cat_name_hidden").val(res.sub_cat_id);
			$("#sub_cat_id option").each(function() {
				if($(this).val()==res.sub_cat_id){
					$(this).attr("selected","selected");
				}	
			});
		}
	});
});	

//Brand Edit Process
$("#heading_edit_process").submit(function(e){
	e.preventDefault(); //stop the submit work
	var heading_old_name=$("#heading_hidden").val();
	var heading_new_name=$("#heading_visible").val();
	$.ajax({
		method:"POST",
		url:"heading_process.php",
		dataType:"json",
		data:$(this).serialize(),
		success:function(res){
			$s_c_n_name=res.sub_cat_new_name.trim();
			$s_c_o_name=res.sub_cat_old_name.trim().toLowerCase();
			if(res!=""){
			$("#heading_model").modal('hide');//hide modal
			$("table tbody tr").each(function() {
				$(this).find("td:eq(2)").each(function() {
					if($(this).text()==heading_old_name.toUpperCase()){
						$(this).text(heading_new_name.toUpperCase());
						$(this).parent().find("td:eq(3)").text($s_c_n_name.toUpperCase());
						}
					});
					
				});    //end table concept
			
			}
		}
	})
});

//brand delete
$(".heading_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $heading_id=$(this).attr("id");
		var row_id="row"+$heading_id;
		if($heading_id!="" && $heading_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"heading_process.php",
				method:"POST",
				data:{"heading_id":$heading_id},
				success:function(res){
					var response=res.trim();
					if(response==1){
						$("#"+row_id).remove();
					}
				}
			});	
		}
	}else{
		alert("your selected can not deleted..");
		return false;
	}
});

//Selected Main categorgy Deleter
$('#headingFormDelete').submit(function(e){
	var con = confirm("Are you sure you want to Selected delete..");
	if(con==true){	
	e.preventDefault();
		$.ajax({
		 method:"POST",
		 url:"heading_process.php",
		 dataType:"json",
		 data:$(this).serialize(),
		 success:function(res){
			if(res!=null){
					for(i=0;i<res.length;i++){
						 $("#row"+res[i]).remove();	
					}
				}
			 }
		 })
		}else{
			alert("your selected can not deleted..");
			return false;
		}
	});	
	
 
 //Product Concept
$(".get_cat_name").change(function(){
	  var id  = $(this).val();
	    $.ajax({
          url: "product_process.php",
          type: "POST",
          data: {"cat_id":id},
          success: function(data){
			  $(".get_sub_cat_name").html(data);
			 			 
          }
        });
  });
  

$(".get_sub_cat_name").change(function(){
      var id  = $(this).val();
        $.ajax({
          url: "product_process.php",
          type: "POST",
          data: {sub_cat_id:id},
          success: function(data){
			 $(".get_brand_name").html(data);
			 
          }
        });
  });
  
  
	
//product delete
$(".job_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $job_id=$(this).attr("id");
		var row_id="row"+$job_id;
		if($job_id!="" && $job_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"../job_process.php",
				method:"POST",
				data:{"job_id":$job_id},
				success:function(res){
					var response=res.trim();
					if(response==1){
						$("#"+row_id).remove();
					}
				}
			});	
		}
	}else{
		alert("your selected can not deleted..");
		return false;
	}
});

	
		

//Home slider status  change
$(".job_status").change(function() {
	var isChecked=$(this).prop("checked");
	var job_id=$(this).attr("id");
	if(isChecked){
	$.ajax({
		url:"job_status_changer.php",
		method:"post",
		data:{"job_id_for_status":job_id,"job_status":1},
		success: function(res){//for response
			alert("True");
			}
		});
	}else{
		$.ajax({
		url:"job_status_changer.php",
		method:"post",
		data:{"job_id_for_status":job_id,"job_status":0},
		success: function(res){//for response
			alert("False");
			}
		});
	}
	
});	



//Popular Blogs Status Changer
$(".popular_blog_status").change(function() {
	var isChecked=$(this).prop("checked");
	var blog_id=$(this).attr("id");
	if(isChecked){
	$.ajax({
		url:"blogs_status_changer.php",
		method:"post",
		data:{"blog_id_for_popularBlog_status":blog_id,"popularBlog_status":1},
		success: function(res){//for response
			alert("True");
			}
		});
	}else{
		$.ajax({
		url:"blogs_status_changer.php",
		method:"post",
		data:{"blog_id_for_popularBlog_status":blog_id,"popularBlog_status":0},
		success: function(res){//for response
			alert("False");
			}
		});
	}
	
});	

//Blogs Status Changer
$(".blog_status").change(function() {
	var isChecked=$(this).prop("checked");
	var blog_id=$(this).attr("id");
	if(isChecked){
	$.ajax({
		url:"blogs_status_changer.php",
		method:"post",
		data:{"blog_id_for_status":blog_id,"blog_status":1},
		success: function(res){//for response
			alert("True");
			}
		});
	}else{
		$.ajax({
		url:"blogs_status_changer.php",
		method:"post",
		data:{"blog_id_for_status":blog_id,"blog_status":0},
		success: function(res){//for response
			alert("False");
			}
		});
	}
});	

//Blogs deleter
$(".blog_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $blog_id=$(this).attr("id");
		var row_id="row"+$blog_id;
		if($blog_id!="" && $blog_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"blogs_status_changer.php",
				method:"POST",
				data:{"blog_id_for_delete":$blog_id},
				success:function(res){
					var response=res.trim();
					if(response==1){
						$("#"+row_id).remove();
					}
				}
			});	
		}
	}else{
		alert("your selected can not deleted..");
		return false;
	}
});

//Product Deleter
$('#blogsFormDelete').submit(function(e){
	var con = confirm("Are you sure you want to Selected delete..");
	if(con==true){	
	e.preventDefault();
		$.ajax({
		 method:"POST",
		 url:"blogs_status_changer.php",
		 dataType:"json",
		 data:$(this).serialize(),
		 success:function(res){
			if(res!=null){
					for(i=0;i<res.length;i++){
						 $("#row"+res[i]).remove();	
					}
				}
			 }
		 })
		}else{
			alert("your selected can not deleted..");
			return false;
		}
	});

//User Status Changer
$(".user_status").change(function() {
	var isChecked=$(this).prop("checked");
	var user_id=$(this).attr("id");
	if(isChecked){
	$.ajax({
		url:"user_status_changer.php",
		method:"post",
		data:{"user_id_for_status":user_id,"user_status":1},
		success: function(res){//for response
			alert("True");
			}
		});
	}else{
		$.ajax({
		url:"user_status_changer.php",
		method:"post",
		data:{"user_id_for_status":user_id,"user_status":0},
		success: function(res){//for response
			alert("False");
			}
		});
	}
});	

//User deleter
$(".user_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $user_id=$(this).attr("id");
		var row_id="row"+$user_id;
		if($user_id!="" && $user_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"user_status_changer.php",
				method:"POST",
				data:{"user_id_for_delete":$user_id},
				success:function(res){
					var response=res.trim();
					if(response==1){
						$("#"+row_id).remove();
					}
				}
			});	
		}
	}else{
		alert("your selected can not deleted..");
		return false;
	}
});

//Employer Status Changer
$(".employer_status").change(function() {
	var isChecked=$(this).prop("checked");
	var employer_id=$(this).attr("id");
	if(isChecked){
	$.ajax({
		url:"user_status_changer.php",
		method:"post",
		data:{"employer_id_for_status":employer_id,"employer_status":1},
		success: function(res){//for response
			alert("True");
			}
		});
	}else{
		$.ajax({
		url:"user_status_changer.php",
		method:"post",
		data:{"employer_id_for_status":employer_id,"employer_status":0},
		success: function(res){//for response
			alert("False");
			}
		});
	}
});	

//Employer deleter
$(".employer_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $employer_id=$(this).attr("id");
		var row_id="row"+$employer_id;
		if($employer_id!="" && $employer_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"user_status_changer.php",
				method:"POST",
				data:{"employer_id_for_delete":$employer_id},
				success:function(res){
					var response=res.trim();
					if(response==1){
						$("#"+row_id).remove();
					}
				}
			});	
		}
	}else{
		alert("your selected can not deleted..");
		return false;
	}
});

//Admin User deleter
$(".admin_user_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $user_id=$(this).attr("id");
		var row_id="row"+$user_id;
		if($user_id!="" && $user_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"admin_user_status_changer.php",
				method:"POST",
				data:{"admin_user_id_for_delete":$user_id},
				success:function(res){
					var response=res.trim();
					if(response==1){
						$("#"+row_id).remove();
					}
				}
			});	
		}
	}else{
		alert("your selected can not deleted..");
		return false;
	}
});