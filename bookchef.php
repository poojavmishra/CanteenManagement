




<?php
@ob_start();

    include('db/dbh.php') ;
    $n=0;

session_start();  
    $chef_id=$_SESSION['chef_id'];
    $sql= "SELECT * FROM chef_details WHERE chef_id='$chef_id'";
    $record=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($record);
    $us = $row['chef_name'];
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

date_default_timezone_set('Asia/Kolkata');
$dt=date("d-m-Y");
$tm=date("h:i:sa");
$pay="COD";
$bk1=$_POST['pd1'];
$bk2=$_POST['pd2'];
$bk3=$_POST['pd3'];
$bk4=$_POST['pd4'];
$bk5=$_POST['pd5'];
//echo $bk1;

if($qt1!=""){
    $s="SELECT pr_qty FROM product WHERE pr_name='$bk1';";
    $resz=mysqli_query($conn,$s);
    $rowz=mysqli_fetch_assoc($resz);
    $qty=$rowz['pr_qty'];
    $sum=$qty-$qt1;
    $sq="UPDATE product SET pr_qty=$sum WHERE pr_name='$bk1';";
    mysqli_query($conn,$sq);
}

if($qt2!=""){
    $s="SELECT pr_qty FROM product WHERE pr_name='$bk2';";
    $resz=mysqli_query($conn,$s);
    $rowz=mysqli_fetch_assoc($resz);
    $qty=$rowz['pr_qty'];
    $sum=$qty-$qt2;
    $sq="UPDATE product SET pr_qty=$sum WHERE pr_name='$bk2';";
    mysqli_query($conn,$sq);
}

if($qt3!=""){
    $s="SELECT pr_qty FROM product WHERE pr_name='$bk3';";
    $resz=mysqli_query($conn,$s);
    $rowz=mysqli_fetch_assoc($resz);
    $qty=$rowz['pr_qty'];
    $sum=$qty-$qt3;
    $sq="UPDATE product SET pr_qty=$sum WHERE pr_name='$bk3';";
    mysqli_query($conn,$sq);
}

if($qt4!=""){
    $s="SELECT pr_qty FROM product WHERE pr_name='$bk4';";
    $resz=mysqli_query($conn,$s);
    $rowz=mysqli_fetch_assoc($resz);
    $qty=$rowz['pr_qty'];
    $sum=$qty-$qt4;
    $sq="UPDATE product SET pr_qty=$sum WHERE pr_name='$bk4';";
    mysqli_query($conn,$sq);
}

if($qt5!=""){
    $s="SELECT pr_qty FROM product WHERE pr_name='$bk5';";
    $resz=mysqli_query($conn,$s);
    $rowz=mysqli_fetch_assoc($resz);
    $qty=$rowz['pr_qty'];
    $sum=$qty-$qt5;
    $sq="UPDATE product SET pr_qty=$sum WHERE pr_name='$bk5';";
    mysqli_query($conn,$sq);
}



	$n=2;


$sql = "INSERT INTO bookingchef(fn1, fn2, fn3, fn4, fn5, qt1, qt2, qt3, qt4, qt5, pay, uid, date, time) VALUES('$bk1', '$bk2', '$bk3', '$bk4', '$bk5', '$qt1', '$qt2', '$qt3', '$qt4', '$qt5', '$pay', '$us', '$dt', '$tm')";

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
 <a href="chefhome.php">Back to Home</a>
    </h2>
      
        </div>
</html>