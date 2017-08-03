<?php
 function logout($conn,$MyAccount,$MyPassword,$tableName){
	 $_SESSION=array();
	 setcookie(session_name(),'',time()-3600);
	 session_destroy();
 }
?>
<meta http-equiv="refresh" content="0;url='index.php'">