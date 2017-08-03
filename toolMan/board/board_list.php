<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<?php
  include("../db_pdo_conn.php");

  $input = (empty($_POST['input'])) ? "" : $_POST['input'];
  $searchType = (empty($_POST['searchType'])) ? "all" : $_POST['searchType'];
  /*
  if(empty($_POST['input']) && empty($_POST['searchType'])) {
    $input = "";
	$searchType = "all";
  }
  else{
	$input = $_POST['input'];
	$searchType = $_POST['searchType'];
  }*/

  $sql = "SELECT * FROM job_list Where state <> '已結案'";

  if($searchType != "all") $sql .= "and type = '$searchType'";
  if($input != "") $sql .= "and job_name LIKE '%$input%'";
  $sql.=" order by job_id desc";
  $result = $db -> query($sql);
  while($row = $result->fetch())
  {
    echo '<div class="w3-col l3 s6"><a href="../jobInfo/jobInfo.php?&job_id='.$row[0].'"><div class="w3-container w3-center">';
    switch ($row[5]) {
      case "審核中":
          echo '<div class="w3-display-container">';
          echo '<span class="w3-tag w3-display-topmiddle w3-round-xxlarge w3-red" style="font-family: 微軟正黑體">審核中</span>';
          break;
      case "已接案":
          echo '<div class="w3-display-container">';
          echo '<span class="w3-tag w3-display-topmiddle w3-round-xxlarge" style="background-color:blue; font-family: 微軟正黑體">已接案</span>';
          break;
      default:
          echo '<div>';
    }

    switch ($row[2]) {
      case "art":
          echo '<img src="../icon/art.png" style="width:50%">';
          break;
      case "communication":
          echo '<img src="../icon/communication.png" style="width:50%">';
          break;
      case "information":
          echo '<img src="../icon/information.png" style="width:50%">';
          break;
      case "academic":
          echo '<img src="../icon/academic.png" style="width:50%">';
          break;
      case "phy_stren":
          echo '<img src="../icon/phy_stren.png" style="width:50%">';
          break;
      default:
          echo '<img src="../icon/others.png" style="width:50%">';
    }

    echo '</div><p><a style="font-family: 微軟正黑體">';
    echo $row[1];
    echo '</a><br><b>$';
    echo $row[3];
    echo '</b></p></a></div></div>';
  }
?>
