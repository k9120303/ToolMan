<?php
function scheme(){
  $sql="SHOW COLUMNS FROM account";
}
function login($conn,$MyAccount,$MyPassword,$tableName){//My account is the name of the account in the form and Mypassword is the name of the password in the form
  session_start();
 // $account=$_POST[$MyAccount];
 // $password=$_POST[$MyPassword];
  $sql = "SELECT * FROM `$tableName` WHERE email = '".$MyAccount."' AND password = '".$MyPassword."' AND Zongkong = 1";//'SELECT * FROM `account`; //WHERE name ='.$MyAccount .' AND password =' .$MyPassword;""
//  print $sql;
  $result=$conn->query($sql);
  return   $result->fetch();
}
function register($conn,$MyAccount,$MyPassword,$tableName,$telephone,$mail,$exp,$nickname){//My account is the name of the account in the form and Mypassword is the name of the password in the form
 // $account=$_POST[$MyAccount];
 // $password=$_POST[$MyPassword];
   $sql = "INSERT INTO `account`(`name`, `password`, `telephone`, `email`, `expertise`, `nick_name`) VALUES ('$MyAccount','$MyPassword','$telephone','$mail','$exp','$nickname')";
  //$sql = "SELECT * FROM `account` WHERE name = '".$MyAccount."' AND password = '".$MyPassword."'";//'SELECT * FROM `account`; //WHERE name ='.$MyAccount .' AND password =' .$MyPassword;""
  //print $sql;
  //echo $MyAccount;
  //$conn->query()

  $conn->query("SET NAMES utf8");
  $result=$conn->query($sql);
}
function LoginMain($db,$severname,$username,$password,$sever,$FormAccountName,$FormPasswordName,$tableName,$nextPage,$failPage){
   $MyAccount=$FormAccountName;
   $MyPassword=$FormPasswordName;
   //$conn=connect($severname,$username,$password,$sever);
   $isLogin=login($db,$MyAccount,$MyPassword,$tableName);
   if($isLogin[0]){
   	//echo $isLogin[0];
     //print('<script>alert("temp")</script>');
     $_SESSION['AccountEmail']=$isLogin[3];
     header('location: '.$nextPage);
   }
   else{
      echo "<script>alert('登入失敗,請查明後重新登入')</script>";
     echo '<meta http-equiv=REFRESH CONTENT=1;url='.$failPage.'>';
   }
   return $db;
}
function register_main($conn,$severname,$username,$password,$sever,$FormAccountName,$FormPasswordName,$tableName,$telephone,$mail,$exp,$nickname){
  $MyAccount=$FormAccountName;
  $MyPassword=$FormPasswordName;
  //$conn=connect($severname,$username,$password,$sever);
  //print "<script>alert('enter')</script>";
  $sql = "SELECT * FROM `$tableName` WHERE email = '".$mail."'";//'SELECT * FROM `account`; //WHERE name ='.$MyAccount .' AND password =' .$MyPassword;""
//  print $sql;
  $result=$conn->query($sql);
  if($result->rowCount()){
     // print "fail";
      return 0;
  }
  else{
  register($conn,$MyAccount,$MyPassword,$tableName,$telephone,$mail,$exp,$nickname);
  //echo "<script>alert('$nickname')</script>";
      return 1;
  }
  //print $isLogin;

}

?>
