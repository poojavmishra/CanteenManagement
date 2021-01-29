<?php  
	session_start();
	@ob_start();
	unset($_SESSION['chef_name']);
	session_destroy();
	
	
	header("location:cheflogin.php");
	
?>