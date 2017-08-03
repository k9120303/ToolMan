<!DOCTYPE html>
<html>
    <?php
      session_start();
      $name = $_SESSION['AccountEmail'];
      include('../forall.php');
      include('toolBox_tableList.php');

    ?>
    <body class="w3-content" style="max-width:1200px; background-color:#EEEEEE">
      <!-- Top header -->
      <header class="w3-container w3-xlarge">
        <p class="w3-left"><a href="../board/board.php" style="text-decoration:none">ToolMan</a>
      	<a href = "../profile/profile.php"><img src="../icon/Profile.png" style="margin-top: 25px; margin-left:10px; width:40px"></a>
      	<a href = "../toolbox/toolbox.php"><img src="../icon/toolbox.png" style="margin-top: 25px; margin-left:10px; width:40px"></a></p><br><br>
      </header>

      <label class="w3-label" style="background-color:#81ADF7; color:black; font-size:20px;"><b>　代表審核中　</b></label>
  		<label class="w3-label" style="background-color:#FFF079; color:black; font-size:20px;"><b>　代表未接案　</b></label>

    	<div class="w3-container w3-hide-small" style="font-family:'微軟正黑體';">
            <?php
              $sql = "SELECT * FROM job_list WHERE worker = '$name' and state <> '已結案'";
              tableList('接案', $sql);
              $sql = "SELECT * FROM job_list WHERE publisher = '$name' and state <> '已結案'";
              tableList('提案', $sql);
              $sql = "SELECT * FROM job_list WHERE publisher = '$name' and state = '已結案'";
              tableList('工頭歷程', $sql);
              $sql = "SELECT * FROM job_list WHERE worker = '$name' and state = '已結案'";
              tableList('工具人歷程', $sql);
            ?>
    	</div>

      <div class="w3-container w3-hide-large" style="font-family:'微軟正黑體';">
        <?php
          $sql = "SELECT * FROM job_list WHERE worker = '$name' and state <> '已結案'";
          tableListForSmall('接案', $sql);
          $sql = "SELECT * FROM job_list WHERE publisher = '$name' and state <> '已結案'";
          tableListForSmall('提案', $sql);
          $sql = "SELECT * FROM job_list WHERE publisher = '$name' and state = '已結案'";
          tableListForSmall('工頭歷程', $sql);
          $sql = "SELECT * FROM job_list WHERE worker = '$name' and state = '已結案'";
          tableListForSmall('工具人歷程', $sql);
        ?>
      </div>

    </body>
</html>
