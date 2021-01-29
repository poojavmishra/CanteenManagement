<?php
@ob_start();
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
                        <a class="navbar-brand" href="admin_home.php">
                            <h1>Canteen</h1>
                        </a>
                    </div>
                    <!--/.navbar-header-->
                    <div class="collapse navbar-collapse" id="bs-example-n avbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                <li><a href="admin_home.php" class="active">Menu</a></li>
                                <li><a href="neworder.php">Orders </a></li>
                                <li><a href="reports.php">Reports</a></li>
                                  <li><a href="delrec.php">Delete Record</a></li>
                                <li><a href="admin_logout.php">Logout</a></li>
                                
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
       <center><br> <a href="addf.php">Add Food</a> &nbsp;<a href="editf.php">Edit Food</a> &nbsp;<a href="deletef.php">Delete Food</a> &nbsp;
       <br><br>  <a href="addstaff.php">Register New Staff</a></h3></center>
        </div>
<!-- //innerpages_banner -->


   <br>
    <center> <h3 class="heading">Select Category to See Menu</h3>
          <select id="c1" name="cat" onchange="menus()">
                            <option>Select Category</option>
                            <option value="Breakfast">Breakfast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Rice">Rice</option>
                            <option value="Snacks">Snacks</option>
                            <option value="Drinks">Drinks</option>
                            <option value="Chocolates">Chocolates</option>
                            <option value="Ice-Cream">Ice-Cream</option>
                             <option value="Other/Extras">Other/Extras</option>
                           
                            </select>
       </center>
<!-- Breakfast -->
<div class="popular_cakes" id="Breakfast" style="display:none">
    <div class="container">
        <h3 class="heading">Breakfast</h3>
        <div class="cakes_grids">
             <?php 
$a=0;
$sql="SELECT * FROM menu where category='Breakfast';";
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
 
<!-- SoftDrink -->
<div class="popular_cakes" id="Drinks" style="display:none">
    <div class="container">
        <h3 class="heading">Soft Drinks</h3>
        <div class="cakes_grids">
             <?php 
$a=0;
$sql="SELECT * FROM menu where category='Drinks';";
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




<!-- Rice -->
<div class="popular_cakes" id="Rice" style="display:none">
    <div class="container">
        <h3 class="heading">Rice</h3>
        <div class="cakes_grids">
             <?php 
$a=0;
$sql="SELECT * FROM menu where category='Rice';";
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





<!-- Lunch -->
<div class="popular_cakes" id="Lunch" style="display:none">
    <div class="container">
        <h3 class="heading">Lunch</h3>
        <div class="cakes_grids">
             <?php 
$a=0;
$sql="SELECT * FROM menu where category='Lunch';";
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



<!-- Snacks -->
<div class="popular_cakes" id="Snacks" style="display:none">
    <div class="container">
        <h3 class="heading">Snacks</h3>
        <div class="cakes_grids">
             <?php 
$a=0;
$sql="SELECT * FROM menu where category='Snacks';";
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



<!-- Chocolates -->
<div class="popular_cakes" id="Chocolates" style="display:none">
    <div class="container">
        <h3 class="heading">Chocolates</h3>
        <div class="cakes_grids">
             <?php 
$a=0;
$sql="SELECT * FROM menu where category='Chocolates';";
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




<!-- Ice-Cream -->
<div class="popular_cakes" id="Ice-Cream" style="display:none">
    <div class="container">
        <h3 class="heading">Ice-Cream</h3>
        <div class="cakes_grids">
             <?php 
$a=0;
$sql="SELECT * FROM menu where category='Ice-Cream';";
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




<!-- Other/Extras -->
<div class="popular_cakes" id="Other/Extras" style="display:none">
    <div class="container">
        <h3 class="heading">Other/Extras</h3>
        <div class="cakes_grids">
             <?php 
$a=0;
$sql="SELECT * FROM menu where category='Other/Extras';";
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






<script type="text/javascript">

function menus() {
    if (document.getElementById("c1").value == "Breakfast"){
    //  document.getElementById("message").innerHTML = "Common message";
  document.getElementById("Breakfast").style.display="block";
  document.getElementById("Rice").style.display="none";
  document.getElementById("Lunch").style.display="none";
  document.getElementById("Snacks").style.display="none";
  document.getElementById("Other/Extras").style.display="none";
  document.getElementById("Ice-Cream").style.display="none";
  document.getElementById("Chocolates").style.display="none";
  document.getElementById("Drinks").style.display="none";


    }     


      if (document.getElementById("c1").value == "Drinks"){
    //  document.getElementById("message").innerHTML = "Common message";
  document.getElementById("Breakfast").style.display="none";
  document.getElementById("Rice").style.display="none";
  document.getElementById("Lunch").style.display="none";
  document.getElementById("Snacks").style.display="none";
  document.getElementById("Other/Extras").style.display="none";
  document.getElementById("Ice-Cream").style.display="none";
  document.getElementById("Chocolates").style.display="none";
  document.getElementById("Drinks").style.display="block";


    }     

      if (document.getElementById("c1").value == "Chocolates"){
    //  document.getElementById("message").innerHTML = "Common message";
  document.getElementById("Breakfast").style.display="none";
  document.getElementById("Rice").style.display="none";
  document.getElementById("Lunch").style.display="none";
  document.getElementById("Snacks").style.display="none";
  document.getElementById("Other/Extras").style.display="none";
  document.getElementById("Ice-Cream").style.display="none";
  document.getElementById("Chocolates").style.display="block";
  document.getElementById("Drinks").style.display="none";


    }     

      if (document.getElementById("c1").value == "Ice-Cream"){
    //  document.getElementById("message").innerHTML = "Common message";
  document.getElementById("Breakfast").style.display="none";
  document.getElementById("Rice").style.display="none";
  document.getElementById("Lunch").style.display="none";
  document.getElementById("Snacks").style.display="none";
  document.getElementById("Other/Extras").style.display="none";
  document.getElementById("Ice-Cream").style.display="block";
  document.getElementById("Chocolates").style.display="none";
  document.getElementById("Drinks").style.display="none";


    }     

      if (document.getElementById("c1").value == "Other/Extras"){
    //  document.getElementById("message").innerHTML = "Common message";
  document.getElementById("Breakfast").style.display="none";
  document.getElementById("Rice").style.display="none";
  document.getElementById("Lunch").style.display="none";
  document.getElementById("Snacks").style.display="none";
  document.getElementById("Other/Extras").style.display="block";
  document.getElementById("Ice-Cream").style.display="none";
  document.getElementById("Chocolates").style.display="none";
  document.getElementById("Drinks").style.display="none";


    }     

      if (document.getElementById("c1").value == "Snacks"){
    //  document.getElementById("message").innerHTML = "Common message";
  document.getElementById("Breakfast").style.display="none";
  document.getElementById("Rice").style.display="none";
  document.getElementById("Lunch").style.display="none";
  document.getElementById("Snacks").style.display="block";
  document.getElementById("Other/Extras").style.display="none";
  document.getElementById("Ice-Cream").style.display="none";
  document.getElementById("Chocolates").style.display="none";
  document.getElementById("Drinks").style.display="none";


    }     

      if (document.getElementById("c1").value == "Lunch"){
    //  document.getElementById("message").innerHTML = "Common message";
  document.getElementById("Breakfast").style.display="none";
  document.getElementById("Rice").style.display="none";
  document.getElementById("Lunch").style.display="block";
  document.getElementById("Snacks").style.display="none";
  document.getElementById("Other/Extras").style.display="none";
  document.getElementById("Ice-Cream").style.display="none";
  document.getElementById("Chocolates").style.display="none";
  document.getElementById("Drinks").style.display="none";


    }     

      if (document.getElementById("c1").value == "Rice"){
    //  document.getElementById("message").innerHTML = "Common message";
  document.getElementById("Breakfast").style.display="none";
  document.getElementById("Rice").style.display="block";
  document.getElementById("Lunch").style.display="none";
  document.getElementById("Snacks").style.display="none";
  document.getElementById("Other/Extras").style.display="none";
  document.getElementById("Ice-Cream").style.display="none";
  document.getElementById("Chocolates").style.display="none";
  document.getElementById("Drinks").style.display="none";


    }       
}

</script>


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