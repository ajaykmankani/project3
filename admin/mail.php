<?php
    if(!empty($_POST)){
        foreach($_POST as $key=>$val){
            $arr[]= $key.": ".$val."      " ;
        }
        $str=implode('',$arr);
        echo $str;
        $to="ajaykmankani66@gmail.com";
        $subject="Finance Website Welcome Mail";
        $msg=$str;
        $header="Welcome the our finance website, best of luck.";
        if(mail($to,$subject,$msg,$header)){
            echo "<script type='text/javascript'>window.location='thanks.html';</script>";
        }
        else{
            echo "<script type='text/javascript'> window.location='thanks.html';</script>";
        }
    }
?>