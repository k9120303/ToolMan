<?php
  session_start();
  include("../db_pdo_conn.php");

  $job_id = time();
  $job_name = $_POST['job-name'];
  $type = $_POST['type'];
  $salary = $_POST['salary'];
  $work_date = $_POST['work_date'];
  $state = "未接案";
  $address = $_POST['address'];
  $job_detail = $_POST['job_detail'];
  $phone = $_POST['phone'];
  date_default_timezone_set('Asia/Taipei');
  $publish_data = date("Y-m-d  H:i:s",$job_id);
  $take_date = "";
  $email = $_SESSION['AccountEmail'];
  $worker = "";

  $add = "INSERT INTO job_list VALUES('$job_id','$job_name','$type','$salary','$work_date',
          '$state', '$address', '$job_detail', '$phone', '$publish_data',' $take_date', '$email', '$worker')";

  $db->query($add);

  $add2 = "INSERT INTO work_evaluation VALUES('$job_id','$email','', 0, 0)";
  $db->query($add2);      
  echo '<script>alert("新增成功");</script>';
  echo '<script>window.location.href = "../board/board.php";</script>';
?>
