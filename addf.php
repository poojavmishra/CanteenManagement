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





<?php
$n=0;

if(isset($_POST['sub'])){
 


$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    $x=basename( $_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {} 
    else {
        echo "Sorry, there was an error uploading your file.";
    }




   $uim=$_POST['fname'];
if($uim=="")
{
$n=0;
//echo "blank";
}
else
{
//echo $uim;

$uim=$_POST['fname'];
$pp=$_POST['price'];
$cat=$_POST['cat'];

$sql = "INSERT INTO menu (f_name,price,category,img) VALUES ('$uim','$pp','$cat','$x')";

if ($conn->query($sql) === TRUE) {
$n=1;
} 


}
}
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
                                <li><a href="#">Orders </a></li>
                                <li><a href="#">Reports</a></li>
                                <li><a href="#">Logout</a></li>
                                
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
       
        </div>
<div class="mail_grid_w3l">
      
                <form action="addf.php" name="myForm" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 ">
                          <h2>Add Details :</h2>
                        <div class="contact-fields-w3ls">
                            <input type="text" name="fname" placeholder="Food Name" required="">
                        </div>
                        <div class="contact-fields-w3ls">
                            <select name="cat" >
                            <option value="Breakfast">Breakfast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Rice">Rice</option>
                            <option value="Snacks">Snacks</option>
                            <option value="Drinks">Drinks</option>
                            <option value="Chocolates">Chocolates</option>
                            <option value="Ice-Cream">Ice-Cream</option>
                             <option value="Other/Extras">Other/Extras</option>
                           
                            </select>
                        </div>
                        <div class="contact-fields-w3ls">
                            <input type="text" name="price" placeholder="Price" required="" onkeyup="checkInp();">
                        </div>
                        <div class="contact-fields-w3ls">
                          Select Image :  <input type="file" name="fileToUpload" placeholder="Image" required="">
                        </div>
                        <div class="contact-fields-w3ls">
                            <br>
                        <input type="submit" name="sub" value="Submit" >
                        </div>
                    </div>
                    <?php
                    if ($n==1) {
                        echo "<h3>Food Added !</h3>";
                    }
                    ?>
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