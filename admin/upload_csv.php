<?php

$host="localhost"; // Host name.
$db_user="root"; //mysql user
$db_password=""; //mysql pass
$db='stockben_db'; // Database name.

        


         
$connect = mysqli_connect($host, $db_user, $db_password, $db);
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   $flag = true;
   while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
   {
    if($flag) { $flag = false; continue; }
                $name = mysqli_real_escape_string($connect, $data[0]);  
                $email = mysqli_real_escape_string($connect, $data[1]);                
                $phone = mysqli_real_escape_string($connect, $data[2]);
                $state = mysqli_real_escape_string($connect, $data[3]); 
                $dob = mysqli_real_escape_string($connect, $data[4]);
                $rand = rand(0,9999);
                $userid = "YFS/PL02/202204".$rand;
                $created = date("Y-m-d");

                $query = "INSERT into 
                `customer_table`
                (`customer_id`,`name`,`email`,`phone`,`state`,`dob`,`created`) 
                values 
                ('$userid','$name','$email','$phone','$state','$dob','$created')";

                $query2 = "INSERT into 
                `customer_metadata`
                (`customer_id`) 
                values 
                ('$userid')";

                mysqli_query($connect, $query);
                mysqli_query($connect, $query2);

                
                   
                    $to=$email;
                    $subject="Finance Website Welcome Mail";
                    $msg="welcome ".$name." to our finance website, best of luck.";
                    $header="Welcome the our finance website, best of luck.";
                    if(mail($to,$subject,$msg,$header)){
                        echo "mail sent";
                    }
                    else{
                        exit();
                    }
               
   }


   fclose($handle);
   ?>
   <script> location.href = "user-list.php"; </script>
   <?php


  }
 }
}
?>   

