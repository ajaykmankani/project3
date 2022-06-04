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
    <title>Stock Benefits | User List</title>
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli:400,600,600,700' type='text/css'
        media='all' />
    <link rel="stylesheet" href="assets/css/animate.css" type="text/css">
    <link rel="stylesheet" href="assets/css/animations.css" type="text/css">
    <link rel="stylesheet" href="assets/css/docs.theme.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!-- Font Icons -->
    <link href="assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
    <link href="assets/plugins/iconfonts/icons.css" rel="stylesheet" />
    <link href="assets/plugins/fontawesome-free/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/feature-icon.css" />
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
                <form method="post" action="upload_csv.php" enctype="multipart/form-data">

                    <!-- ----------------------------------------------------------------------------------------------------------- -->
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="file">
                            <label class="custom-file-label" for="inputGroupFile02">Select CSV File:</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" name="submit" value="Import" class="btn btn-info" />
                        </div>
                    </div>
                    <!-- ----------------------------------------------------------------------------------------------------------- -->
                    <!-- <div align="center">
                        <label>Select CSV File:</label>
                        <input type="file" name="file" />
                        <br />
                        <input type="submit" name="submit" value="Import" class="btn btn-info" />
                    </div> -->
                </form>
                <div class="dash-block">
                    <h5 class="border-bottom pb-3">All Enquiry</h5>
                    <div class="form-element mt-2">
                        <?php	
					$res = $obj->fetch_all("customer_table",array("*"),"DESC");
					
					if($res==true){	?>
                        <div class="table-responsive">




                            <table class="table table-bordered" id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Created</th>
                                        <th>Customer ID</th>
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
								foreach($res as $row){

                                    $res2 = $obj->fetch_where("customer_metadata",array("*"),array('customer_id' => $row->customer_id));

                                    foreach($res2 as $row2){
                                       $status =  $row2->status;
                                       $stage =  $row2->stage;
                                       $team =  $row2->team;
                                    }
									?>
                                    <tr>
                                        <td><?=$sno++?></td>
                                        <td><?=$row->created?></td>
                                        <td><?=$row->customer_id?></td>
                                        <td><?=$row->name?></td>
                                        <td><?=$row->email?></td>
                                        <td><?=$row->phone?></td>
                                        <td>

                                            <form method="post" action="submit.php">
                                                <div class="input-group">
                                                    <select class="custom-select" id="inputGroupSelect01" name="status"
                                                        id="status" id="inputGroupSelect04">
                                                        <option value=""></option>
                                                        <option value="under_process"
                                                            <?php if($status == "under_process"){ echo "selected"; } ?>>
                                                            Under Process</option>
                                                        <option value="application_login"
                                                            <?php if($status == "application_login"){ echo "selected"; } ?>>
                                                            Application Login</option>
                                                        <option value="document_varified"
                                                            <?php if($status == "document_varified"){ echo "selected"; } ?>>
                                                            Document Varified</option>
                                                        <option value="on_hold"
                                                            <?php if($status == "on_hold"){ echo "selected"; } ?>> On
                                                            Hold </option>
                                                        <option value="pending"
                                                            <?php if($status == "pending"){ echo "selected"; } ?>>
                                                            Pending </option>
                                                        <option value="approved"
                                                            <?php if($status == "approved"){ echo "selected"; } ?>>
                                                            Approved </option>
                                                        <option value="rejected"
                                                            <?php if($status == "rejected"){ echo "selected"; } ?>>
                                                            Rejected </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <input class="btn btn-success" type="submit" name="update"
                                                            value="Update">
                                                    </div>
                                                </div>
                                                <input type="hidden" value="<?=$row->customer_id?>" name="cust_id">
                                            </form>
                                        </td>
                                        <td><a href="#" data-toggle="modal" data-target=".user-detail-full<?=$row->id?>"
                                                class="view-det view-full-det">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fe fe-eye "></i>
                                                </button>
                                            </a>
                                            <div class="modal fade user-detail-full<?=$row->id?>">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">User Detail</h5>
                                                            <!-- <button class="close" data-dismiss="modal">&times;</button> -->
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
                                                                    <!-- <tr>
                                                                        <td>Message</td>
                                                                        <td><?=$row->message?></td>
                                                                    </tr> -->
                                                                    <tr>
                                                                        <td>Stage</td>
                                                                        <td>
                                                                            <form method="post" action="submit.php">
                                                                                <div class="input-group">

                                                                                    <select class="custom-select"
                                                                                        id="inputGroupSelect01"
                                                                                        name="stage">
                                                                                        <option value=""></option>
                                                                                        <option value="doc"
                                                                                            <?php if($stage == "doc") echo "selected";?>>
                                                                                            Doc</option>
                                                                                        <option value="form"
                                                                                            <?php if($stage == "form") echo "selected";?>>
                                                                                            Form</option>
                                                                                        <option value="login_fc"
                                                                                            <?php if($stage == "login_fc") echo "selected";?>>
                                                                                            Login FC</option>
                                                                                        <option value="approval"
                                                                                            <?php if($stage == "approval") echo "selected";?>>
                                                                                            Approval</option>
                                                                                        <option value="stage_2"
                                                                                            <?php if($stage == "stage_2") echo "selected";?>>
                                                                                            Stage 2</option>
                                                                                        <option value="stage_3"
                                                                                            <?php if($stage == "stage_3") echo "selected";?>>
                                                                                            Stage 3</option>
                                                                                        <option value="stage_4"
                                                                                            <?php if($stage == "stage_4") echo "selected";?>>
                                                                                            Stage 4</option>
                                                                                    </select>
                                                                                    <div class="input-group-append">
                                                                                        <input class="btn btn-success"
                                                                                            type="submit"
                                                                                            name="update_stage"
                                                                                            value="Update">
                                                                                    </div>
                                                                                    <input type="hidden" value="<?=$row->customer_id?>" name="cust_id">

                                                                            </form>
                                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Team</td>
                                        <td>
                                            <form method="post" action="submit.php">
                                                <div class="input-group">

                                                    <select class="custom-select" id="inputGroupSelect01" name="team">
                                                        <option value=""></option>
                                                        <option value="mona"
                                                            <?php if($team == "mona") { echo "selected"; }?>>
                                                            MONA</option>
                                                        <option value="shona"
                                                            <?php if($team == "shona") { echo "selected"; }?>>
                                                            Shona</option>
                                                        <option value="dona"
                                                            <?php if($team == "dona") { echo "selected"; }?>>
                                                            Dona</option>
                                                        <option value="reena"
                                                            <?php if($team == "reena") { echo "selected"; }?>>
                                                            Reena</option>
                                                        <option value="beena"
                                                            <?php if($team == "beena") { echo "selected"; }?>>
                                                            Beena</option>
                                                        <option value="teena"
                                                            <?php if($team == "teena") { echo "selected"; }?>>
                                                            Teena</option>
                                                        <option value="meena"
                                                            <?php if($team == "meena") { echo "selected"; }?>>
                                                            Meena</option>
                                                        <option value="gin"
                                                            <?php if($team == "gin") { echo "selected"; }?>>
                                                            Gin</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <input class="btn btn-success" type="submit" name="update_team"
                                                            value="Update">
                                                    </div>
                                                    <input type="hidden" value="<?=$row->customer_id?>" name="cust_id">

                                            </form>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Segment</td>
                                        <td><?=$row->segment?></td>
                                    </tr>
                                    <tr>
                                        <td>Resource</td>
                                        <td><?=$row->resource?></td>
                                    </tr> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </td>


        </tr>
        <?php 
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
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
</body>

</html>