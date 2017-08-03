<!DOCTYPE html>
<!-- saved from url=(0048)file:///C:/Users/User/Desktop/testGoogleMap.html -->
<?php include("function.php"); ?>

<html>
	<title>ToolMan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../icon/ToolMan Logo.png"/>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel=stylesheet type="text/css" href="style.css">
	<style>
	  .w3-sidenav a {font-family: "Roboto", sans-serif}
	  body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
	</style>
    
	<!--script for template-->
	<script type="text/javascript" src = "template.js"></script>
	
    <body class="w3-content" style="max-width:1200px; background-color:#EEEEEE">
  
  <!-- Sidenav/menu -->
  <nav class="w3-sidenav w3-animate-left w3-center w3-text-white w3-collapse w3-top" style="background-color:#689F38; z-index:3;width:120px;font-weight:bold" id="mySidenav"><br>
    <h3 class="w3-padding-64" style="font-family: 微軟正黑體"><b>Tool<br>Man</b></h3>
    <a href="../board/board.php" onclick="w3_close()" class="w3-padding" style="font-family: 微軟正黑體">最新工作</a>
    <a href="../profile/profile.php" onclick="w3_close()" class="w3-padding" style="font-family: 微軟正黑體">個人檔案</a>
    <a href="../toolbox/toolbox.php" onclick="w3_close()" class="w3-padding" style="font-family: 微軟正黑體">工具箱</a>
    <a href="../GoogleMap/GoogleMap.php" onclick="w3_close()" class="w3-padding" style="font-family: 微軟正黑體">GPS找工作</a>
    <a href="../addJob/addJob.php" onclick="w3_close()" class="w3-padding" style="font-family: 微軟正黑體">新增工作</a>
    <a href="../aboutToolMan/aboutToolMan.php" onclick="w3_close()" class="w3-padding" style="font-family: 微軟正黑體">關於ToolMan</a>
    <a href="#contact" onclick="w3_close()" class="w3-padding" style="font-family: 微軟正黑體">登出</a>
  </nav>

  <!-- Top menu on small screens -->
  <header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
    <span class="w3-left w3-padding" style="font-family: 微軟正黑體; font-weight:bold">ToolMan</span>
    <a href="javascript:void(0)" class="w3-right w3-btn w3-white" onclick="w3_open()">☰</a>
  </header>

  <!-- Overlay effect when opening sidenav on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
			
	<!-- Top header -->
		<header class="w3-container w3-xlarge">
		  <p class="w3-left"><a href="" style="text-decoration:none">ToolMan</a>
			<a href = "../profile/profile.php"><img src="../icon/Profile.png" style="margin-top: 25px; margin-left:10px; width:40px"></a>
			<a href = "../toolbox/toolbox.php"><img src="../icon/toolbox.png" style="margin-top: 25px; margin-left:10px; width:40px"></a></p><br><br>
		</header>
		</div>  
		
		<div id="floating-panel" class = "w3-main">
			<form>
				<span id="ya" style="font-family: 微軟正黑體">輸入地址</span><br>
				<input type="text" id="inputAddress" placeholder="Address">
				<!--<input type="button" id="inputButton" value="submit" onclick() = "addPlaces()">-->
				<input type = "button" id = "inputButton" value = "搜尋" style="font-family: 微軟正黑體">
				<input type = "button" id = "inputNowLocation" value = "目前位置搜尋" style="font-family: 微軟正黑體">
			</form>	
			
		</div>
		
		<div id = "map" class = "w3-main"></div>
	  
	</body>
</html>