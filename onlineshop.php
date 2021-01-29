<?php
@ob_start();
session_start();  
if (isset($_SESSION['stockmanager_loggedin']) && $_SESSION['stockmanager_loggedin'] == true) {
    ?>

    <?php  
	
	
	include('db/dbh.php') ;
	$stock_id=$_SESSION['stock_id'];
	$sql= "SELECT * FROM stockmanager_details WHERE stock_id='$stock_id'";
	$record=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($record);
	$name = $row['name'];
		$stock_id = $row['stock_id'];


?>


<!DOCTYPE html>
<html>
<head>
<title>Stock</title>
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
         <h1>Stock</h1>
                        </a>
                    </div>
                    <!--/.navbar-header-->
                
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
        <?php echo $_SESSION['name'];  ?></h2>
        </div>
<!-- //innerpages_banner -->
   
    
<!-- Popular cakes -->
<div class="popular_cakes">
    <div class="container">
        <h3 class="heading">Online Shopping</h3>
        <div class="cakes_grids">
           
<h3><a href="www.bigbasket.com/online-grocery‎">BigBasket</a> &nbsp;&nbsp;&nbsp; <a href="www.grofers.com/‎.php">Grofers</a> &nbsp;&nbsp;&nbsp;
<a href="www.ebzaar.com/‎">EBazaar</a>&nbsp;&nbsp;&nbsp;<a href="www.naturesbasket.co.in/">NaturesBasket</a> 
            
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
<button  class="btn-login" style="margin-left: 20px;"><a href="admin.php" style="text-decoration:none;color: white;">Login</a></button>
</div>
</body>
</html>

<?php
}
?>