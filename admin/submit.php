<?php

include("../autoLoader.php");

$obj = new Controller;

if(isset($_POST['update'])){
    $tab = "customer_metadata";
    $setData = array('status'=>$_POST['status']);
    $baseCol = array('customer_id'=>$_POST['cust_id']);

    if($obj->update_data($tab,$setData,$baseCol)){
        ?>
   <script> location.href = "user-list.php"; </script>
   <?php

    };
    
}


if(isset($_POST['update_stage'])){
    $tab = "customer_metadata";
    $setData = array('stage'=>$_POST['stage']);
    $baseCol = array('customer_id'=>$_POST['cust_id']);

    if($obj->update_data($tab,$setData,$baseCol)){
        ?>
   <script> location.href = "user-list.php"; </script>
   <?php

    };
    
}



if(isset($_POST['update_team'])){
    $tab = "customer_metadata";
    $setData = array('team'=>$_POST['team']);
    $baseCol = array('customer_id'=>$_POST['cust_id']);

    if($obj->update_data($tab,$setData,$baseCol)){
        ?>
   <script> location.href = "user-list.php"; </script>
   <?php

    };
    
}