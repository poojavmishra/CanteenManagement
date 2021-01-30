<?php 
@ob_start();
session_start();

$errors = '';
 
$otp=$_SESSION["otp"];
$myemail = $_POST['email'];//<-----Put Your email address here.
$_SESSION["em"]=$myemail;
$email_address = "otp@canteen.otp";

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
    $to = $myemail; 
    $email_subject = "OTP of Canteen";
    $email_body = "You have received a OTP: ".
    "  $otp"; 
    
    $headers = "From: $email_address\n"; 
    $headers .= "Reply-To: $email_address";
    
    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
   // header('Location: contact-form-thank-you.html');
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
                            <h1>Canteen</h1>
                        </a>
                    </div>
                    <!--/.navbar-header-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                <li><a href="index.php" class="active">Menu</a></li>
                                
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
 Welcome <br>
      </h2>
       
        </div>
<div class="mail_grid_w3l">
      
                <form action="chekotp.php" name="myForm" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 ">
                          <h2>Enter OTP :</h2>
                        <div class="contact-fields-w3ls">
                            <input type="text" name="otpz" placeholder="OTP" required=""  >
                        </div>
                      
                        <input type="submit" name="sub" value="Submit" >
                        </div>
                    </div>
                    
                    <div class="clearfix"> </div>

                </form>
            </div>
        </div>
    </div>
    <br>
<!--// Contact -->

<script type="text/javascript">
    function checkInp()
{
  var x=document.forms["myForm"]["price"].value;
  if (isNaN(x)) 
  {
    alert("Must input numbers");
    return false;
  }
}

}

function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}

</script>

<!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="agileinfo_copyright">
                <p>© 2018 Canteen Management System. All Rights Reserved</p>
            </div>
        </div>
    </div>
<!-- //footer -->

