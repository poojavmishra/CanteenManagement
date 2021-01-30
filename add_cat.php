<?php
	include('db/dbh.php') ;
	if (isset($_POST['register-btn'])) {
        $name = $_POST['cat_name'];
        
        $status = $_POST['status'];

        $sql="INSERT INTO category(cat_name,status) VALUES('$name','$status')";
        mysqli_query($conn,$sql);
        
        
        header("location:category.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>
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
        <center><h1>Add Category</h1></center>

	<form action="add_cat.php" method="POST" name="form" >
<table>
    <tr>
        <td>category Name</td>
        <td><input type="text" name="cat_name" placeholder="Name" class="textinput1" required autofocus></td>
    </tr>
    
        
        
        <tr>
            <td>status: </td>
            <td>
                <select name="status">
                
                <option value="1">Available</option> 
                <option value="0">Unavailable</option></select>
            </td>
        </tr>
    <tr>
        
        <td><button class="btn-login6" type="submit" name="register-btn">Add</button></td>
    </tr>

    </table>
    </form>


</body>
</html>