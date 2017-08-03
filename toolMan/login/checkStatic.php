<?php
include "../db_pdo_conn.php";
session_start();
$Email=$_GET['Email'];
$sql = "UPDATE `account` SET `ZongKong`= 1 WHERE email = '".$Email."'";
$db->query($sql);
echo "<script>alert('以認證成功!');window.location='index.php';</script>";
?>