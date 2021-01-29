<?php  
    
    include("db/dbh.php");
   	$sql= "SELECT * FROM product ";
    $record=mysqli_query($conn,$sql); 
   
?>




<!DOCTYPE html>
<html>
<head>
	<title> Products</title>
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
                                <li><a href="add_product.php" class="active">Add Product</a></li>
                                </li>
                                
                                
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
       
<!-- //innerpages_banner -->
   
    
<!-- Popular cakes -->

<span id="alert_action"></span>
 <div class="row">
  <div class="col-lg-12">
   <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        <div class="row">
                            <h3 class="panel-title">Product List</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                     <div class="col-sm-12 table-responsive">
                      <table id="category_data" class="table table-bordered table-striped">
                  <thead><tr>

    <th>Product Name</th>
    <th>rate</th>
    <th>Quantity</th>
    <th>category</th>
    <th>status</th>
    <th>actions</th>
</tr>
<tr>
<?php  
    while ($pr=mysqli_fetch_assoc($record)) {

        ?>
        <tr>
        <td><?php echo $pr['pr_name']?></td>
        <td><?php echo $pr['pr_rate']?></td>
        <td><?php echo $pr['pr_qty']?></td>
        <td>
        	<?php
        		$cat_id=$pr['cat_id'];
        		$sql2="SELECT * FROM category WHERE cat_id='$cat_id'";
        		$record2=mysqli_query($conn,$sql2); 
        		$pr_cat=mysqli_fetch_assoc($record2);
        		echo $pr_cat['cat_name'];



        	?>
        </td>
        


        <td><?php 
        	if ($pr['pr_qty']>$pr['minimum']) {
        		echo "Available";
        	}
        	else{
        		echo "Unavailable";
        	}



        ?></td>
            <td >
    <form action='pr_delete.php?name="<?php echo $pr['pr_id']; ?>"' method="POST">
        <input type="hidden" name="pr_id" value="<?php echo $pr['pr_id']; ?>">
        
        <button class="btn-login5" type="submit" name="submit" >Delete </button>
    </form>
    
    

     <?php  
    echo "<button class='btn-login5' style='margin-top:10px;''><a style='color:#373e4a; ' href='pr_edit.php?pr_id=".$pr['pr_id']."'>Update</a></button>";
    ?>
</td>   

            
        
        </tr>
    <?php  } ?>
        
    

    

</tr>

 </table>
</body>
</html>