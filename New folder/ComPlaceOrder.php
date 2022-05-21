
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>COMPANY SEARCH</title>
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
h1{
color:black;
text-align:center;
font-size:55px;
font-family: Sans-serif;
}
select 
{
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
select:hover 
{
color:#00ff7f;
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
<?php 

$db = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");


$p1 = pg_query($db,"SELECT sum(a_qty) FROM availability where p_id='p1' ") or die("INVALID QUERY1");
$p2 = pg_query($db,"SELECT sum(a_qty) FROM availability where p_id='p2' ") or die("INVALID QUERY2");
$p3 = pg_query($db,"SELECT sum(a_qty) FROM availability where p_id='p3' ") or die("INVALID QUERY3");
$p4 = pg_query($db,"SELECT sum(a_qty) FROM availability where p_id='p4' ") or die("INVALID QUERY4");

$p11 = pg_query($db,"SELECT sum(r_qty) FROM requirements where p_id='p1' ") or die("INVALID QUERY1");
$p22 = pg_query($db,"SELECT sum(r_qty) FROM requirements where p_id='p2' ") or die("INVALID QUERY2");
$p33 = pg_query($db,"SELECT sum(r_qty) FROM requirements where p_id='p3' ") or die("INVALID QUERY3");
$p44 = pg_query($db,"SELECT sum(r_qty) FROM requirements where p_id='p4' ") or die("INVALID QUERY4");


?>
<table border=2>
<tr><th colspan=4>TOTAL AVAILABLE PLASTICS</th> 
</tr>
<tr>
<th>P1(1 time use)</th>
<th>P2(polythene)</th>
<th> P3(polyethelene)</th>
<th>P4(polystyrene)</th>

</tr>

<?php

$data1 = pg_fetch_row($p1);
$data2 = pg_fetch_row($p2);
$data3 = pg_fetch_row($p3);
$data4 = pg_fetch_row($p4);
$data11 = pg_fetch_row($p11);
$data22 = pg_fetch_row($p22);
$data33 = pg_fetch_row($p33);
$data44 = pg_fetch_row($p44);

$a1=$data1[0] - $data11[0];  //available p1
$a2=$data2[0] - $data22[0];  //available p2
$a3=$data3[0] - $data33[0];  //available p3
$a4=$data4[0] - $data44[0];  //available p4


echo"
<tr><td> $a1 </td><td> $a2 </td><td> $a3 </td><td> $a4 </td>
</tr>";


?>

</table>
<h3 style="color:red";> <center>ENTER PLASTIC DETAILS TO PLACE ORDER ... </center></h3>
<table>

<tr>
<td>Enter Plastic Type : </td>
<td><select name="p_id" required><option value="p1" >P1 [One-Time Use] </option>
<option value="p2">P2 [Polythene] </option>
<option value="p3">P3 [Polyethelene] </option>
<option value="p4">P4 [Polystyrene] </option></select>
</td></tr>

<tr>
<td>Enter Plastic Quantity : </td>
<td><input type="number" name="r_qty" min="100" placeholder="Enter Quantity Here ... " required/></td>
</tr>


<tr>
<td colspan="4" align="center">
<input type="submit" name="submit" value="Place Order" ><br /><br />

<input type="reset" value="RESET VALUES"><br /><br />
</td>
</tr>
</table>
</form>
</body>
<footer>
  <br><u> All rights Reserved <u><br>
    <a href="Logout_Company.php"><h4> Logout </h4> </a>
<a href="Company.php"><h4> Back </h4> </a>
</footer>
</body>
</html>




<?php
session_start();
//Retrieve The Dealer Login Details->{nextval(aval_seq)}  
$emailid=$_SESSION['c_email'];


$p_id = $_POST['p_id'];
$r_qty = $_POST['r_qty'];
$r_date = date("Y-m-d");

//Connect To The Database
if(isset($_POST['submit']))
{
$db = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");

echo '<script type="text/javascript">';
echo 'function myFunction(){ alert("Success!!!") };';
echo '</script>';



if(($p_id=='p1' && $a1>=$r_qty) || ($p_id=='p2' && $a2>=$r_qty) || ($p_id=='p3' && $a3>=$r_qty) || ($p_id=='p4' && $a4>=$r_qty))
{
$rate = pg_query($db,"SELECT * FROM plastic where p_id='$p_id'") or die("Invalid Query");
$rate1=pg_fetch_row($rate);
$amt = ($r_qty)*($rate1[2]);

//company payment table
$cp_id=rand(300001,400000);
$result_payment = pg_query($db,"INSERT INTO company_payment(cp_id,a_id,c_email,c_payment_amt,c_status)  VALUES  ('{$cp_id}','GOV2021_PLASTIC','{$emailid}','{$amt}','pending')") or die("INVALID1 QUERY");




//requirement table
$req_id=rand(200001,300000);

$result_requirement = pg_query($db,"INSERT INTO requirements(req_id,a_id,c_email,p_id,r_date,r_qty,r_tot_amt) VALUES('{$req_id}','GOV2021_PLASTIC','{$emailid}','{$p_id}','{$r_date}','{$r_qty}','{$amt}')") or die("INVALID2 QUERY");

//echo'<BODY onLoad="myFunction()">';
header('location:Company.php');

}

else
{
echo' <script> alert("Required Quantity Exceeds Available Quantity!!")</script> ';
}

}
?>
