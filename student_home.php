<?php
@ob_start();
session_start();
include('db/dbh.php') ;
  
if ($_SESSION["em"]=="") {
    # code...
    die();
}


?>


<!DOCTYPE html>
<html>
<head>
<title>Canteen</title>
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
                        <a class="navbar-brand" href="student_home.php">
                            <h1>Canteen</h1>
                        </a>
                    </div>
                    <!--/.navbar-header-->
                    <div class="collapse navbar-collapse" id="bs-example-n avbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                <li><a href="student_home.php" class="active">Menu</a></li>
                                <li><a href="index.php">Logout</a></li>
                                
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
        <?php echo $_SESSION["em"];  ?></h2>
       
        <h3>
     <center>  <br> <a href="order2.php">Order a Food</a> &nbsp;&nbsp;&nbsp;<a href="stdstatus.php">Bill </a></center></h3>
        </div>
<!-- //innerpages_banner -->
   
    
<!-- Popular cakes -->
<div class="popular_cakes">
    <div class="container">
        <h3 class="heading">Food Menu</h3>
        <div class="cakes_grids">
             <?php 
$a=0;
$sql="SELECT * FROM menu;";
  $res=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($res)){
$ip=$row["img"];
                      ?><div class='col-md-4'>
                      
            
            <div class="cakes_grid1">
                <img height="250" width="150" src="upload/<?php echo $ip; ?>">
                <h3><?php $a++; echo $row["f_name"];?></h3>
                <p><?php echo $row["price"];?></p>
            </div></div>
            <?php
            
}
?>
            
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




