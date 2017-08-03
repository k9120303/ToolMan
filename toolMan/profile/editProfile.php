<!DOCTYPE html>
<html>
  <?php
    session_start();
    $user = $_SESSION['AccountEmail'];
    include('../forall.php');
    function getName($email)
    {
      include('../db_pdo_conn.php');
      $result = $db -> query("SELECT * FROM account WHERE email = '$email'");
      $row = $result->fetch();
      return $row['name'];
    }
  ?>

  <body class="w3-content" style="max-width:1200px; background-color:#EEEEEE">

    <!-- Top header -->
    <header class="w3-container w3-xlarge">
      <p class="w3-left"><a href="../board/board.php" style="text-decoration:none">ToolMan</a>
    	<a href = "../profile/profile.php"><img src="../icon/Profile.png" style="margin-top: 25px; margin-left:10px; width:40px"></a>
    	<a href = "../toolbox/toolbox.php"><img src="../icon/toolbox.png" style="margin-top: 25px; margin-left:10px; width:40px"></a></p><br><br>
    </header>

     <div class="w3-container w3-center" style="font-family: '微軟正黑體'; font-weight: bold;">
      <div><br>
		<img style="display:block; margin:auto;" class="img-responsive" src="../icon/profile2.png" alt="">
		<p style="text-align:center; font-family: 微軟正黑體; font-size:40px; font-weight:bold;"><?php echo getName($user); ?></p>
	  </div>

        <form action="editProfile_finish.php" method="post">
		     <p>
             <label class="w3-label w3-left">暱稱</label>
                <input type="text" name="nick_name" placeholder="請輸入暱稱..." class="w3-input" required>
             </p>
             <p>
             <label class="w3-label w3-left">專長</label>
                <input type="text" name="expertise" placeholder="請輸入專長..." class="w3-input" required>
             </p><br>
             <input type="submit" class="w3-btn" value="送出"/></a>
             <button type="reset" class="w3-btn" onclick="resetFun()" >重填</button>
        </form>
		<br>
    </div>


  </body>
</html>
