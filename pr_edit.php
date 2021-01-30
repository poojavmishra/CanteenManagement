<?php
include("db/dbh.php");
if(isset($_GET['pr_id']))
{
$id=$_GET['pr_id'];

if(isset($_POST['submit1']))
{
        $name = $_POST['pr_name'];
        $rate = $_POST['pr_rate'];
        $qty = $_POST['pr_qty'];
        $cat_id = $_POST['cat_id'];
        $status = $_POST['status'];
$query3=mysqli_query($conn,"UPDATE product SET pr_name='$name', 
    status='$status', pr_rate='$rate', pr_qty='$qty', cat_id='$cat_id' WHERE pr_id='$id'");
if($query3)
{
header("location:product.php");
}
}
$query1=mysqli_query($conn,"SELECT * FROM product WHERE pr_id='$id'");
$query2=mysqli_fetch_array($query1);
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Update Products </title>
    
 <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- bootstrap css -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/about.css" rel="stylesheet"> 

</head>
<body>
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
                        <a class="navbar-brand" href="index.php">
         <h1>Stock</h1>
                        </a>
                    </div>
                    </div>
                     <div class="collapse navbar-collapse" id="bs-example-n avbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                
                                
                            </ul>
                        </nav>
                    </div>
                    <!--/.navbar-collapse-->
                    <!--/.navbar-->
                </div>
            </nav>
        </div>
    </div>

<div class="innerpages_banner">
        <h2>
  <br>
 <?php echo "update categories"  ?></h2>
        </div>
        <center><h1>Update Product</h1></center>

<form  method="POST" name="form" >
<table>
    <tr>
        <td>product Name</td>
        <td><input type="text" name="pr_name" placeholder="Name"  required autofocus value="<?php echo $query2['pr_name']; ?>" ></td>
    </tr>
    <tr>
        <td>product rate</td>
        <td><input type="text" name="pr_rate" placeholder="Name"  required autofocus value="<?php echo $query2['pr_rate']; ?>" ></td>
    </tr>
    <tr>
        <td>product qty</td>
        <td><input type="text" name="pr_qty" placeholder="Name"  required autofocus value="<?php echo $query2['pr_qty']; ?>" ></td>
    </tr>
    <tr>
        <td>category</td>
        <td>
                <select name="cat_id">
                <?php 
                $sql= "SELECT * FROM category WHERE status=1 ";
                $record=mysqli_query($conn,$sql);
                while ($cat=mysqli_fetch_assoc($record)) {

        
                ?>
                <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
                <?php } ?>
                </select>
            </td>
    </tr>
    
        
        
        <tr>
            <td>Status: </td>
            <td>
                <select name="status">
                
                <option value="1">Available</option> 
                <option value="0">Unavailable</option></select>
            </td>
        </tr>
    <tr>
        <td><button class="btn-login6" type="submit" name="submit1">Update</button></td>
    </tr>

    </table>
    </form>

</body>
</html>