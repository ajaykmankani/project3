<?php
include("autoLoader.php");
$obj = new Controller;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$msg = "";
if(isset($_POST['btnRiskProfileSubmit'])){
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $mobile = test_input($_POST['mobile']);
    $pan = test_input($_POST['pan']);
    $dob = test_input($_POST['dob']);
    $age_group = test_input($_POST['age_group']);
    $experience = test_input($_POST['experience']);
    $interested = test_input($_POST['interested']);
    $trading_goal = test_input($_POST['trading_goal']);
    $trading_amount = test_input($_POST['trading_amount']);
    $trading_type = test_input($_POST['trading_type']);
    $annual_income = test_input($_POST['annual_income']);
    $income_source = test_input($_POST['income_source']);
    $earning_person = test_input($_POST['earning_person']);
    $dependent_family = test_input($_POST['dependent_family']);
    $emergency_fund = test_input($_POST['emergency_fund']);
    $existing_investment = test_input($_POST['existing_investment']);
    $total_exist_investment = test_input($_POST['total_exist_investment']);
    $preferred_segment = test_input($_POST['preferred_segment']);
    $risk_tolerance = test_input($_POST['risk_tolerance']);
    $preference = test_input($_POST['preference']);
    
    $adhaar_cardfilename = $_FILES["adhaar_card"]["name"];
	$adhaar_cardtmp_name = $_FILES["adhaar_card"]["tmp_name"];
	$adhaar_cardsize = $_FILES["adhaar_card"]["size"];
	$adhaar_cardtype = $_FILES["adhaar_card"]["type"];
	$adhaar_carderror = $_FILES["adhaar_card"]["error"];
	
	$pan_cardfilename = $_FILES["pan_card"]["name"];
	$pan_cardtmp_name = $_FILES["pan_card"]["tmp_name"];
	$pan_cardsize = $_FILES["pan_card"]["size"];
	$pan_cardtype = $_FILES["pan_card"]["type"];
	$pan_carderror = $_FILES["pan_card"]["error"];
	
	if($adhaar_carderror>0){
  		echo "<script>alert('Please Upload Adhaar Card');</script>";
  	}else if($pan_carderror>0){
  	    echo "<script>alert('Please PAN Card');</script>";
  	}else{
  	    
  	    $adhaar_cardextension = pathinfo($adhaar_cardfilename, PATHINFO_EXTENSION);
    	$adhaar_cardimage_name=time().".".$adhaar_cardextension;
    	$adhaar_cardpath="uploads/adhaar/".$adhaar_cardimage_name;
    	$adhaar_carddo_upload=move_uploaded_file($adhaar_cardtmp_name,$adhaar_cardpath);
    	
    	$pan_cardextension = pathinfo($pan_cardfilename, PATHINFO_EXTENSION);
    	$pan_cardimage_name=time().".".$pan_cardextension;
    	$pan_cardpath="uploads/pan/".$pan_cardimage_name;
    	$pan_carddo_upload=move_uploaded_file($pan_cardtmp_name,$pan_cardpath);
  	    
  	    if($adhaar_carddo_upload==true && $pan_carddo_upload==true){
  	        $res = $obj->array_insert("risk_profile",array(NULL,$name,$email,$mobile,$pan,$dob,$age_group,$experience,$interested,$trading_goal,$trading_amount,$trading_type,$annual_income,$income_source
            ,$earning_person,$dependent_family,$emergency_fund,$existing_investment,$total_exist_investment,$preferred_segment,$risk_tolerance,$preference,$adhaar_cardimage_name,$pan_cardimage_name,0,$obj->get_datetime(),NULL));
            if($res==true){
                $msg = '<span class="text alert text-success">Sent Successfully</span>';
                echo "<script type='text/javascript'>window.location='thanks.html';</script>";
            }else{
                $msg = '<span class="text alert text-danger">Sent Successfully</span>';
            }
  	    }else{
  	        echo "<script>alert('Internal Error!');</script>";
  	    }
  	     
  	}
    
   
}
?>
<?php include('header.php');?>

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(assets/images/main/bg-better.webp);"></div>
        <div class="container">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.php">Home</a></li>
                <li>/</li>
                <li><span>Risk Profile</span></li>
            </ul> 
            <h2>Risk Profile</h2>
        </div> 
    </section>

    <section class="risk-profile-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype= "multipart/form-data">  
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Name :</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label>Email Id :</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Phone Number. :</label>
                                <input class="form-control" type="tel" name="mobile" required>
                            </div>
                            <div class="col-md-6">
                                <label>Pan Number. :</label>
                                <input class="form-control" type="text" name="pan" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Date of Birth:</label>
                                <input class="form-control" type="date" name="dob" required>
                            </div>
                            <div class="col-md-6">
                                <label>Age Group</label>
                                <select name="age_group" class="form-control" required>.
                                    <option value="under 25">Under 25</option>
                                    <option value="26-45">26-45</option>
                                    <option value="46-60">46-60</option>
                                    <option value="above 60">Above 60</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>What is total no of years exoerience  -in stock market</label>
                                <select name="experience" class="form-control" required>
                                    <option value="0-1 yrs">0-1 Yrs</option>
                                    <option value="2-5 yrs">2-5 Yrs</option>
                                    <option value="above 5 yrs">Above 5 Yrs</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Interested In</label>
                                <select name="interested" class="form-control" required>
                                    <option value="investment">Investment</option>
                                    <option value="trading">Trading</option> 
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Investment/trading goal</label>
                                <select name="trading_goal" class="form-control" required>
                                    <option value="capital appreciation">Capital Appreciation</option>
                                    <option value="SPECULATIVE GAINS">SPECULATIVE GAINS</option>
                                    <option value="both">both</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Investment/trading amount</label>
                                <select name="trading_amount" class="form-control" required>
                                    <option value="less than 2 lac">Less Than 2 Lac</option>
                                    <option value="2-5 lac">2-5 Lac</option>
                                    <option value="5-10 lac">5-10 Lac</option>
                                    <option value="above 10 lac">Above 10 Lac</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Preferred Investment/trading type</label>
                                <select name="trading_type" class="form-control" required>
                                    <option value="intraday">Intraday</option>
                                    <option value="short term">Short Term </option>
                                    <option value="MID-TERM">MID-TERM</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Annual Income</label>
                                <select name="annual_income" class="form-control" required>
                                    <option value="LESS THAN 3 LACS">LESS THAN 3 LACS</option>
                                    <option value="3-7 LACS">3-7 LACS</option>
                                    <option value="ABOVE 7 LACS">ABOVE 7 LACS</option> 
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Source of Income</label>
                                <select name="income_source" class="form-control" required>
                                    <option value="salary">Salary</option>
                                    <option value="business">Business</option>
                                    <option value="house rent income">House Rent Income</option>
                                    <option value="other income">Other Income</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Earning Persons in Family</label>
                                <select name="earning_person" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option> 
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Number of Dependents in Family</label>
                                <select name="dependent_family" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="more than 3">More Than 3</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Size of Emergency Fund</label>
                                <select name="emergency_fund" class="form-control" required>
                                    <option value="don’t have">Don’t Have</option>
                                    <option value="1-4 lac">1-4 Lac</option>
                                    <option value="4-8 lac">4-8 Lac</option> 
                                    <option value="above 10 lac">Above 10 Lac</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Existing Investment </label>
                                <select name="existing_investment" class="form-control" onchange="showDiv('hidden_div', this)"> 
                                    <option value="0">No</option> 
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div id="hidden_div"> 
                                    <label>Total Existing Investment</label>
                                    <input name="total_exist_investment" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Preferred Segment </label>
                                <select name="preferred_segment" class="form-control"> 
                                    <option value="equity">Equity</option> 
                                    <option value="options">Options</option>
                                    <option value="future">Future</option>
                                    <option value="all">All</option>
                                </select>
                            </div>
                            <div class="col-md-6"> 
                                <label>Marking it clear market has unlimited risk, your risk tolerance ratio ?</label>
                                <select name="risk_tolerance" class="form-control">
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div> 
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label>What is your preference low risk low return or high risk high return </label>
                                <select name="preference" class="form-control"> 
                                    <option value="low risk low return">Low Risk Low Return</option> 
                                    <option value="high risk high return">High Risk High Return</option>
                                </select>
                            </div> 
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Adhaar Card </label>
                                <div class="file-upload">
                                    <input type="file" class="custom-file-input From-control" name="adhaar_card" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <label>PAN Card </label>
                                <div class="file-upload">
                                    <input type="file" class="custom-file-input From-control" name="pan_card" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div> 
                        </div>    

                        <div class="form-group"> 
                            <input class="thm-btn" type="submit" name="btnRiskProfileSubmit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php include('footer.php');?>
</body>
</html>