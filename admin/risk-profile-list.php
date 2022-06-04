<?php 
include("../autoLoader.php");
$obj = new Controller;
$obj->security_guard();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Stock Benefits | Enquiry List</title>
	<!-- Stylesheet -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
	<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli:400,600,600,700' type='text/css' media='all' />
	<link rel="stylesheet" href="assets/css/animate.css" type="text/css">
	<link rel="stylesheet" href="assets/css/animations.css" type="text/css">
	<link rel="stylesheet" href="assets/css/docs.theme.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<!-- Font Icons -->
	<link href="assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
	<link href="assets/plugins/iconfonts/icons.css" rel="stylesheet" />
	<link href="assets/plugins/fontawesome-free/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/feature-icon.css"/>
	<style>
	    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="sidebar">
		    <h4 class="text-center text-white">Stock Benefits</h4>
			<?php include'sidebar.php';?>
		</div>
		<div class="content-right">
			<?php include'header.php';?>
			<div class="main-content">
				<?php include 'wallet-amt.php'; ?>
				<div class="dash-block">
					<h5 class="border-bottom pb-3">All Risk Profile</h5>
					<div class="form-element mt-2">
					<?php	
					$res = $obj->fetch_all("risk_profile",array("*"),"DESC");
					if($res==true){	?>
						<div class="table-responsive">
						<table class="table table-bordered" id="example" style="width:100%">
						<thead>    
							<tr>
								<th>S.No.</th>
								<th>Created On</th>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile No.</th>
							    <th>Status</th>	
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sno = 1;
								foreach($res as $row){?>
								<tr>
								<td><?=$sno++?></td>
								<td><?=$row->created?></td>
								<td><?=$row->name?></td>
								<td><?=$row->email?></td>
								<td><?=$row->mobile?></td>
								<td><label class="switch">
                                  <input type="checkbox" <?php if($row->status==1){ echo 'checked'; }?> class="user_status" id="<?=$row->id?>">
                                  <span class="slider round"></span>
                                </label>
                                </td>
								<td><a href="#" data-toggle="modal" data-target=".user-detail-full<?=$row->id?>" class="view-det view-full-det"><i class="fe fe-eye text-info"></i>
								<label class="badge badge-success">View</label></a>
								
								<div class="modal fade user-detail-full<?=$row->id?>">
                            		<div class="modal-dialog modal-lg">
                            			<div class="modal-content">
                            				<div class="modal-header">
                            					<h5 class="modal-title">User Detail</h5>
                            					<button class="close" data-dismiss="modal">&times;</button>
                            				</div>
                            				<div class="modal-body">
                            					<div class="table-responsive">
                            					    <table class="table table-bordered ">
                            					        <tr>
                            					            <td>Name</td>
                            					            <td><?=$row->name?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Email</td>
                            					            <td><?=$row->email?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Phone</td>
                            					            <td><?=$row->mobile?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Pan Number</td>
                            					            <td><?=$row->pan?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Date of Birth</td>
                            					            <td><?=$row->dob?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Age Group</td>
                            					            <td><?=$row->age_group?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>What is total no of years exoerience -in stock market</td>
                            					            <td><?=$row->experience?></td>
                            					        </tr>
                            					         <tr>
                            					            <td>Interested In</td>
                            					            <td><?=$row->interested?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Investment/trading goal</td>
                            					            <td><?=$row->trading_goal?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Investment/trading amount</td>
                            					            <td><?=$row->trading_amount?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Preferred Investment/trading type</td>
                            					            <td><?=$row->trading_type?></td>
                            					        </tr>
                            					         <tr>
                            					            <td>Annual Income</td>
                            					            <td><?=$row->annual_income?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Source of Income</td>
                            					            <td><?=$row->income_source?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Earning Persons in Family</td>
                            					            <td><?=$row->earning_person?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Number of Dependents in Family</td>
                            					            <td><?=$row->dependent_family?></td>
                            					        </tr>
                            					         <tr>
                            					            <td>Size of Emergency Fund</td>
                            					            <td><?=$row->emergency_fund?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Existing Investment</td>
                            					            <td><?=$row->existing_investment?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Total Existing Investment</td>
                            					            <td><?=$row->total_exist_investment?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Preferred Segment</td>
                            					            <td><?=$row->preferred_segment?></td>
                            					        </tr>
                            					         <tr>
                            					            <td>Marking it clear market has unlimited risk, your risk tolerance ratio</td>
                            					            <td><?=$row->risk_tolerance?></td>
                            					        </tr>
                            					         <tr>
                            					            <td>What is your preference low risk low return or high risk high return</td>
                            					            <td><?=$row->preference?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Adhaar Card</td>
                            					            <td><a href="../uploads/adhaar/<?=$row->adhaar_card?>" download><img src="../uploads/adhaar/<?=$row->adhaar_card?>" width="100px">Download</a></td>
                            					        </tr>
                            					        <tr>
                            					            <td>PAN Card</td>
                            					            <td><a href="../uploads/pan/<?=$row->pan_card?>" download><img src="../uploads/pan/<?=$row->pan_card?>" width="100px">Download</td>
                            					        </tr>
                            					    </table>
                            					</div>
                            				</div>
                            			</div>
                            		</div>
                            	</div>
								</td>
								
							
							</tr>	
							<?php }
							
							?>
						</body>	
						</table>
						</div>
						<?php 
							}else{
								echo '<h3 style="color:red">Data Not Found</h3>';
							}
						?>
					</div>
				</div>
			</div>
			<?php include'footer.php';?>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/select2.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script src='assets/js/css3-animate-it.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
  	$('#example').DataTable();
});
</script>
<script type="text/javascript">
$(".user_status").change(function() {
	var isChecked=$(this).prop("checked");
	var slider_id=$(this).attr("id");
	if(isChecked){
	$.ajax({
		url:"user-status-ajax.php",
		method:"post",
		data:{"user_id_for_status":slider_id,"status":1},
		success: function(res){//for response
			alert("True");
			}
		});
	}else{
		$.ajax({
		url:"user-status-ajax.php",
		method:"post",
		data:{"user_id_for_status":slider_id,"status":0},
		success: function(res){//for response
			alert("True");
			}
		});
	}	
});
</script>
</body>
</html>

