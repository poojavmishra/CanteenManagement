<?php
@ob_start();
session_start();  
if (isset($_SESSION['chef_loggedin']) && $_SESSION['chef_loggedin'] == true) {
    ?>

    <?php  
	
	
	include('db/dbh.php') ;
	$chef_id=$_SESSION['chef_id'];
	$sql= "SELECT * FROM chef_details WHERE chef_id='$chef_id'";
	$record=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($record);
	$name = $row['chef_name'];
		$chef_id = $row['chef_id'];


?>


<!DOCTYPE html>
<html>
<head>
<title>Kitchen</title>
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- bootstrap css -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/about.css" rel="stylesheet"> 

</head>
<body>
        <!-- header -->
    <div class="header" id="home">
        <div class="content white">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                        <a class="navbar-brand" href="index.php">
                            <h1>Kitchen</h1>
                        </a>
                    </div>
                    <!--/.navbar-header-->
                    <div class="collapse navbar-collapse" id="bs-example-n avbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                <li><a href=".php" class="active">Menu</a></li>
                                <li><a href="cheforder.php">Order Material </a></li>
                                <li><a href="cheforders.php">Customer Orders</a></li>
                                  
                                <li><a href="chef_logout.php">Logout</a></li>
                                
                            </ul>
                        </nav>
                    </div
                    <!--/.navbar-collapse-->
                    <!--/.navbar-->
                </div>
            </nav>
        </div>
    </div>
    <!-- //header -->



<!-- innerpages_banner -->
    <div class="innerpages_banner">
        <h2>
 Welcome <br>
        <?php echo $_SESSION['chef_name'];  ?></h2>
    <center>   <a href="blockf.php"><font color="red" size="5">Block Menu</font></a></center>
        </div>

            
            <div class="clearfix"></div>
            
        </div>
    </div> 
</div>
<!-- //Popular cakes -->



<!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="agileinfo_copyright">
                <p>© 2018 Canteen Management System. All Rights Reserved</p>
            </div>
        </div>
    </div>
<!-- //footer -->





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
<button  class="btn-login" style="margin-left: 20px;"><a href="index.php" style="text-decoration:none;color: white;">Login</a></button>
</div>
</body>
</html>

<?php
}
?>