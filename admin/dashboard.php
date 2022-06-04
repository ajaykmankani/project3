<?php
include("../autoLoader.php");
$obj = new Controller;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Stock Benefits || Dashboard</title>
	<!-- Stylesheet -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
	<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli:400,600,600,700' type='text/css' media='all' />
	<link rel="stylesheet" href="assets/css/animate.css')?>" type="text/css">
	<link rel="stylesheet" href="assets/css/animations.css')?>" type="text/css">
	<link rel="stylesheet" href="assets/css/docs.theme.min.css')?>">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css')?>"/>

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
			<?php include('sidebar.php');?>
		</div>
		<div class="content-right">
			<?php include('header.php');?>
			<div class="main-content">
				<div class="dash-block">
					<div class="row">
						<div class="col-md-4">
							<div class="dash-item bg-success z-depath-1 mt-2">
							    <h3>Total Enquiry</h3>
								<h4><?=$obj->totalrowCount("enquiry",array("id"))?></h4>
							</div>
						</div>
						<div class="col-md-4">
							<div class="dash-item bg-info z-depath-1 mt-2">
							    <h3>Total Support</h3>
								<h4><?=$obj->totalrowCount("support",array("id"))?></h4>
							</div>
						</div>
						</div>
					<hr/>
				</div>
			</div>
			<?php include('footer');?>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/select2.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
</body>
</html>

