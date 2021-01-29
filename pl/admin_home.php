<?php
session_start();  
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true) {
    ?>

    <?php  
	
	
	include('db/dbh.php') ;
	$admin_id=$_SESSION['admin_id'];
	$sql= "SELECT * FROM admin WHERE admin_id='$admin_id'";
	$record=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($record);
	$name = $row['name'];
		$admin_id = $row['admin_id'];


?>


<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="32x32">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Portal</title>
<link rel="stylesheet" type="text/css" href="css/two.css">
</head>
<body>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Orders</a>
  <a href="#">Customers</a>
  <a href="#">Menu</a>
  <a href="admin_logout.php">Logout</a>
</div>

<div id="main">

<div class="wrapper">

    <div class="welcome">
        Welcome <br>
        <?php echo $_SESSION['name'];  ?>
    </div>

    <div class="portal">
    <h1>Admin Portal</h1>
    </div>

        <div class="sidebar">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
        </div>

        <!--<div class="status">
        <span>01-02-2017 &nbsp; 12:30PM</span>
        </div>-->

        <div class="content">
        <hr style="color: #eeeeee; ">
        <span>Profile</span>
        <br><br>
        <hr style="color: #eeeeee; ">
        </div>

 </div>

</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "#a69258";
}
</script>

</body>
</html>

<?php } 
else {?>

    <!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="32x32">
</head>
<body>
<div class="error">
<h1>ERROR 404!</h1>
Please Login For Proceed<br><br>
<button  class="btn-login" style="margin-left: 20px;"><a href="admin.php" style="text-decoration:none;color: white;">Login</a></button>
</div>
</body>
</html>

<?php
}
?>