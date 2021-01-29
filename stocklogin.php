<?php
 @ob_start();
    session_start();
 include("db/dbh.php");
if (isset($_POST['login-btn'])) {
$stock_id = $_POST['stock_id'];
$password = $_POST['password'];

$sql = "SELECT * FROM stockmanager_details WHERE stock_id='$stock_id' AND password='$password'";
$result = mysqli_query($conn,$sql);

if (!$row=mysqli_fetch_assoc($result)) {
        $_SESSION['errMsg']="username/password combination incorrect";
        
}else
{   
    $_SESSION['name']=$row['name'];
    $_SESSION['stock_id']=$row['stock_id'];
    
    $_SESSION['stockmanager_loggedin'] = true;
        header("location:stockhome.php");

   
}
  
}


  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Stock Manager Login System</title>
	    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- bootstrap css -->
        <link href="css/contact.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- contact css -->
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="32x32">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="innerpages_banner">
<img src="img/hdr.png">
<h1>Stock Management System</h1>

</div>

<?php  
    if (isset($_SESSION['errMsg'])) {
        
            echo "<div class='errMsg'>
<div class='invalid'>Invalid Login</div>
<div class='msg' style='padding-top: 5px;'>".$_SESSION['errMsg']."</div></div>";
        
        unset($_SESSION['errMsg']);
    }
?>

<div class="login">
<form action="stocklogin.php" method="POST">

<div class="input">
<img src="img/admin_img.png">
<br><br>
 <input type="text" name="stock_id" id="stock_id" required class="form-input" placeholder="StockManager ID" autofocus></input>

 <input type="password" name="password" id="password" placeholder="Password" required class="form-input"></input>
 <br>
 <button type="submit" name="login-btn"  class="btn-login">Login</button>
 <a href="index.php" target="_top" style="text-decoration: none;color: white;border: 1px solid white; border-radius: 5px;padding: 15px 30px 15px;margin-left: 20px; font-family: arial;">
 Back</a>
 <br>
 </div>
</form>
</div>
</body>
</html>