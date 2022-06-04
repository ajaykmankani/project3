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
					<h5 class="border-bottom pb-3">All Enquiry</h5>
					<div class="form-element mt-2">
					<?php	
					$res = $obj->fetch_all("support",array("*"),"DESC");
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
								<th>Subject</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
								$sno = 1;
								foreach($res as $row){
									if($row->status==1){?>
								<tr>
								<td><?=$sno++?></td>
								<td><?=$row->created?></td>
								<td><?=$row->name?></td>
								<td><?=$row->email?></td>
								<td><?=$row->phone?></td>
								<td><?=$row->subject?></td>
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
                            					            <td><?=$row->phone?></td>
                            					        </tr>
                            					         <tr>
                            					            <td>Subject</td>
                            					            <td><?=$row->subject?></td>
                            					        </tr>
                            					        <tr>
                            					            <td>Message</td>
                            					            <td><?=$row->message?></td>
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
							}
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
</body>
</html>

