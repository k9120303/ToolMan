<?php
   session_start();
  include("../db_pdo_conn.php");

   
   $get_job_id = $_GET['job_id'];

  
    $sql = "DELETE FROM job_list WHERE job_id='$get_job_id' ";
    $sql2 = "DELETE FROM work_evaluation WHERE job_id='$get_job_id' ";
    $db->exec($sql);
    echo "Record_1 deleted successfully";

    $db->exec($sql2);
    echo "Record_2 deleted successfully";

   // mysql_query($db,$sql);
    //echo $stmt->rowCount() . "UPDATED successfully";
  echo '<script>window.location.href = "../toolbox/toolbox.php";</script>';
?>
