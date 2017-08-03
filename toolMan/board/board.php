<!DOCTYPE html>
<html>
	<?php session_start();?>
    <?php include('../forall.php'); ?>
    <body class="w3-content" style="max-width:1200px; background-color:#EEEEEE">
    <!-- Top header -->
    <header class="w3-container w3-xlarge">
      <p class="w3-left"><a href="" style="text-decoration:none">ToolMan</a>
    	<a href = "../proFile/profile.php"><img src="../icon/Profile.png" style="margin-top: 25px; margin-left:10px; width:40px"></a>
    	<a href = "../toolBox/toolbox.php"><img src="../icon/toolbox.png" style="margin-top: 25px; margin-left:10px; width:40px"></a></p><br><br>
      <form style="font-family: 微軟正黑體;" name="form" method="post" action="board.php">
    	   <input class="w3-input w3-border w3-round-xxlarge" type="text" placeholder="搜尋" name="input"
    	       style="width:58%; margin-top:35px; position:absolute; margin-left:0px;"/>
		   <input type="image" name="submit" src="../icon/search.png" style="margin-top: 35px; position:absolute; left:80%; width:50px"></input>
				<p class="w3-left"><input style="margin-top: 70px;" class="w3-radio" type="radio" name="searchType" value="all" checked>
					<label style="font-size:16px;" class="w3-validate">全部</label>
				<input class="w3-radio" type="radio" name="searchType" value="information">
					<label style="font-size:16px" class="w3-validate">資訊</label>
				<input class="w3-radio" type="radio" name="searchType" value="art">
					<label style="font-size:16px" class="w3-validate">美術</label>
				<input class="w3-radio" type="radio" name="searchType" value="communication">
					<label style="font-size:16px" class="w3-validate">溝通</label>
				<input class="w3-radio" type="radio" name="searchType" value="phy_stren">
					<label style="font-size:16px" class="w3-validate">體力</label>
				<input class="w3-radio" type="radio" name="searchType" value="academic">
					<label style="font-size:16px" class="w3-validate">學術</label>
				<input class="w3-radio" type="radio" name="searchType" value="other">
					<label style="font-size:16px" class="w3-validate">其他</label></p>
      </form>

    </header>

    <!-- Product grid -->
    <br>
    <div class="w3-row" id="grid">
      <?php include('board_list.php');?>
    </div>
  </body>
</html>
