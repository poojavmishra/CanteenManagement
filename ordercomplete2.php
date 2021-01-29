<?php  
	@ob_start();
	session_start(); 
	include('db/dbh.php') ;
	$id=$_POST['in'];
	
$sql = "UPDATE bookingchef SET status='Order Completed' WHERE bid='".$id."'";

if ($conn->query($sql) === TRUE) {
$n=1;

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

<link href="css/contact.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
</head>

    <div class="innerpages_banner">
        <h2>
 <br>
 <label>Done!</label>
       <br><br>
 <a href="stockhome.php">Back to Home</a>
    </h2>
      
        </div>
</html>
