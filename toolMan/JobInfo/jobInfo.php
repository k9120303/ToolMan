<!DOCTYPE html>
<html>
  <?php
  session_start();
    include('../forall.php');
    include('../db_pdo_conn.php');
    $email = $_SESSION['AccountEmail'];
      //getName($email);

    $get_job_id = $_GET['job_id'];
    $sql = "SELECT * FROM job_list WHERE job_id = '$get_job_id'";
    $result = $db -> query($sql);
    $row = $result->fetch();

    function getName($email)
    {
      include('../db_pdo_conn.php');
      $result = $db -> query("SELECT * FROM account WHERE email = '$email'");
      $row = $result->fetch();
      return $row['name'];
    }
  ?>
  <style type="text/css">
    .button1 {
      float:right;
      margin-bottom: 20px;
      margin-right: 20px;
    }
    .button2 {
      float:right;
      margin-bottom: 20px;
      margin-right: 5px;
    }
	
	a{
		text-decoration:none;
	}
	
	a:hover{
		color:red;
	}
	
  </style>
  <body class="w3-content" style="max-width:1200px; background-color:#EEEEEE">

    <!-- Top header -->
    <header class="w3-container w3-xlarge">
      <p class="w3-left"><a href="../board/board.php" style="text-decoration:none">ToolMan</a>
    	<a href = "../profile/profile.php"><img src="../icon/Profile.png" style="margin-top: 25px; margin-left:10px; width:40px"></a>
    	<a href = "../toolbox/toolbox.php"><img src="../icon/toolbox.png" style="margin-top: 25px; margin-left:10px; width:40px"></a></p><br><br>
    </header>
    <div class="w3-card">
      <div class="w3-container w3-green" style="font-family: '微軟正黑體'; font-weight: bold;">
        <h1 ><b><?php echo $row[1]; ?></b></h1>
      </div>
      <div class="w3-container w3-xlarge" style="font-family: '微軟正黑體'; font-weight: bold;">
        <p style="font-weight: bold" id="name">工頭: <a onMouseOver="this.style.color='red'" onMouseOut="this.style.color='black'" href = "../checkProfile/checkProfile.php?&email=<?php echo $row[11] ?>"><?php echo getName($row[11]); ?></a><br></p>
        <p style="font-weight: bold" id="date">日期: <?php echo $row[4]; ?><br></p>
        <p style="font-weight: bold" id="location">地點: <?php echo $row[6]; ?><br></p>
        <p style="font-weight: bold" id="price">薪資: NT.<?php echo $row[3]; ?><br></p>
        <p style="font-weight: bold" id="doing">工作內容: <?php echo $row[7]; ?><br></p>




        <?php
            /*
                state:
                  未接案
                  審核中
                  已接案
                  已結案
            */

            switch($email){        //變更清單內容 以使用者身分區分
              case $row[11]:  //使用者為工頭 (顯示接案者與接案日期)
                  echo '<p style="font-weight: bold" id="doing">接案者: <a href = "../checkProfile/checkProfile.php?&email='.$row[12].'">'.getName($row[12]).'</a><br></p>
                        <p style="font-weight: bold" id="doing">接案日期: '.$row[10].'<br></p>';

                  if($row[5]=='未接案'){       // 使用者為工頭，顯示狀態
                      echo '<p style="font-weight: bold; color:green;" id="doing" >狀態: '.$row[5].'<br></p>';   //使用者為工頭 (未接案  綠色)
                  }else if($row[5]=='審核中'){
                      echo '<p style="font-weight: bold; color:green;" id="doing" >狀態: 待核准<br></p>';   //使用者為工頭 (待核准  綠色)
                  }else if($row[5]=='已接案'){
                      echo '<p style="font-weight: bold; color:green;" id="doing" >狀態: 已核准<br></p>';   //使用者為工頭 (已核准  綠色)
                  }else{
                      echo '<p style="font-weight: bold; color:red;" id="doing" >狀態: '.$row[5].'<br></p>';   //使用者為工頭 (已結案  紅色)
                  }
                  break;

              case $row[12]:  // 使用者為工具人 (顯示接案者與接案日期)
                  echo '<p style="font-weight: bold" id="doing">接案者: <a href = "../checkProfile/checkProfile.php?&email='.$row[12].'">'.getName($row[12]).'</a><br></p>
                        <p style="font-weight: bold" id="doing">接案日期: '.$row[10].'<br></p>';

                  // 使用者為接案者，顯示狀態
                  if($row[5]=='已結案')
                        echo '<p style="font-weight: bold; color:red;" id="doing" >狀態: '.$row[5].'<br></p>';  //使用者為接案者 (已結案  紅色)
                  else
                    echo '<p style="font-weight: bold; color:blue;" id="doing" >狀態: '.$row[5].'<br></p>';   //使用者為接案者 (已接案or審核中  藍色)

                  break;

              default:        //使用者為路人 (只顯示狀態)
                  if($row[5]=='未接案'){
                      echo'<p style="font-weight:bold;" id="doing">狀態: '.$row[5].'<br></p>';  // 使用者為路人 (可接案  黑色)
                  }else{
                      echo'<p style="font-weight:bold; color:red; " id="doing">狀態: '.$row[5].'<br></p>';  // 使用者為路人  (不可接案  紅色)
                  }
            }

            /*----------------------------------------------------------
              狀態:   使用者身分     (顯示的按鈕)

              未接案: 使用者為工頭，無人接案     (刪除)
              審核中: 使用者為工頭，有人等待審核 (核准.換人.刪除)
              已接案: 使用者為工頭，已有人接案   (完成.刪除)

              審核中: 使用者為等待審核者 (放棄)
              已接案: 使用者為已受核准者 (放棄)

              未接案: 使用者為路人，無人接案   (接案)
              審核中: 使用者為路人，有人接案   (null)
              已接案: 使用者為路人，已有人接案 (null)
            ----------------------------------------------------------*/

            switch($row[5]){
                case '未接案':            //    未接案
                    if($email==$row[11]){  //    使用者為工頭，無人接案  (刪除)
                        echo '<a href="deleteCase.php?&job_id='.$row[0].'" class="w3-btn w3-red w3-text-shadow w3-xxlarge button1"  >刪除</a>';

                    }else{                //    使用者為路人，無人接案 (接案)
                        echo '<a href="takeCase.php?&job_id='.$row[0].'" class="w3-btn w3-red w3-text-shadow w3-xxlarge button1" >接案</a>';
                    }
                    break;

                case '審核中':                  //    審核中
                    if($email==$row[11]){        //    使用者為工頭，有人等待審核 (核准.換人.刪除)
                        echo '<a href="deleteCase.php?&job_id='.$row[0].'" class="w3-btn w3-red w3-text-shadow w3-xxlarge button1">刪除</a>';

                        echo '<a href="giveupCase.php?&job_id='.$row[0].'" class="w3-btn w3-red w3-text-shadow w3-xxlarge button2">換人</a>';

                        echo '<a href="confirmCase.php?&job_id='.$row[0].'"  class="w3-btn w3-red w3-text-shadow w3-xxlarge button2">核准</a>';

                    }

                    if($email==$row[12]){         //   使用者為工具人，等待審核中 (放棄)
                        echo '<a href="giveupCase.php?&job_id='.$row[0].'" class="w3-btn w3-red w3-text-shadow w3-xxlarge button1">放棄</a>';

                    }

                    //     使用者為路人，有人等待審核中 (null)
                    break;

                case '已接案':                   //  已接案
                    if($email==$row[11]){         //  使用者為工頭，已有人接案 (刪除)
                        echo '<a href="deleteCase.php?&job_id='.$row[0].'" class="w3-btn w3-red w3-text-shadow w3-xxlarge button1">刪除</a>';
                        echo '<a href="finishCase.php?&job_id='.$row[0].'" class="w3-btn w3-red w3-text-shadow w3-xxlarge button2">完成</a>';


                    }else if($email==$row[12]){   //  使用者為已受核准者 (放棄)
                        echo '<a href="giveupCase.php?&job_id='.$row[0].'" class="w3-btn w3-red w3-text-shadow w3-xxlarge button1">放棄</a>';
                    }
                    // 使用者為路人，已有人接案 (null)
                    break;
                default:                         //  已結案
                    include 'index.php';
            }
        ?>
      </div>
      <div class="w3-container w3-green" style="font-family: '微軟正黑體'; ">
        <p class="w3-opacity w3-xlarge" id="phone">聯絡電話: <?php echo $row[8]; ?></p>
      </div>
    </div>
    <br>
  </body>
</html>
