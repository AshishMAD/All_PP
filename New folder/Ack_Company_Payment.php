<?php
//Retrieve The Payment ID

$cp_id = $_POST['cp_id'];

//Connect To The Database
if(isset($_POST['submit']))
{
$db = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");

//Issue The Query
$res = pg_query($db,"SELECT * from company_payment where cp_id='$cp_id' ");

$count=pg_num_rows($res);
if($count==1)
{

$update = pg_query("UPDATE company_payment SET c_status='DONE' where cp_id='$cp_id'")or die("Invalid Query");

echo' <script> alert("Company Acknowledgement Successful !!! ")</script> ';

}
else
{
echo' <script> alert("Payment With Given Id does not exist!!")</script> ';

}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dealer Status Update</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);
}

/* Style the header */
header {
   padding: 30px;
  
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 30%;
  height: 300px; /* only for demonstration, should be removed */
  background:#fffafa;
  padding: 20px;

}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}
h1{
color:black;
text-align:center;
font-size:55px;
font-family: Sans-serif;
}
h2
{
text-align: center;

  font-size: 40px;
  color: red;
}
h4
{
text-align: left;

  font-size: 15px;
  color: white;
}
h3
{
text-align: left;

  font-size: 20px;
  color: white;
}

article {
  float: left;
  padding: 20px;
  width: 70%;
  background:#d1d1d1;
  height: 300px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color:#3d3d3d;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
img
{
float: right;
width:10%;
height:auto;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 2px solid black;
  text-align: left;
  padding: 8px;
  border-style:;
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
</style>
</style>
</head>
<body>
<header>
  <img src="PP2.jpeg"></img>
  <h1>Plastio-Portal</h1></header>

<body>
<form  method="POST">
<h3 style="color:red";> <center>ENTER PAYMENT ID </center></h3>
<table>

<tr>
<td>Enter Payment ID : </td>
<td><input type="text" name="cp_id" maxlength="100" placeholder="Enter Payment ID Here ..." required /></td>
</tr>

<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="UPDATE"><br /><br />
<input type="reset" value="RESET VALUES"><br /><br />
</td>
</tr>
</table>
</form>
<h5> (TO Check Payment ID Click On Below Link) </h5>
<a href="Requirements.php"><h4> Go To Check Company History</h4></a>
</body>
<footer>
  <br><u> All rights Reserved <u><br>
    <a href="AdminLogin.php"><h4> Logout </h4> </a>

<a href="Admin.php"><h4> Back </h4> </a>
</footer>
</body>
</html>
