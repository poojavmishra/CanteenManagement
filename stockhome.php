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
                        <a class="navbar-brand" href="admin_home.php">
         <h1>Stock</h1>
                        </a>
                    </div>
                    <!--/.navbar-header-->
                    <div class="collapse navbar-collapse" id="bs-example-n avbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">

                                
                                <li><a href="onlineshop.php">OnlineOrder</a></li>
                                
                                 <li><a href="stock_logout.php">LogOut</a></li>
                                 <li><a href="stockneworder.php">Pantry Orders</a> <li><a href="stockalert.php">Stock Alert</a></li>
                            </ul>

                        </nav>
                    </div>
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
        <?php echo $_SESSION['name'];  ?></h2>
        <h3>
       <center><br> <a href="category.php">Category</a> &nbsp; &nbsp;<a href="product.php">Products</a> &nbsp;
</h3></center>
        </div>
<!-- //innerpages_banner -->
   
    
<!-- Popular cakes -->
<div class="popular_cakes">
    <div class="container">
        <h3 class="heading">stock management</h3>
        <div class="cakes_grids">
           


<?php

$result = mysqli_query($conn, "SELECT * FROM category");
?>




<div class="col-md-3">
  <div class="panel panel-default">
   <div class="panel-heading"><strong>Total Category</strong></div>
   <div class="panel-body" align="center">
    <h3>
        <?php
                                                while ($row=mysqli_fetch_array($result)) {
                                                  echo '<hr>';
                                                    echo $row['cat_name'];
                                                    echo "<br>";
                                                    # code...
                                                }
                                            ?>
                                        </h3>
   </div>
  </div>
 </div>
 <div class="col-md-3">
  <div class="panel panel-default">

   <div class="panel-heading"><strong>Total Item in Stock</strong></div>
   <div class="panel-body" align="center">

<?php

$result = mysqli_query($conn, "SELECT * FROM product");
?>

    <h3>
         <?php
                                                while ($row=mysqli_fetch_array($result)) {
                                                   echo '<hr>';
                                                    echo $row['pr_name'];
                                                    echo "<br>";
                                                    # code...
                                                }
                                            ?>
    </h3>
   </div>
  </div>
 </div>
            
            <div class="clearfix"></div>
            
        </div>
    </div> 
</div>
<!-- //Popular cakes -->

<br>
<center><h1>Product Alerts !</h1></center>
<?php

$result = mysqli_query($conn, "SELECT * FROM product");
?>


<center><h1>
         <?php
                                                while ($row=mysqli_fetch_array($result)) {
                                                    if($row['pr_qty']<$row['minimum']){
                                                    echo 'The Product ';
                                                    echo $row['pr_name'];
                                                    echo " is Having a Low Stock than Minimum Limit<br>";
                                                }
                                                    # code...
                                                }
                                            ?>
</h1></center>
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