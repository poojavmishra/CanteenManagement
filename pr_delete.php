<?php
session_start();
include("db/dbh.php");

$pr_id=$_POST['pr_id'];
$sql = "DELETE FROM product WHERE pr_id='$pr_id'";

//sends the query to delete the entry
$result=mysqli_query ($conn,$sql);
header("location:product.php");

?>