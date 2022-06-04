<?php 
include("../autoLoader.php");
$obj = new Controller;
$obj->security_guard();

if(isset($_POST['user_id_for_status'])){
    $user_id = $_POST['user_id_for_status']; 
    $status = $_POST['status'];
    $res = $obj->update_data('risk_profile',array('status'=>$status),array('id'=>$user_id));
    echo true;
}


if(isset($_POST["blog_id_for_delete"])){
	$blog_id=$_POST["blog_id_for_delete"];
	$data=array("id"=>$blog_id);
	if($obj->delete_data("blog",$data)){
		echo true;
	}
}

if(isset($_POST['blog_id_for_status'])){
    $user_id = $_POST['blog_id_for_status']; 
    $status = $_POST['status'];
    $res = $obj->update_data('blog',array('status'=>$status),array('id'=>$user_id));
    echo true;
}

?>