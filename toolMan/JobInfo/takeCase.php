<?php
   session_start();
  include("../db_pdo_conn.php");
  //$_SESSION['name']="alex";

   $get_job_id = $_GET['job_id'];
   date_default_timezone_set('Asia/Taipei');
   $take_job_date = date("Y-m-d  H:i:s");
   $worker = $_SESSION['AccountEmail'];
  
    $sql = "UPDATE job_list SET state = '審核中',take_date = '$take_job_date' ,worker= '$worker'  where job_id = '$get_job_id' " ;
   
    $stmt = $db->prepare($sql);
    $stmt->execute();

   // mysql_query($db,$sql);
    //echo $stmt->rowCount() . "UPDATED successfully";
  echo '<script>window.location.href = "../toolbox/toolbox.php";</script>';
?>
