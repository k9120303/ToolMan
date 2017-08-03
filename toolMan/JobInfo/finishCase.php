<?php
  session_start();
  include("../db_pdo_conn.php");
  //$_SESSION['name']="alex";

   $get_job_id = $_GET['job_id'];

      //取得工作類型
      $result = $db -> query("SELECT * FROM job_list WHERE job_id = '$get_job_id'");
      $row = $result->fetch();
      $type = $row['type'];

      //取得工具人email
      $result2 = $db -> query("SELECT * FROM job_list WHERE job_id = '$get_job_id'");
      $row2 = $result2->fetch();
      $mail = $row2[12];


    switch($type){  //判斷工作類型，工具人該類型能力+1
      case 'information':    // information
        $sql = "UPDATE personal_info SET information= information+1  where name = '$mail' " ;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        break;

      case 'art':    // art
          $sql = "UPDATE personal_info SET art= art+1  where name = '$mail' " ;
          $stmt = $db->prepare($sql);
          $stmt->execute();
          break;

      case 'phy_stren':    // phy_stren
          $sql2 = "UPDATE personal_info SET phy_stren= phy_stren+1  where name = '$mail' " ;
          $stmt2 = $db->prepare($sql2);
          $stmt2->execute();
          break;

      case 'academic':    // academic
          $sql2 = "UPDATE personal_info SET academic= academic+1  where name = '$mail' " ;
          $stmt2 = $db->prepare($sql2);
          $stmt2->execute();
          break;

      case 'communication':    // communication
          $sql2 = "UPDATE personal_info SET communication= communication+1  where name = '$mail' " ;
          $stmt2 = $db->prepare($sql2);
          $stmt2->execute();
          break;

      default:
          $sql2 = "UPDATE personal_info SET other= other+1  where name = '$mail' " ;
          $stmt2 = $db->prepare($sql2);
          $stmt2->execute();
    }


    $sql = "UPDATE job_list SET state = '已結案'  where job_id = '$get_job_id' " ;
    $stmt = $db->prepare($sql);
    $stmt->execute();



   // mysql_query($db,$sql);
    //echo $stmt->rowCount() . "UPDATED successfully";
  echo '<script>window.location.href = "../toolbox/toolbox.php";</script>';
?>
