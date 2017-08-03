<?php
  if(!empty($_POST["rating"])) {
    session_start();
    $username = $_SESSION['AccountEmail'];
    include('../db_pdo_conn.php');
    $sql = "SELECT * FROM work_evaluation WHERE job_id = '".$_POST["id"]."'";
    $result = $db -> query($sql);
    $row = $result->fetch();

    require_once("dbcontroller.php");
    $db_handle = new DBController();
    if($username == $row['publisher']){
      $query ="UPDATE work_evaluation SET bossToMan='" . $_POST["rating"] . "' WHERE job_id='" . $_POST["id"] . "'";
      $result = $db_handle->updateQuery($query);

      updataToolManPerson($_POST["id"]);
    }else if($username == $row['worker']){
      $query ="UPDATE work_evaluation SET manToBoss='" . $_POST["rating"] . "' WHERE job_id='" . $_POST["id"] . "'";
      $result = $db_handle->updateQuery($query);

      updataBossPerson($_POST["id"]);
    }
  }

  function updataToolManPerson($job_id)
  {
    include('../db_pdo_conn.php');
    $sql = "SELECT * FROM work_evaluation WHERE job_id = $job_id";
    $result = $db -> query($sql);
    $row = $result->fetch();
    $worker = $row['worker'];

    $star1_result = $db->query("SELECT count(bossToMan) FROM work_evaluation WHERE worker = '$worker' and bossToMan = 1");
    $star1 = $star1_result->fetchColumn();
    $star2_result = $db->query("SELECT count(bossToMan) FROM work_evaluation WHERE worker = '$worker' and bossToMan = 2");
    $star2 = $star2_result->fetchColumn();
    $star3_result = $db->query("SELECT count(bossToMan) FROM work_evaluation WHERE worker = '$worker' and bossToMan = 3");
    $star3 = $star3_result->fetchColumn();
    $star4_result = $db->query("SELECT count(bossToMan) FROM work_evaluation WHERE worker = '$worker' and bossToMan = 4");
    $star4 = $star4_result->fetchColumn();
    $star5_result = $db->query("SELECT count(bossToMan) FROM work_evaluation WHERE worker = '$worker' and bossToMan = 5");
    $star5 = $star5_result->fetchColumn();

    $query ="UPDATE personal_info SET star1='$star1', star2='$star2', star3='$star3', star4='$star4', star5='$star5' WHERE name='$worker'";
    $stmt = $db->prepare($query);
    $stmt->execute();
  }

  function updataBossPerson($job_id)
  {
    include('../db_pdo_conn.php');
    $sql = "SELECT * FROM work_evaluation WHERE job_id = $job_id";
    $result = $db -> query($sql);
    $row = $result->fetch();
    $publisher = $row['publisher'];

    $star1_result = $db->query("SELECT count(manToBoss) FROM work_evaluation WHERE publisher = '$publisher' and manToBoss = 1");
    $star1 = $star1_result->fetchColumn();
    $star2_result = $db->query("SELECT count(manToBoss) FROM work_evaluation WHERE publisher = '$publisher' and manToBoss = 2");
    $star2 = $star2_result->fetchColumn();
    $star3_result = $db->query("SELECT count(manToBoss) FROM work_evaluation WHERE publisher = '$publisher' and manToBoss = 3");
    $star3 = $star3_result->fetchColumn();
    $star4_result = $db->query("SELECT count(manToBoss) FROM work_evaluation WHERE publisher = '$publisher' and manToBoss = 4");
    $star4 = $star4_result->fetchColumn();
    $star5_result = $db->query("SELECT count(manToBoss) FROM work_evaluation WHERE publisher = '$publisher' and manToBoss = 5");
    $star5 = $star5_result->fetchColumn();

    $query ="UPDATE personal_info SET star1='$star1', star2='$star2', star3='$star3', star4='$star4', star5='$star5' WHERE name='$publisher'";
    $stmt = $db->prepare($query);
    $stmt->execute();
  }


?>
