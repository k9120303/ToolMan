<!DOCTYPE html>
<html>
  <?php
    session_start();
    include('../forall.php');
  ?>

  <script type='text/javascript' src="../w3jstool.js"></script>
  <script>
     function artFun(){
       var d=1;
       document.getElementById('show1').src ="../icon/art.png"; 	//缺資料
       document.getElementById('jobC').value="art";
     }
      function comFun(){
       document.getElementById('show1').src ="../icon/communication.png" ;  //缺資料
       document.getElementById('jobC').value="communication" ;
     }
      function infFun(){
       document.getElementById('show1').src ="../icon/information.png";   //缺資料
       document.getElementById('jobC').value="information" ;
     }
      function acaFun(){
       document.getElementById('show1').src ="../icon/academic.png" ;  //缺資料
       document.getElementById('jobC').value="academic";
     }
      function phyFun(){
       document.getElementById('show1').src ="../icon/phy_stren.png" ;  //缺資料
       document.getElementById('jobC').value="phy_stren" ;
     }
      function othFun(){
       document.getElementById('show1').src ="../icon/others.png"   //缺資料
       document.getElementById('jobC').value="others" ;
     }
     function resetFun(){    //重置
        document.getElementById('show1').src ="../icon/profile2.png"   //缺資料
        document.getElementById('jobC').value="" ;
     }

  </script>

  <body class="w3-content" style="max-width:1200px; background-color:#EEEEEE">

    <!-- Top header -->
    <header class="w3-container w3-xlarge">
      <p class="w3-left"><a href="../board/board.php" style="text-decoration:none">ToolMan</a>
    	<a href = "../profile/profile.php"><img src="../icon/Profile.png" style="margin-top: 25px; margin-left:10px; width:40px"></a>
    	<a href = "../toolbox/toolbox.php"><img src="../icon/toolbox.png" style="margin-top: 25px; margin-left:10px; width:40px"></a></p><br><br>
    </header>

    <div class="w3-container w3-center" style="font-family: '微軟正黑體'; font-weight: bold;">
        <img class="img-responsive" src="../icon/profile2.png" width="128px" alt="" id="show1">
        <p class="w3-container">
			<p style="color:#009688">請選擇工作類型：</p>
            <button type="button" class="w3-btn" style="background-color:#689F38;" onclick="artFun()">美工</button>
            <button type="button" class="w3-btn" style="background-color:#689F38;" onclick="comFun()">交際</button>
            <button type="button" class="w3-btn" style="background-color:#689F38;" onclick="infFun()">資訊</button>
            <button type="button" class="w3-btn" style="background-color:#689F38;" onclick="acaFun()">學術</button>
            <button type="button" class="w3-btn" style="background-color:#689F38;" onclick="phyFun()">勞力</button>
            <button type="button" class="w3-btn" style="background-color:#689F38;" onclick="othFun()">其他</button>
        </p>
        <form action="addJob_finish.php" method="post">
             <p>
               <label class="w3-label w3-left">標題</label>
               <input type="text" name="job-name" placeholder="Title..." class="w3-input" required>
             </p>
             <p>
               <label class="w3-label w3-left"></label>
                <input type="hidden" name="type" placeholder="Payment..." id="jobC" = class="w3-input" required>
             </p>
             <p>
              <label class="w3-label w3-left">薪資</label>
                <input type="text" name="salary" placeholder="Payment..." class="w3-input" required>
             </p>
             <p>
              <label class="w3-label w3-left">地點</label>
                <input type="text" name="address" placeholder="Location..." class="w3-input" required>
             </p>

             <p>
              <label class="w3-label w3-left">工作內容</label>
                <input type="text" name="job_detail" placeholder="Doing..." class="w3-input" required>
             </p>
             <p>
             <label class="w3-label w3-left">聯絡電話</label>
                <input type="text" name="phone" placeholder="Phone..." class="w3-input" required>
             </p>
             <p>
             <label class="w3-label w3-left">日期</label>
                <input type="date" name="work_date" placeholder="Date..." class="w3-input" required>
             </p>
             <a href ="../toolBox/toolbox.html"><input type="submit" class="w3-btn" value="送出"/></a>
             <button type="reset" class="w3-btn" onclick="resetFun()" >重填</button>
         </form>
		 <br>
    </div>


  </body>
</html>
