<?php
@ob_start();
session_start(); 
$otp=$_SESSION["otp"];

$chk=$_POST['otpz'];
if ($otp==$chk) {
	header('Location: student_home.php');
}
else{
	echo "<h3>Wrong OTP Please Try Again !</h3>";
echo "<a href=''></a>";
}
?>