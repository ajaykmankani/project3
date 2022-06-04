<?php
include("../autoLoader.php");
$obj = new Controller;

$msg="";
if(isset($_POST['Update'])){
  $old_pwd=sha1("end2021".$obj->cleaner($_POST["old_pwd"]));
  $new_pwd=$obj->cleaner($_POST["new_pwd"]);
  $r_pwd=$obj->cleaner($_POST["r_pwd"]);

  $res=$obj->fetch_where("admin",array("pwd"),array("id"=>$_SESSION["id"]));
  foreach($res as $row){
      $pwd=$row->pwd;
  }

 if((!empty($old_pwd)) && (!empty($new_pwd)) && (!empty($r_pwd))){

      if($new_pwd==$r_pwd){
        		
         if($old_pwd==$pwd){
         	if($obj->update_data("admin",array("pwd"=>sha1("end2021".$new_pwd)),array("id"=>$_SESSION["id"]))){
               $msg="<div class='alert alert-success'><span><b>Success! </b>Update Successfully</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>";
            }
         }else{
            $msg="<div class='alert alert-danger'><span><b>Error! </b>Incorrect Current Password</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>";  
         }
      }else{
            $msg="<div class='alert alert-danger'><span><b>Error! </b>New Password & Confirm Password Does Not Match</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>";
      }
   }else{
       $msg="<div class='alert alert-danger'><span><b>Error! </b>All Filled Mandatory</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>";
   }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Stock Benefits | Change Password</title>
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
				<div class="dash-block">
					<h5 class="border-bottom pb-3">Category</h5>
					<div class="form-element">
						<div class="row">
							<div class="col-md-8">
								<?=$msg?>
								<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-4 col-form-label">Category</label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control" id="confirm_pwd" placeholder="Type confirm new password" name="name">
								      <button class="btn btn-submit mt-4" type="submit" name="Update">Save Changes</button>
								    </div>
								</div>
								</form>
							</div>
						</div>
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
<script type="text/javascript">
window.setTimeout(function() {
	$(".alert").fadeTo(400, 0).slideUp(400, function(){
		$(this).remove(); 
	});
}, 2000);
</script>
</body>
</html>

