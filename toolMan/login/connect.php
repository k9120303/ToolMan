<?php
function connect($severname,$username,$password,$sever){
  $dbConnect="mysql:host=".$severname.";dbname=".$sever;
  $conn = new PDO($dbConnect,$username,$password);
//  $conn=mysqli_connect($severname,$username,$password,$sever);
  return $conn;
}
 ?>
