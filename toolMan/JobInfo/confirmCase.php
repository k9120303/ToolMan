<?php
  include("../db_pdo_conn.php");

   $get_job_id = $_GET['job_id'];
  
    $result = $db -> query("SELECT * FROM job_list WHERE job_id = '$get_job_id'");
    $row = $result->fetch();
    $worker_now = $row['worker'];
    


    $sql = "UPDATE job_list SET state = '已接案'  where job_id = '$get_job_id' " ;
   	$sql2 = "UPDATE work_evaluation SET worker = '$worker_now'  where job_id = '$get_job_id' " ;

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $stmt = $db->prepare($sql2);
    $stmt->execute();

   // mysql_query($db,$sql);
    //echo $stmt->rowCount() . "UPDATED successfully";
  echo '<script>window.location.href = "../toolbox/toolbox.php";</script>';
?>
