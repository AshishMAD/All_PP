<?php 


//Connect To The Database

$db = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");

if(isset($_GET['submit']))
{
$name2 = $_GET['name1'];
$email2 = $_GET['email1'];
$add2 = $_GET['add1'];
$phone2 = $_GET['c_phone1'];
$pswd2 = $_GET['pswd1'];


$res=pg_query($db,"INSERT INTO company VALUES('{$email2}','{$name2}','{$pswd2}','{$add2}','{$phone2}')");

// function for script
echo '<script type="text/javascript">';
echo 'function myFunction(){ alert("Email Already exist") };';
echo '</script>';


if(!$res)
{  
echo'<BODY onLoad="myFunction()">';
}
else {
echo' <script> alert("Company Registration Successful!!!")</script> ';
}


}

?>



<html>
<head>
<title>COMPANY-Register Yourself Here</title>
<style>
   
body
{
background-color:grey;
}
h1{
color:black;
text-align:center;
font-size:55px;
font-family: Sans-serif;
}
h2{
 font-family: Sans-serif; 
 font-size: 24px;     
 font-style: normal; 
 font-weight: bold; 
 color: black;
 text-align: center; 
 text-decoration: underline;
}
table{
 font-family: verdana; 
 color:white; 
 font-size: 16px; 
 font-style: normal;
 font-weight: bold;
 background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);  
 border-collapse: collapse; 
 border: 4px solid #000000;
 border-style: dashed; 
 width:100%;
 height:70%;
  
}
table.inner{
 border: 10px
}
input[type=text], input[type=email],input[type=password], input[type=number]{
 width: 50%;
 padding: 6px 12px;
 margin: 5px 0;
 box-sizing: border-box;
}
input[type=submit], input[type=reset]{
 width: 15%;
 padding: 8px 12px;
 margin: 5px 0;
 box-sizing: border-box; 
 background-color:#4CAF50;
 font-size:16px;
 font-weight:bold;
 border-radius:12px;
 border-color:red;
 box-shadow:0 9px #999;
}
img{
float:right;
width:10%;
height:auto;
}

</style>

<script>


function checkPassword(form) { 

                password1 = form.pswd1.value; 

                password2 = form.pswd2.value;
        
                if (password1 != password2) { 

                    alert ("\nPassword did not match: Please try again...") 

                    return false; 

                } 

  

 }  

function myFunction() {
  var x = document.getElementById("pswd1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
 function myFunction1() {
  var x = document.getElementById("pswd2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
        </script> 


</head>

<body>
<header>
<img src="PP2.jpeg"></img>
<h1>Plastio-Portal</h1></header>
<h2><b> COMPANY REGISTRATION <b></h2>
<form method='GET' onSubmit="return checkPassword(this)">
<table align="center" cellpadding = "10">
<!--------------------- Name ------------------------------------------>

<tr>
<td>Company Name</td>
<td><input type="text" name="name1"  pattern="[a-zA-Z].{1,}" maxlength="50" title="Only Characters are allowed" placeholder="Max 50 Characters Allowed" required />

</td>
</tr>

<!-------------------------- Email ID ------------------------------------->
<tr>
<td>Company Email ID</td>
<td><input type="email" name="email1" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength=100 title="eg. ashish@gmail.com" placeholder="Enter Email" required/></td>
</tr>

<tr>
<td> Enter Company Phone number<br /><br /><br /></td>
<td><input type="tel" id="c_phone" name="c_phone1" placeholder="Without Country code" title="Must contain exactly 10 digits" pattern="[6-9]{1}[0-9]{9}" required /></td>
</tr>

<tr>
<td> Company Address<br /><br /><br /></td>
<td><textarea name="add1" minlength=4 rows="3" cols="50" placeholder="Full Address" required></textarea></td>
</tr>




<!-------------------------- PASSWORD ------------------------------------->
<tr>
<td>Password<br /><br /><br /></td>
<td>
<input type="password" pattern="[a-zA-Z0-9].{4,}" id="pswd1" name="pswd1" placeholder="Enter Password"  title="Must Contain 8 or more characters (Alphabets and Numbers Allowed)" required/>
<input type = "checkbox" onclick="myFunction()">Show Password
</td>
</tr>
<tr>
<td> confirm Password<br /><br /><br /></td>
<td>
<input type="password" id="pswd2" name="pswd2" placeholder="Please Confirm Password" required/>
<input type = "checkbox" onclick="myFunction1()">Show Password
</td>
</tr>



<!----------------------- Submit and Reset ------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="REGISTER">

</td>
</tr>
<tr>
<td  colspan="2" align="center">

<input type="reset" value="RESET">
</td>
</tr>
</table>
</form>
<footer>
<a href="Plastio_Portal.html"><h4> Back </h4> </a>
<a href="CompanyLogin.php"><h4> Login Page</h4> </a>
</body>
</body>
</html>
