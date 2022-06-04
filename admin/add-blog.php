<?php
include("../autoLoader.php");
$obj = new Controller;

$title=$desc=$image=$meta_title=$meta_desc=$meta_keyword=$alt_image="";
if(isset($_POST["Submit"])){
	$title = $_POST['title'];
	$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title))); 
	$desc = $_POST['desc'];
    $meta_title = $_POST['meta_title'];
    $meta_desc = $_POST['meta_desc'];
    $meta_keyword = $_POST['meta_keyword'];
    $custom_schema = $_POST['custom_schema'];
   	$filename=$_FILES["image_file"]["name"];
	$tmp_name=$_FILES["image_file"]["tmp_name"];
	$size=$_FILES["image_file"]["size"];
	$type=$_FILES["image_file"]["type"];
	$error=$_FILES["image_file"]["error"];
	if($error>0){
  		die("Something Internal Setting Problem");
  	}else{
  		 if($type=="image/jpeg" || $type=="image/jpg" || $type="image/png"){
          if($obj->data_exist("blog","id",array("title"=>$title))==false){
      		 	$extension = pathinfo($filename, PATHINFO_EXTENSION);
            	$image_name=time().".".$extension;
            	$path="uploads/blog/".$image_name;
            	$do_upload=move_uploaded_file($tmp_name,$path);
            	if($do_upload){
            	    if($obj->array_insert("blog",array(NULL,$title,$slug,$image_name,$desc,1,$meta_title,$meta_desc,$meta_keyword,$custom_schema,$obj->get_datetime(),NULL))){
            			 $msg = "<div class='alert alert-success'><span><b>Success! </b>Insert Successfully</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>";
                    header("Refresh:1,view_blogs.php");
            			}else{
            				$msg="<div class='alert alert-danger'><span><b>Error! </b>Internal Problem</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>";
            			}
            	}
          }else{
            $msg = "<div class='alert alert-danger'><span><b>Error! </b>Blogs Title Already Exist</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>"; 
          }    
  		 }else{
  		 	echo "<script>alert('File Extension should be jpg|jpeg|png')</script>";
  		 }
  	}
}

if(isset($_GET['blog_id'])){
	$blog_id = base64_decode($_GET['blog_id']);
	$btnname="Update";
	$res=$obj->fetch_where("blog",array("*"),array("id"=>$blog_id));
	if($res==true){
		foreach($res as $row){
			$title = $row->title;
			$image = $row->image;
			$desc = $row->description;
			$meta_title = $row->meta_title;
            $meta_desc = $row->meta_description;
            $meta_keyword = $row->meta_keyword;
            $custom_schema = $row->custom_schema;
     	}
	}	
}else{
	$btnname="Submit";
}



if(isset($_POST["Update"])){
	$title = $_POST['title'];
	$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title))); 
	$desc = $_POST['desc'];
    $meta_title = $_POST['meta_title'];
    $meta_desc = $_POST['meta_desc'];
    $meta_keyword = $_POST['meta_keyword'];
    $custom_schema = $_POST['custom_schema'];
	$filename=$_FILES["image_file"]["name"];
  	$tmp_name=$_FILES["image_file"]["tmp_name"];
  	$size=$_FILES["image_file"]["size"];
  	$type=$_FILES["image_file"]["type"];
  	$error=$_FILES["image_file"]["error"];
  	if($error>0){
  	  	if($obj->update_data("blog",array("title"=>$title,"slug"=>$slug,"description"=>$desc,"meta_title"=>$meta_title,"meta_description"=>$meta_desc,"meta_keyword"=>$meta_keyword,"custom_schema"=>$custom_schema),array("id"=>$blog_id))){
  			 $msg="<div class='alert alert-success'><span><b>Success! </b>Update Successfully</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>";
  			 header("Refresh:1,view_blogs.php");
  		}
  	}else{
  		 if($type=="image/jpeg" || $type=="image/jpg" || $type="image/png"){
  		 	$extension = pathinfo($filename, PATHINFO_EXTENSION);
        	$image_name=time().".".$extension;
        	$path="uploads/blog/".$image_name;
        	$do_upload=move_uploaded_file($tmp_name,$path);
        	if($do_upload){
        		if($obj->update_data("blog",array("title"=>$title,"slug"=>$slug,"image"=>$image_name,"description"=>$desc,"meta_title"=>$meta_title,"meta_description"=>$meta_desc,"meta_keyword"=>$meta_keyword,"custom_schema"=>$custom_schema),array("id"=>$blog_id))){
        			unlink("gallery/blogs/".$image);
        			 $msg="<div class='alert alert-success'><span><b>Success! </b>Insert Successfully</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>";
        			 	 header("Refresh:1,view_blogs.php");
        			}else{
        				$msg="<div class='alert alert-danger'><span><b>Error! </b>Internal Problem</span><a href='#' class='close' data-dismiss='alert'>&times;</a></div>";
        			}
        	}
  		 }else{
  		 	echo "<script>alert('File Extension should be jpg|jpeg|png')</script>";
  		 }
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
								<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-4 col-form-label">Title</label>
								    <div class="col-sm-8">
								      <input type="text" name="title" class="form-control" required="required" value="<?=$title?>">
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-4 col-form-label">Image</label>
								    <div class="col-sm-8">
								      <input type="file" name="image_file" class="form-control" value="" <?php if(!isset($_GET['blog_id'])){
                                            ?>required="required" <?php } ?>>
                                            <?php if(isset($_GET['blog_id'])){ ?>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <img src="uploads/blog/<?=$image?>" style="width: 100px;">
                                            </div>
                                      <?php } ?>
                                      <span>SIZE: 740*354</span>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-4 col-form-label">Description</label>
								    <div class="col-sm-8">
								        <textarea cols="30" rows="5"  class="ckeditor" name="desc"  id="editor" class="form-control" required="required"><?=$desc?></textarea>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-4 col-form-label">Meta Title</label>
								    <div class="col-sm-8">
								        <input type="text" name="meta_title" class="form-control" value="<?=$meta_title?>">
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-4 col-form-label">Meta Description</label>
								    <div class="col-sm-8">
								        <textarea cols="30" rows="5" name="meta_desc" class="form-control"><?=$meta_desc?></textarea>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-4 col-form-label">Meta Keyword</label>
								    <div class="col-sm-8">
								        <input type="text" name="meta_keyword" class="form-control" value="<?=$meta_keyword?>">
								    </div>
								</div>
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-4 col-form-label">Custom Schema</label>
								    <div class="col-sm-8">
								        <input type="text" name="custom_schema" class="form-control" value="<?=$meta_keyword?>">
								    </div>
								</div>
								<div class="form-group row">
								    <button class="btn btn-submit mt-4" type="submit" name="<?=$btnname?>"><?=$btnname?></button>
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
