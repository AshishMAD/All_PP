<?php 
session_start();

//Connect To The Database

$db1 = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");

if(isset($_POST['submit']))
{
$a_id = $_POST['a_id'];
$a_pswd = $_POST['a_pswd'];

$res1 = pg_query($db1,"SELECT * from admin where a_id='$a_id' ");

$count1=pg_num_rows($res1);
if($count1==1)
{
$data1 = pg_fetch_row ($res1);  
$password1=$data1[1]; 

if($a_pswd==$password1)
{

$_SESSION['a_id']=$_POST['a_id'];
$_SESSION['a_pswd']=$_POST['a_pswd'];
echo'<BODY onLoad="myFunction(){ alert("success") }">';
header('location:Admin.php');
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
<title>ADMIN LOGIN</title>
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
  var x = document.getElementById("a_pswd");
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
<h2><b> ADMIN LOGIN <b></h2>
<form method='POST' >
<table align="center" cellpadding = "10">
<!-------------------------- ADMIN ID ------------------------------------->
<tr>
<td>ADMIN ID</td>
<td><input type="text" name="a_id" maxlength="100" title="GOV2021_PLASTIC" placeholder="ADMIN ID ..." required/></td>
</tr>

<!-------------------------- PASSWORD ------------------------------------->
<tr>
<td>Password<br /><br /><br /></td>
<td>
<input type="password" name="a_pswd" id="a_pswd" placeholder="Password" required/>
<input type = "checkbox" onclick="myFunction()">Show Password
</td>
</tr>



<!----------------------- Submit and Reset ------------------------------->
<tr>
<td colspan="4" align="center">
<input type="submit" name="submit" value="LOGIN"><br /><br />
<input type="reset" value="RESET"><br /><br />
</td>
</tr>
</table>
</form>
<footer>
<a href="Plastio_Portal.html"><h4> Back </h4> </a>
</body>
</body>
</html>
