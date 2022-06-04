//Selected Main categorgy Deleter
//job delete
$(".job_deleter").click(function(){
	var con = confirm("Are you sure you want to delete..");
	if(con==true){	
		var $job_id=$(this).attr("id");
		var row_id="row"+$job_id;
		if($job_id!="" && $job_id.match(/^[0-9]+$/)){
			$.ajax({
				url:"job_process.php",
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

$('.categoryAutocomplete').autocomplete({
  source:"autocomplete_category_search.php" 
})

$('.locationAutocomplete').autocomplete({
  source:"autocomplete_location_search.php" 
})

$('.pincodeAutocomplete').autocomplete({
  source:"autocomplete_pincode_search.php" 
})

$(".locationAutocomplete").autocomplete({
  source: function(request, response) {
    $.getJSON("autocomplete_location_search.php", { query:$(".categoryAutocomplete").val(), term:request.term}, 
              response);
  },
  minLength: 1,
  select: function(event, ui){
    //action
  }
});

$(".pincodeAutocomplete").autocomplete({
  source: function(request, response) {
    $.getJSON("autocomplete_pincode_search.php", { query:$(".categoryAutocomplete").val(), term:request.term}, 
              response);
  },
  minLength: 1,
  select: function(event, ui){
    //action
  }
});


$(".jobType_filter").change(function(){
	var msg=$(this).prop( "checked" );
	var job_type=$(this).attr("id");
	var split = job_type.split("$");
	var city=split[1];
	var val = [];
        $(':checkbox:checked').each(function(i){
          //val[i] = $(this).attr("id");
          var experience_id = $(this).attr("id");
          var fill = experience_id.split("$");
          val[i]=fill[0];
     });

     if(val.length==0){
     	$(".reload_block").html("");
     	$(".reload_block").append('<div class="col-md-4"><h3 style="color:red">Data Not Found </h3></div>');
     	return false;
     }
		if(job_type){
			$.ajax({
				method:"POST",
				url:"filter_by_JobType.php",
				data:{"jobType_name":val,"city_name":city,"msg":msg},
				dataType:"json",
				success:function(res){
					if(res){
					$(".reload_block").html("");
					for(var i=0;i<res.length;i++){
						$.each(res[i], function( index, value ) {
							if(value.contra_photo==""){
						        $(".reload_block").append('<div class="col-md-4"><a href="contractor-profile.php?id='+$.base64.encode(value.contra_id)+'"><div class="dev-profile"><div class="profile-img"><img src="assets/images/default.png" width="60"/></div><div class="profile-desti"><h3>'+value.contra_name+'</h3><p>'+value.contra_expertise+'</p></div><div class="profile-detail"><p><i class="fa fa-map-marker-alt"></i> <strong>'+value.contra_zone+'</strong></p><p><i class="fa fa-briefcase"></i> '+value.contra_specialize+'</p><p><i class="fa fa-clock"></i> '+value.contra_experience+'</p></div></div></div></a></div>');
						    }else{
						    	$(".reload_block").append('<div class="col-md-4"><a href="contractor-profile.php?id='+$.base64.encode(value.contra_id)+'"><div class="dev-profile"><div class="profile-img"><img src="admin/images/profile/'+value.contra_photo+'" width="60"/></div><div class="profile-desti"><h3>'+value.contra_name+'</h3><p>'+value.contra_expertise+'</p></div><div class="profile-detail"><p><i class="fa fa-map-marker-alt"></i> <strong>'+value.contra_zone+'</strong></p><p><i class="fa fa-briefcase"></i> '+value.contra_specialize+'</p><p><i class="fa fa-clock"></i> '+value.contra_experience+'</p></div></div></div></a></div>');
						    }
						})  
					}
				}else{
					$(".reload_block").html("");
					$(".reload_block").append('<div class="col-md-4"><h3 style="color:red">Data Not Found </h3></div>');
					}
				}
			});				
		}
	})