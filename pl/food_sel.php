

<?php
session_start();  

$connect = mysqli_connect("localhost", "id4957706_canteen", "123456789", "id4957706_canteen");
if (isset($_SESSION['staff_loggedin']) && $_SESSION['staff_loggedin'] == true) {
    ?>

    <?php  
	
	
	include('db/dbh.php') ;
	$s_userid=$_SESSION['s_userid'];
	$sql= "SELECT * FROM staff WHERE s_userid='$s_userid'";
	$record=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($record);
	$s_name = $row['s_name'];
		$s_userid1 = $row['s_userid'];
		

?>



<!DOCTYPE html>
<html>
<head>
<title>Teacher Portal</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js">
    </script>
    <link rel="stylesheet" type="text/css" href="css/one.css">
       
        <link rel="icon" href="img/favicon.ico" type="image/gif" sizes="32x32">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>

<div class="wrapper">

<div class="welcome">
    Welcome<br>
    <?php echo $_SESSION['s_name'];  ?>
</div>

<div class="portal">
    
    <h1>Staff Portal</h1>

</div>

<div class="sidebar">
    
     <div class="link">

<a href="food_sel.php">
Menu
</a>
</div>

<div class="link">

<a href=".php">
My Order
</a>
</div>

<div class="link">

<a href=".php">
Account
</a>
</div>

<div class="link">

<a href="s_logout.php">
Logout
</a>
</div>

</div>

<div class="content">
    
    <span>Menu</span>
    
     <br><br>
    <hr style="color: #eeeeee; ">

    <div class="content5" >
        

        <form action="food_sel.php" method="POST" name="form">

        <?php

if(isset($_POST["add"]))
{
    if(isset($_SESSION["cart"]))
    {
        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if(!in_array($_GET["f_id"], $item_array_id))
        {
            $count = count($_SESSION["cart"]);
            $item_array = array(
            'product_id' => $_GET["f_id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="food_sel.php"</script>';
        }
        else
        {
            echo '<script>alert("Products already added to cart")</script>';
            echo '<script>window.location="food_sel.php"</script>';
        }
    }
    else
    {
        $item_array = array(
        'product_id' => $_GET["f_id"],
        'item_name' => $_POST["hidden_name"],
        'product_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["cart"][0] = $item_array;
    }
}
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["cart"] as $keys => $values)
        {
            if($values["product_id"] == $_GET["f_id"])
            {
                unset($_SESSION["cart"][$keys]);
                
                echo '<script>window.location="food_sel.php"</script>';
            }
        }
    }
}
?>

<div class="container" style="width:80%;">
	<h2>welcome staff...</h2><br>

    <select name="category" id="category" onchange="getid1(this.value);">
        <option value="0">Select Category</option>
        <option value="Breakfast">Breakfast</option>
        <option value="Snacks">Snacks</option>
        <option value="Rice">Rice</option>
        <option value="Main Course">Main Course</option>
        <option value="Drinks">Drinks</option>
    </select>


     <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  ></script>
    <script type="text/javascript">
    
        function getid1(val){
            $.ajax({
                type:"POST",
                url:"getteacherdata.php",
                data: {
                category: $("#category").val()
            },
                success: function(data){
                    $("#t_list").html(data);
                }
            });
        }
   
    </script>




<br><br>
    <?php
	$query = "SELECT * FROM menu ORDER BY f_id ASC";
	$result = mysqli_query($connect, $query);
	$row2=mysqli_num_rows($result);
    if(mysqli_num_rows($result)>0)
	{      

		while($row = mysqli_fetch_array($result))
		{
			?>

            <div class="col-md-3">
            <form method="post" action="food_sel.php?action=add&f_id=<?php echo $row["f_id"]; ?>">
            <div style="border: 1px solid #eaeaec; margin: 10px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:5px;" align="center" >
            <img src="<?php echo $row["image"]; ?>" class="img-responsive" width="200px" height="100px;">
            <h4 class="text-info"><?php echo $row["f_name"]; ?></h4>
            <h5 class="text-danger">Rs. <?php echo $row["price"]; ?></h5>
            <input type="text" name="quantity" class="form-control" value="1" style="width: 50px; text-align: center;">
            <input type="hidden" name="hidden_name" value="<?php echo $row["f_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="Add to Bag">
            </div>
            </form>
            </div>
            <?php
		}
	}
	?>
    <div style="clear:both"></div>
    <h2>My Shopping Bag</h2>
    <div class="table-responsive">
    <table class="table table-bordered">
    <tr>
    <th width="40%">Product Name</th>
    <th width="10%">Quantity</th>
    <th width="20%">Price Details</th>
    <th width="15%">Order Total</th>
    <th width="5%">Action</th>
    </tr>
    <?php
	if(!empty($_SESSION["cart"]))
	{
		$total = 0;
		foreach($_SESSION["cart"] as $keys => $values)
		{
			?>
            <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"] ?></td>
            <td>Rs. <?php echo $values["product_price"]; ?></td>
            <td>Rs. <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
            <td><a href="shop.php?action=delete&f_id=<?php echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></td>
            </tr>
            <?php 
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		?>
        <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">Rs. <?php echo number_format($total, 2); ?></td>
        <td></td>
        </tr>
        <?php
	}
	?>
    </table>
    </div>
    </div>
    
		</form>
        </div>
    
    
</div>

</div>


</body>
</html>




<?php } 
else {?>

    <!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="icon" href="img/favicon.ico" type="image/gif" sizes="32x32">
</head>
<body>
<div class="error">
<h1>ERROR 404!</h1>
Please Login For Proceed<br><br>
<button  class="btn-login" style="margin-left: 20px;"><a href="login.php" style="text-decoration:none;color: white;">Login</a></button>
</div>
</body>
</html>

<?php
}
?>