<?php
session_start();
include("db/dbh.php");

$c_id=$_POST['cat_id'];
$sql = "DELETE FROM category WHERE cat_id='$c_id'";

//sends the query to delete the entry
$result=mysqli_query ($conn,$sql);
header("location:category.php");

?>