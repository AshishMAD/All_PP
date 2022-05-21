<?php
session_start();
//Retrieve The Dealer Login Details->{nextval(aval_seq)}  
$emailid = $_SESSION['d_email'];
$d_email = $_POST['d_email'];
$p_id = $_POST['p_id'];
$a_qty = $_POST['a_qty'];
$a_date = date("Y-m-d"); 

//Connect To The Database
if(isset($_POST['submit']))
{
$db = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");

 

$dp_id=rand(100001,200000);

$rate = pg_query($db,"SELECT * FROM plastic where p_id='$p_id'") or die("Invalid Query");
$rate1=pg_fetch_row($rate);
$amt = ($a_qty)*($rate1[2]);
$result_payment = pg_query($db,"INSERT INTO dealer_payment(dp_id,a_id,d_email,d_payment_amt,d_status)  VALUES  ('{$dp_id}','GOV2021_PLASTIC','{$emailid}','{$amt}','pending')") or die("INVALID1 QUERY");




$avl_id=rand(1,100000);

$res = pg_query($db,"INSERT INTO availability(avl_id,a_id,d_email,p_id,a_date,a_qty,a_tot_amt) VALUES('{$avl_id}','GOV2021_PLASTIC','{$emailid}','{$p_id}','{$a_date}','{$a_qty}','{$amt}')") or die("INVALID2 QUERY");

echo' <script> alert("Availability submitted successfully!!")</script> ';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ADD AVAILABILITY</title>
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
select {

background-repeat:no-repeat;
background-position:300px;
width:353px;
padding:12px;
margin-top:8px;
font-family:sans-serif;
line-height:1;
border-radius:5px;
background-color:green;
color:#ff0;
font-size:16px;
box-shadow:inset 0 0 10px 0 rgba(0,0,0,0.6);
outline:double;
}
select:hover {
color:#00ff7f;
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
<h3 style="color:red";> <center>ENTER AVAILABILITY </center></h3>
<table>
<tr>

<tr>

<td>Enter Plastic Type : </td>
<td><select name="p_id" required><option value="p1">P1 [One-Time Use]</option>
<option value="p2">P2 [Polythene]</option>
<option value="p3">P3 [Polyethelene]</option>
<option value="p4">P4 [Polystyrene]</option></select>
</td></tr>
<tr>
<td>Available Quantity : <br /><br /><br /></td>
<td>
<input type="number" name="a_qty" min="100" placeholder="Enter Quantity Here ..." required/>
</td>
</tr>
<tr>
<td colspan="4" align="center">
<input type="submit" name="submit" value="ADD AVAILABLITY"><br /><br />
<input type="reset" value="RESET VALUES"><br /><br />
</td>
</tr>
</table>
</form>
</body>
<footer>
  <br><u> All rights Reserved <u><br>
    <a href="Logout_Dealer.php"><h4> Logout </h4> </a>
<a href="Dealer.php"><h4> Back </h4> </a>
</footer>
</body>
</html>
