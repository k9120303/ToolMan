<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
function ToolManMail($mailAddress,$nextPage){
include "PHPMailer/PHPMailerAutoload.php"; //匯入PHPMailer類別
header("Content-Type:text/html; charset=utf-8");
$mail= new PHPMailer(); //建立新物件
$mail->IsSMTP(); //設定使用SMTP方式寄信
$mail->SMTPAuth = true; //設定SMTP需要驗證
$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機
$mail->Port = 465; //gmial的port是465
$mail->CharSet = "utf-8"; //字串的時區
$mail->Username = "p71058peter"; //Gamil的帳號
$mail->Password = "a6030571058"; //Gmail的密碼
$mail->From = "p71058peter@gmail.com"; //信箱的位置
$mail->FromName = "RoadMan"; //名字
$mail->Subject ="ToolMan認證"; //title
$mail->Body ="您已經申請了ToolMan的帳號,按下面的連結即可完成註冊<br><a href='140.121.102.126/toolMan/login/checkStatic.php?Email=".$mailAddress."'>連結</a>"; //信的內容,然後這段如果網頁換位置要改
$mail->IsHTML(true); //用html的格式
$mail->AddAddress($mailAddress); // //收件者郵件及名稱
$mail->AddBCC("p71058peter@gmail.com"); //�]�w �K���ƥ�������
if(!$mail->Send()){
	echo "Error: " . $mail->ErrorInfo;
	

}else{
    echo "<script>alert('驗證信已送出,請確認!');</script>";
    echo '<script>window.location='.$nextPage."'</script>";
	//echo "<script>alert('".$mail2."')</script>";
	//echo "<script>window.location='index.php';</script>";
}
}
?>
