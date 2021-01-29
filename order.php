<?php
@ob_start();
session_start();  

$connect = mysqli_connect("localhost", "root", "","gpmcanteen");
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
<title>Canteen</title>
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- bootstrap css -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/contact.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 


<style>
table, th, td {
    border: 1px solid black;

    padding: 5px;
}
</style>
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
                        <a class="navbar-brand" href="staff_home.php">
                            <h1>Canteen</h1>
                        </a>
                    </div>
                    <!--/.navbar-header-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                <li><a href="staff_home.php" class="active">Menu</a></li>
                               
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
        <?php echo $s_name;  ?></h2>
       
        </div>


<center>
<br><br>
<form action="book.php" method="post">
    <table style="width:40%">
  <tr>
    <th width="10">No</th>
    <th width="50">Food Name</th><th width="10">Qty</th>
    <th width="15">Rate</th>
    <th width="15">Amount</th>
  </tr>

 <!--food 1--> 
 <tr>
  <td>
    <input type="" id="sra" name="sr1" maxlength="4" size="5">
  </td>
<td>

<select  class="frm-field required"  name="pd1" id="fmza" >
<option></option>
<?php

      $sql = "SELECT * From menu where status='available'";
      $result=mysqli_query($conn,$sql);
 $rowcount=mysqli_num_rows($result);
 $rowcount++;

$book = array($rowcount);
$i=0;

while($row=mysqli_fetch_array($result))
{

$pr[$i]=$row['price'];
$book[$i]=$row['f_name'];
        echo "<option value='".$row['price']."'>".$book[$i]."</option>";
$i++;
}
?>
</select>
  </td>


<td>
    <input type="" maxlength="4" size="5"  name="qt1" id="txta"  onkeyup="suma();">
  </td>

<td>
    <input type=""  size="9" id="ratea" onkeyup="suma();" name="rt1">
  </td>
<td>
    <input type="" name="txa" size="9" id="txa" onkeyup="final();">
  </td>
<input type="hidden"  name="test_text1" id="text_content1" value="" />
  </tr>

<script type="text/javascript">
    var sra= document.getElementById('sra');
    var amta= document.getElementById('amta');
    var qta= document.getElementById('qta');
    var mytextboxa = document.getElementById('ratea');
    var mydropdowna = document.getElementById('fmza');
mydropdowna.onchange = function(){
   var fin= document.getElementById('fin');
          mytextboxa.value = mydropdowna.value; 
          sra.value=1;

var txtFirstNumberValuea = document.getElementById('txta').value;
      var txtSecondNumberValuea = document.getElementById('ratea').value;
      var result = parseFloat(txtFirstNumberValuea) * parseFloat(txtSecondNumberValuea);
document.getElementById('text_content1').value=this.options[this.selectedIndex].text
      if (!isNaN(result)) {
         document.getElementById('txa').value = result;

      }
}
function suma() {
      var txtFirstNumberValuea = document.getElementById('txta').value;
      var txtSecondNumberValuea = document.getElementById('ratea').value;
      var result = parseFloat(txtFirstNumberValuea) * parseFloat(txtSecondNumberValuea);
      if (!isNaN(result)) {
         document.getElementById('txa').value = result;

      }
}
</script>




<!--2nd-->

 <tr>
  <td>
    <input type="" id="srb" name="sr2" maxlength="4" size="5">
  </td>
<td>
    <!--booklist-->

<select  class="frm-field required"  name="pd2" id="fmzb">
<option></option>
<?php

      $sql = "SELECT * From menu where status='available'";
      $result=mysqli_query($conn,$sql);
 $rowcount=mysqli_num_rows($result);
 $rowcount++;

$book = array($rowcount);
$i=0;

while($row=mysqli_fetch_array($result))
{

$pr[$i]=$row['price'];
$book[$i]=$row['f_name'];
        echo "<option value='".$row['price']."'>".$book[$i]."</option>";
$i++;
}
?></select>
  </td>



<td>
    <input type="" maxlength="4" size="5"  name="qt2" id="txtb"  onkeyup="sumb();">
  </td>

<td>
    <input type=""  size="9" id="rateb" onkeyup="sumb();" name="rt2">
  </td>
<td>
    <input type="" name="txb" size="9" id="txb">
  </td>

<input type="hidden"  name="test_text2" id="text_content2" value="" />
  </tr>




<script type="text/javascript">
    var srb= document.getElementById('srb');

    var amtb= document.getElementById('amtb');
    var qtb= document.getElementById('qtb');
    var mytextboxb = document.getElementById('rateb');
    var mydropdownb = document.getElementById('fmzb');
mydropdownb.onchange = function(){
          mytextboxb.value = mydropdownb.value; 
          srb.value=2;





      var txtFirstNumberValueb = document.getElementById('txtb').value;
      var txtSecondNumberValueb = document.getElementById('rateb').value;
      var result = parseFloat(txtFirstNumberValueb) * parseFloat(txtSecondNumberValueb);

document.getElementById('text_content2').value=this.options[this.selectedIndex].text
      if (!isNaN(result)) {
         document.getElementById('txb').value = result;

      }



   }

function sumb() {

      var txtFirstNumberValueb = document.getElementById('txtb').value;
      var txtSecondNumberValueb = document.getElementById('rateb').value;
      var result = parseFloat(txtFirstNumberValueb) * parseFloat(txtSecondNumberValueb);
      if (!isNaN(result)) {
         document.getElementById('txb').value = result;
      }
}
</script>



 <tr>
  <td>
    <input type="" id="src" name="sr3" maxlength="4" size="5">
  </td>
<td>
    <!--booklist-->

<select  class="frm-field required"  name="pd3" id="fmzc">
<option></option>
<?php

      $sql = "SELECT * From menu where status='available'";
      $result=mysqli_query($conn,$sql);
 $rowcount=mysqli_num_rows($result);
 $rowcount++;

$book = array($rowcount);
$i=0;

while($row=mysqli_fetch_array($result))
{

$pr[$i]=$row['price'];
$book[$i]=$row['f_name'];
        echo "<option value='".$row['price']."'>".$book[$i]."</option>";
$i++;
}
?></select>
  </td>


<td>
    <input type="" maxlength="4" size="5"  name="qt3" id="txtc"  onkeyup="sumc();">
  </td>

<td>
    <input type=""  size="9" id="ratec" onkeyup="sumc();" name="rt3">
  </td>
<td>
    <input type="" name="txc" size="9" id="txc">
  </td>

<input type="hidden"  name="test_text3" id="text_content3" value="" />
  </tr>




<script type="text/javascript">
    var src= document.getElementById('src');

    var amtc= document.getElementById('amtc');
    var qtc= document.getElementById('qtc');
    var mytextboxc = document.getElementById('ratec');
    var mydropdownc = document.getElementById('fmzc');
mydropdownc.onchange = function(){
          mytextboxc.value = mydropdownc.value; 
          src.value=3;





      var txtFirstNumberValuec = document.getElementById('txtc').value;
      var txtSecondNumberValuec = document.getElementById('ratec').value;
      var result = parseFloat(txtFirstNumberValuec) * parseFloat(txtSecondNumberValuec);

document.getElementById('text_content3').value=this.options[this.selectedIndex].text
      if (!isNaN(result)) {
         document.getElementById('txc').value = result;
      }



   }

function sumc() {
      var txtFirstNumberValuec = document.getElementById('txtc').value;
      var txtSecondNumberValuec = document.getElementById('ratec').value;
      var result = parseFloat(txtFirstNumberValuec) * parseFloat(txtSecondNumberValuec);
      if (!isNaN(result)) {
         document.getElementById('txc').value = result;
      }
}
</script>


 <tr>
  <td>
    <input type="" id="srd" name="sr4" maxlength="4" size="5">
  </td>
<td>
    <!--booklist-->

<select  class="frm-field required"  name="pd4" id="fmzd">
<option></option>
<?php

      $sql = "SELECT * From menu where status='available'";
      $result=mysqli_query($conn,$sql);
 $rowcount=mysqli_num_rows($result);
 $rowcount++;

$book = array($rowcount);
$i=0;

while($row=mysqli_fetch_array($result))
{

$pr[$i]=$row['price'];
$book[$i]=$row['f_name'];
        echo "<option value='".$row['price']."'>".$book[$i]."</option>";
$i++;
}
?>
</select>
  </td>


<td>
    <input type="" maxlength="4" size="5"  name="qt4" id="txtd"  onkeyup="sumd();">
  </td>

<td>
    <input type=""  size="9" id="rated" onkeyup="sumd();" name="rt4">
  </td>
<td>
    <input type="" name="txd" size="9" id="txd">
  </td>

<input type="hidden"  name="test_text4" id="text_content4" value="" />
  </tr>




<script type="text/javascript">
    var srd= document.getElementById('srd');

    var amtd= document.getElementById('amtd');
    var qtd= document.getElementById('qtd');
    var mytextboxd = document.getElementById('rated');
    var mydropdownd = document.getElementById('fmzd');
mydropdownd.onchange = function(){
          mytextboxd.value = mydropdownd.value; 
          srd.value=4;





      var txtFirstNumberValued = document.getElementById('txtd').value;
      var txtSecondNumberValued = document.getElementById('rated').value;
      var result = parseFloat(txtFirstNumberValued) * parseFloat(txtSecondNumberValued);

document.getElementById('text_content4').value=this.options[this.selectedIndex].text
      if (!isNaN(result)) {
         document.getElementById('txd').value = result;
      }



   }

function sumd() {
      var txtFirstNumberValued = document.getElementById('txtd').value;
      var txtSecondNumberValued = document.getElementById('rated').value;
      var result = parseFloat(txtFirstNumberValued) * parseFloat(txtSecondNumberValued);
      if (!isNaN(result)) {
         document.getElementById('txd').value = result;
      }
}
</script>


 <tr>
  <td>
    <input type="" id="sre" name="sr5" maxlength="4" size="5">
  </td>
<td>
    <!--booklist-->

<select  class="frm-field required"  name="pd5" id="fmze">
<option></option>
<?php

      $sql = "SELECT * From menu where status='available'";
      $result=mysqli_query($conn,$sql);
 $rowcount=mysqli_num_rows($result);
 $rowcount++;

$book = array($rowcount);
$i=0;

while($row=mysqli_fetch_array($result))
{

$pr[$i]=$row['price'];
$book[$i]=$row['f_name'];
        echo "<option value='".$row['price']."'>".$book[$i]."</option>";
$i++;
}
?>
</select>
  </td>


<td>
    <input type="" maxlength="4" size="5" name="qt5" id="txte"  onkeyup="sume();">
  </td>

<td>
    <input type=""  size="9" id="ratee" onkeyup="sume();" name="rt5">
  </td>
<td>
    <input type="" name="txe" size="9" id="txe">
  </td>

<input type="hidden"  name="test_text5" id="text_content5" value="" />
  </tr>




<script type="text/javascript">
    var sre= document.getElementById('sre');

    var amte= document.getElementById('amte');
    var qte= document.getElementById('qte');
    var mytextboxe = document.getElementById('ratee');
    var mydropdowne = document.getElementById('fmze');
mydropdowne.onchange = function(){
          mytextboxe.value = mydropdowne.value; 
          sre.value=5;





      var txtFirstNumberValuee = document.getElementById('txte').value;
      var txtSecondNumberValuee = document.getElementById('ratee').value;
      var result = parseFloat(txtFirstNumberValuee) * parseFloat(txtSecondNumberValuee);

document.getElementById('text_content5').value=this.options[this.selectedIndex].text
      if (!isNaN(result)) {
         document.getElementById('txe').value = result;
         document.getElementById('fc').value = result;
      }



   }

function sume() {
      var txtFirstNumberValuee = document.getElementById('txte').value;
      var txtSecondNumberValuee = document.getElementById('ratee').value;
      var result = parseFloat(txtFirstNumberValuee) * parseFloat(txtSecondNumberValuee);
      if (!isNaN(result)) {
         document.getElementById('txe').value = result;
      }
}
</script>





<tr>
   <td><button type='button' onclick="final1();">Subtotal</button>
</td>
<script type="text/javascript">
function final1() {

            var n1 = document.getElementById('txa').value;
      
            if(n1 == "" || n1.length == 0 || n1 == null)
{
n1=0;
}
else{
var n1 = parseFloat(document.getElementById("txa").value);
            }

var n2 = document.getElementById('txb').value;
      
            if(n2 == "" || n2.length == 0 || n2 == null)
{
n2=0;
}
else{
var n2 = parseFloat(document.getElementById("txb").value);
            }


var n3 = document.getElementById('txc').value;
      
            if(n3 == "" || n3.length == 0 || n3 == null)
{
n3=0;
}
else{
var n3 = parseFloat(document.getElementById("txc").value);
            }

var n4 = document.getElementById('txd').value;
      
            if(n4 == "" || n4.length == 0 || n4 == null)
{
n4=0;
}
else{
var n4 = parseFloat(document.getElementById("txd").value);
            }



var n5 = document.getElementById('txe').value;
      
            if(n5 == "" || n5.length == 0 || n5 == null)
{
n5=0;
}
else{
var n5 = parseFloat(document.getElementById("txe").value);
            }



            var fin = n1 + n2 + n3 + n4 + n5;

            document.getElementById("fin").value = fin;
      }

</script>


<td><input type="" name="fin" id="fin"></td>
<td><input type="submit" value="Order" name=""></td>
   </tr>






</table>
</form> <br><br>
</div>
</center>

<!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="agileinfo_copyright">
                <p>© 2018 Canteen Management System. All Rights Reserved</p>
            </div>
        </div>
    </div>
<!-- //footer -->





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

</body>
</html>

<?php
}
?>