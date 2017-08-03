<?php
  session_start();
  include("../db_pdo_conn.php");
    $user = $_SESSION['AccountEmail'];
    $nick_name = $_POST['nick_name'];
    $expertise = $_POST['expertise'];
    $sql = "UPDATE account SET nick_name = '$nick_name', expertise = '$expertise' where email = '$user'" ;
    $stmt = $db->prepare($sql);
    $stmt->execute();

  echo '<script>window.location.href = "profile.php";</script>';
?>
