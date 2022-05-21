<?php 
session_start();

//Connect To The Database

$db1 = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");

if(isset($_POST['submit']))
{
$c_email = $_POST['c_email'];
$c_pswd = $_POST['c_pswd'];

$res1 = pg_query($db1,"SELECT * from company where c_email='$c_email' ");

$count1=pg_num_rows($res1);

$i=0;
//script function for successfully login
echo '<script type="text/javascript">';
echo 'function myFunction(){ alert("successfully Login") };';
echo '</script>';


if($count1==1)
{
$data1 = pg_fetch_row ($res1);  
$password1=$data1[2]; 

if($c_pswd==$password1)
{
 
$_SESSION['c_email']=$_POST['c_email'];
$_SESSION['c_pswd']=$_POST['c_pswd'];
echo'<BODY onLoad="myFunction()">';
 header('location:Company.php');
}
else {
echo' <script> alert("Password Incorrect!!")</script> ';
}
}
else {
echo' <script> alert("No Account is Registered with given Email")</script> ';
}



}
?>

<html>
<head>
<title>COMPANY LOGIN</title>
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
 padding:25px;
 
}
table.inner{
 border: 10px;
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
  var x = document.getElementById("c_pswd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</head>
<body>
<img src="PP2.jpeg"></img>
<h1>Plastio-Portal</h1></header>
<h2><b> COMPANY LOGIN <b></h2>
<form method='POST' >
<table align="center" cellpadding = "10">
<!-------------------------- Email ID ------------------------------------->
<tr>
<td>COMPANY Email ID</td>
<td><input type="email" name="c_email" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="eg. ashish@gmail.com" placeholder="Email ID ..." required/></td>
</tr>

<!-------------------------- PASSWORD ------------------------------------->
<tr>
<td>Password<br /><br /><br /></td>
<td>
<input type="password" name="c_pswd" id ="c_pswd" placeholder="Password" required/>
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


