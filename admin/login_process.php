<?php 
include("../autoLoader.php");
$obj=new Controller;

    if($_SERVER['REQUEST_METHOD']=="POST"){
	$u=$obj->cleaner($_POST['email']);
	$pwd=$obj->cleaner($_POST['pwd']);

	$err_email=$err_pwd="";	
	$output="";


	if(!filter_var($u,FILTER_VALIDATE_EMAIL)){
		$err_email="Enter Correct Username";
		}else{
			$err_email ="";
		}
	
	if(strlen($pwd)<6 || strlen($pwd)>12){
			$err_pwd = "Enter password must be between 6 to 12";
		}else{
			$err_pwd ="";
		}

		
		
	if(empty($err_email) && empty($err_pwd)){
		$process=$obj->adminlogin_process("admin",$u,$pwd);
		if($process!=false){
				$output=array("status"=>"true","success"=>"Login Successfully");
		}else{
				$output=array("status"=>"every_err","fail"=>"Username or Password Incorrect","err_pwd"=>$err_pwd);
		}
		
	}else{
		$output=array("status"=>"false","err_u"=>$err_email,"err_pwd"=>$err_pwd);	
	}
	
	echo json_encode($output);
 }
 
?>