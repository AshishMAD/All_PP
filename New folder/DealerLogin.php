<?php 
session_start();

//Connect To The Database

$db = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");

if(isset($_POST['submit']))
{
$d_email = $_POST['d_email'];
$d_pswd = $_POST['d_pswd'];

$res = pg_query($db,"SELECT * from dealer where d_email='$d_email' ");

$count=pg_num_rows($res);
if($count==1)
{
$data = pg_fetch_row ($res);
$password=$data[2]; 

if($d_pswd==$password)
{

$_SESSION['d_email']=$_POST['d_email'];
$_SESSION['d_pswd']=$_POST['d_pswd'];
echo'<BODY onLoad="myFunction(){ alert("success") }">';
header('location:Dealer.php');
}
else
{
echo' <script> alert("Password Incorrect!!")</script> ';
}
}
else
{
echo' <script> alert("No Account is Registered with given Email")</script> ';
}

}
?>

<html>
<head>
<title>DEALER LOGIN</title>
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
 text-decoration: underline
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
 width: 70%;
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
function myFunction() {
  var x = document.getElementById("d_pswd");
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
<h2><b> DEALER LOGIN <b></h2>
<form method='POST' >
<table align="center" cellpadding = "10">
<!-------------------------- Email ID ------------------------------------->
<tr>
<td>Dealer Email ID</td>
<td><input type="email" name="d_email" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="eg. ashish@gmail.com" placeholder="Email ID ..." required/></td>
</tr>

<!-------------------------- PASSWORD ------------------------------------->
<tr>
<td>Password<br /><br /><br /></td>
<td>
<input type="password" name="d_pswd" id="d_pswd" placeholder="Password" required/>
<input type = "checkbox" onclick="myFunction()">Show Password
</td>
</tr>



<!----------------------- Submit and Reset ------------------------------->
<tr>
<td colspan="4" align="center">
<input type="submit" name="submit" value="LOGIN""><br /><br />
<input type="reset" value="RESET"><br /><br />
</td>
</tr>
</table>
</form>
<footer>
<a href="Plastio_Portal.html"><h4> Back </h4> </a>
</body>
</html>
