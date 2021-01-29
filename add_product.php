<?php
	include('db/dbh.php') ;
	if (isset($_POST['submit1'])) {
        $name = $_POST['pr_name'];
        $rate = $_POST['pr_rate'];
        $qty = $_POST['pr_qty'];
        $cat_id = $_POST['cat_id'];
        $minimum = $_POST['min'];
       $sql="INSERT INTO product(pr_name,pr_rate,pr_qty,cat_id,minimum) VALUES('$name','$rate','$qty','$cat_id','$minimum');";
        mysqli_query($conn,$sql);
       
if ($conn->query($sql) === TRUE){ header("location:product.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
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
    <!-- //header -->



<!-- innerpages_banner -->
     <div class="innerpages_banner">
        <h2>
  <br>
 <?php echo "Manage Products"  ?></h2>
        </div>
        <center><h1>Add Products</h1></center>
	<form action="add_product.php" method="POST" name="form" >
<table>
    <tr>
        <td>Product Name</td>
        <td><input type="text" name="pr_name" placeholder="Name"  required autofocus  ></td>
    </tr>
    <tr>
        <td>Product rate</td>
        <td><input type="text" name="pr_rate" placeholder="Rate"  required   ></td>
    </tr>
    <tr>
        <td>Product qty</td>
        <td><input type="text" name="pr_qty" placeholder="Qty"  required   ></td>
    </tr> 
    <tr>
        <td>Minimun Stock Maintain</td>
        <td><input type="text" name="min" placeholder="Minimun"  required   ></td>
    </tr>
    <tr>
        <td>Category</td>
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
        <td><button class="btn-login6" type="submit" name="submit1">Add</button></td>
    </tr>
    </table>
    </form>
</body>
</html>