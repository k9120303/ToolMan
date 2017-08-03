
<?php
include "login_fun.php";
include "connect.php";
$severname="localhost";
$username="root";
$password="";
$sever="toolmandb";
$FormAccountName=$_POST["form-username"];
$FormPasswordName=$_POST["form-password"];
$nextPage="../board/board.php";
$conn=connect($severname,$username,$password,$sever);
$sql="SHOW CREATE TABLE ".$sever;
LoginMain($conn,$severname,$username,$password,$sever,$FormAccountName,$FormPasswordName,"account",$nextPage,"index.php");
?>
