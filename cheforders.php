<?php
@ob_start();
session_start();  
if (isset($_SESSION['chef_loggedin']) && $_SESSION['chef_loggedin'] == true) {
    ?>

    <?php  
    
    
    include('db/dbh.php') ;
    $chef_id=$_SESSION['chef_id'];
    $sql= "SELECT * FROM chef_details WHERE chef_id='$chef_id'";
    $record=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($record);
    $name = $row['chef_name'];
        $chef_id = $row['chef_id'];


?>




<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recent New Orders</title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>

<center><h1>All Recent Placed Orders !</h1> <br>
<h3><a href="chefhome.php">Home</a> &nbsp;&nbsp;&nbsp; <a href="cheforders.php">Refresh</a></h3>
 </center>
    <?php
$x="order placed";
    include('db/dbh.php') ;
					  $sql="SELECT * FROM booking WHERE status='".$x."';";
  //$sql="SELECT * FROM sales WHERE cname='".$_POST['cs']."';";

					  $res=mysqli_query($conn,$sql);
					  while($row=mysqli_fetch_assoc($res)){

                        ?>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Booking ID: <?php echo $row["bid"]; ?><br>
                               Order Date:<?php echo $row["date"]; ?><br>
                               Order Time:<?php echo $row["time"]; ?>
                            </td>   
                               
                            <td>
                                Payment Mode : <?php echo $row["pay"]; ?><br>
                                 Booking By User : <?php echo $row["uid"]; ?> 
                           
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <!--<tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Address.<br>
                                12345 Sunny Road<br>
                                Sunnyville, TX 12345
                            </td>
                            
                            <td>
                                Acme Corp.<br>
                                John Doe<br>
                                john@example.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>-->
            
          
            
            <tr class="heading">
                <td>
                    Item
                </td>
                <td>
                    Qty
                </td>
                <td>
                    Rate
                </td>
                
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                   <?php echo $row["fn1"]; ?>
                </td>
                
                <td>
                    <?php echo $row["qt1"]; ?>
                </td>
                <td>
                    <?php echo $row["rt1"]; ?>
                </td>
                <td>
                    <?php echo $row["am1"]; ?>
                </td>
            </tr>
            <tr class="item">
                <td>
                   <?php echo $row["fn2"]; ?>
                </td>
                
                <td>
                    <?php echo $row["qt2"]; ?>
                </td>
                <td>
                    <?php echo $row["rt2"]; ?>
                </td>
                <td>
                    <?php echo $row["am2"]; ?>
                </td>
            </tr>
            <tr class="item">
                <td>
                   <?php echo $row["fn3"]; ?>
                </td>
                
                <td>
                    <?php echo $row["qt3"]; ?>
                </td>
                <td>
                    <?php echo $row["rt3"]; ?>
                </td>
                <td>
                    <?php echo $row["am3"]; ?>
                </td>
            </tr>
            <tr class="item">
                <td>
                   <?php echo $row["fn4"]; ?>
                </td>
                
                <td>
                    <?php echo $row["qt4"]; ?>
                </td>
                <td>
                    <?php echo $row["rt4"]; ?>
                </td>
                <td>
                    <?php echo $row["am4"]; ?>
                </td>
            </tr>
            <tr class="item">
                <td>
                   <?php echo $row["fn5"]; ?>
                </td>
                
                <td>
                    <?php echo $row["qt5"]; ?>
                </td>
                <td>
                    <?php echo $row["rt5"]; ?>
                </td>
                <td>
                    <?php echo $row["am5"]; ?>
                </td>
            </tr>
            <tr class="total">
                
            </tr>
            

            <tr class="total">
                <td><b>Total</b>
                </td><td>
                </td><td>
                </td>
                
                <td>
                <?php echo $row["total"]; ?>
                </td>
            </tr>


        </table>
    </div>
<?php
}
?>
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
<button  class="btn-login" style="margin-left: 20px;"><a href="index.php" style="text-decoration:none;color: white;">Login</a></button>
</div>
</body>
</html>

<?php
}
?>