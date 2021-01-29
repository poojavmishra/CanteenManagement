
<?php  
    
    include('db/dbh.php') ;
    
    $sql= "SELECT * FROM category ";
    $record=mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html>
<head>
<title>Category</title>
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- bootstrap css -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/about.css" rel="stylesheet"> 

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
                        <a class="navbar-brand" href="index.php">
         <h1>Stock</h1>
                        </a>
                    </div>
                     <div class="collapse navbar-collapse" id="bs-example-n avbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                <li><a href="add_cat.php" class="active">Add Category</a></li>
                                <li><a href="product.php">Product</a></li>
                                
                                
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
 <?php echo "Manage categories"  ?></h2>
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
                            <h3 class="panel-title">Category List</h3>
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
         
<th>Category Name</th>
    <th>Status</th>
    
    <th>Action</th>
</tr>
<tr>
<?php  
    while ($cat=mysqli_fetch_assoc($record)) {

        ?>
        <tr>
        <td><?php echo $cat['cat_name']?></td>
        <td><?php 
          if ($cat['status']==1) {
            echo "Available";
          }
          else{
            echo "Unavailable";
          }



        ?></td>
            <td >
    <form action='cat_delete.php?name="<?php echo $cat['cat_id']; ?>"' method="POST">
        <input type="hidden" name="cat_id" value="<?php echo $cat['cat_id']; ?>">
        
        <button class="btn-login5" type="submit" name="submit" >Delete </button>
    </form>
    
    

     <?php  
    echo "<button class='btn-login5' style='margin-top:10px;''><a style='color:#373e4a; ' href='cat_edit.php?cat_id=".$cat['cat_id']."'>Update</a></button>";
    ?>
</td>   

            
        
        </tr>
    <?php  } ?>
        
    

    

</tr>

 </table>
<div class="footer">
                <center><font color="white"><p>2018 Canteen Management System. All Rights Reserved</p></font></center>
            
        
    </div>


</body>
</html>s