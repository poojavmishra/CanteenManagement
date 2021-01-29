<?php
session_start();
@ob_start();
 include('db/dbh.php') ;
 $n=0;
 if ($_SESSION["em"]=="") {
    # code...
    die();
}

$pd1=$_POST['pd1'];//food name
$pd2=$_POST['pd2'];
$pd3=$_POST['pd3'];
$pd4=$_POST['pd4'];
$pd5=$_POST['pd5'];
$qt1=$_POST['qt1'];//qty
$qt2=$_POST['qt2'];
$qt3=$_POST['qt3'];
$qt4=$_POST['qt4'];
$qt5=$_POST['qt5'];
$rt1=$_POST['rt1'];//rate
$rt2=$_POST['rt2'];
$rt3=$_POST['rt3'];
$rt4=$_POST['rt4'];
$rt5=$_POST['rt5'];
$txa=$_POST['txa'];//amt
$txb=$_POST['txb'];
$txc=$_POST['txc'];
$txd=$_POST['txd'];
$txe=$_POST['txe'];
$fin=$_POST['fin'];
date_default_timezone_set('Asia/Kolkata');
$dt=date("d-m-Y");
$tm=date("h:i:sa");
$us=$_SESSION["em"];
$pay="COD";

$bk1=$_POST['test_text1'];
$bk2=$_POST['test_text2'];
$bk3=$_POST['test_text3'];
$bk4=$_POST['test_text4'];
$bk5=$_POST['test_text5'];

if($fin=="")
{
	$n=5;
}


$sql = "INSERT INTO booking(fn1, fn2, fn3, fn4, fn5, qt1, qt2, qt3, qt4, qt5, am1, am2, am3, am4, am5, rt1, rt2, rt3, rt4, rt5, total, pay, uid, date, time) VALUES('$bk1', '$bk2', '$bk3', '$bk4', '$bk5', '$qt1', '$qt2', '$qt3', '$qt4', '$qt5', '$txa', '$txb', '$txc', '$txd', '$txe', '$rt1', '$rt2', '$rt3', '$rt4', '$rt5', '$fin', '$pay', '$us', '$dt', '$tm')";

if($n!=5){
if ($conn->query($sql) === TRUE) {
$n=1;

	//echo "<center><h1>Order Completed!</h1></center>";
}
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
        <?php 
        if($n==1)
        	{ echo "Order Success !";}
        if($n==5){
        	echo "Order Failed Please place New Order !";
        }  ?><br><br>
 <a href="student_home.php">Back to Home</a>
    </h2>
      
        </div>
</html>