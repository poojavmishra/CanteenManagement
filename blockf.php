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





<?php

$result = mysqli_query($conn, "SELECT * FROM menu where status='available'");
?>




<html>
<head>
<title>Canteen</title>
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- bootstrap css -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/contact.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 

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
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                <li><a href="admin_home.php" class="active">Menu</a></li>
                               
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
       
        </div>
<div class="mail_grid_w3l">
      
                <form action="blockmenu.php" name="myForm" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 ">
                          <h2>Select Food to  Block :</h2><br>
                        <div class="contact-fields-w3ls">
                         <select name="in" id="country" name="cs">
                             <option>NONE</option>
                                            <?php
                                                while ($row=mysqli_fetch_array($result)) {
                                                    echo '<option value="'.$row['f_id'].'">'.$row['f_name'].'</option>';
                                                    # code...
                                                }
                                            ?>
                         </select>
                        </div>
                        <div class="contact-fields-w3ls">
                            <br>
                        <input type="submit" name="sub" value="Submit" >
                        </div>
                    </div>
                    
                    <div class="clearfix"> </div>

                </form>
            </div>
        </div>
    </div>
    <br>
<!--// Contact -->

<script type="text/javascript">
    function checkInp()
{
  var x=document.forms["myForm"]["price"].value;
  if (isNaN(x)) 
  {
    alert("Must input numbers");
    return false;
  }
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