<?php
   session_start();
  include("../db_pdo_conn.php");
  //$_SESSION['name']="alex";

   $get_job_id = $_GET['job_id'];
   $worker = $_SESSION['AccountEmail'];
  
    $sql = "UPDATE job_list SET state = '未接案',take_date = '' ,worker= ''  where job_id = '$get_job_id' " ;
   
    $stmt = $db->prepare($sql);
    $stmt->execute();

   // mysql_query($db,$sql);
    //echo $stmt->rowCount() . "UPDATED successfully";
  echo '<script>window.location.href = "../toolbox/toolbox.php";</script>';
?>
