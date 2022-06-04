<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Stock Benefits ! Admin Login</title>
	<!-- Stylesheet -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
	<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli:400,600,600,700' type='text/css' media='all' />
	<link rel="stylesheet" href="assets/css/animate.css" type="text/css">
	<link rel="stylesheet" href="assets/css/animations.css" type="text/css">
	<link rel="stylesheet" href="assets/css/docs.theme.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css"/>

	<!-- Font Icons -->
	<link href="assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
	<link href="assets/plugins/iconfonts/icons.css" rel="stylesheet" />
	<link href="assets/plugins/fontawesome-free/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/feature-icon.css"/>
</head>
<body class="login-page">
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="login-block">
						<h4>Admin Login</h4>
						<hr/>
						 <div id="success"></div>
                        <div id="alert"></div>
						<form id="admin_login_form">
						<div class="form-group mt-5 row">
						    <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
						    <div class="col-sm-9">
						      <input type="email" class="form-control" id="username" name="email" placeholder="example@gmail.com">
						      <span class="err" id="err_user"></span>
						    </div>
						    
						</div>
						<div class="form-group row">
						    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
						    <div class="col-sm-9">
						      <input type="password" class="form-control" id="pass" placeholder="******" name="pwd">
						      <span class="err" id="err_pwd"></span>
						    </div>
						    <div class="col-md-4 offset-md-3">
						    	<button class="btn btn-login">Login</button>
						    </div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<script src="assets/js/admin_login.js"></script>
<script type="text/javascript">
window.setTimeout(function() {
    $(".alert").fadeTo(400, 0).slideUp(400, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
</body>
</html>