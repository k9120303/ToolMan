<?php
include "login_fun.php";
include "connect.php";
include "mail.php";
$severname="localhost";//sever的名字(如果改位置要換)
$username="root";//sever的帳戶名字(同上)
$password="";//sever帳戶的密碼
$sever="toolmandb";//sql資料庫的名字
$FormAccountName=$_POST["myName"];//把前面輸入的帳號名字抓近來
$FormPasswordName=$_POST["MyPassword"];//把前面輸入的密碼抓近來
$mail=$_POST["myEmail"];//把前面輸入的email抓近來
$telephone=$_POST["myTelephone"];//把前面輸入的電話抓近來
$exp=$_POST["mySkill"];//把專長抓近來
$nickname=$_POST["myNickName"];//把綽號抓近來
$db=connect($severname,$username,$password,$sever);//連線
//00357116@ntou.edu.tw
if( strpos($mail,"edu",0)>strpos($mail,"@",0)){//通常學校的信箱會在edu後面,所以先抓出edu 和 @ 的位置來比較誰先誰後,如果edu在@後面則進到註冊部分
  //echo "yes";
  $_GET["myEmail"]=$mail;//把前面輸入的email抓近來等等要傳到register去
  echo $_GET['myEmail'];
  $isregister=register_main($db,$severname,$username,$password,$sever,$FormAccountName,$FormPasswordName,"account",$telephone,$mail,$exp,$nickname);//註冊function
  if($isregister){
  ToolManMail($mail,"index");
  }
  else{
       echo "<script>alert('信箱已有人使用,請重新註冊');;window.location='index.php'</script>";
  }
  
}
else{
    echo "<script>alert('信箱請使用學校的信箱!');;window.location='index.php'</script>";//帳號輸入錯誤依樣回到login的頁面
}
//echo strpos($mail,"gg",0);
//
//if($isregister){
 // 

//}
//else{

//}
//
?>
