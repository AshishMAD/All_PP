<?php
session_start();
//Retrieve The requirements details;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dealer History</title>
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
  border-style:dashed;
  border:
}

td, th {
  border: 2px solid black;
  text-align: left;
  padding: 8px;
  border-style:;
}

tr:nth-child(even) {
  background-color: white;
}
h1{
color:black;
text-align:center;
font-size:55px;
font-family: Sans-serif;
}
</style>
</head>
<body>


<header>
  <img src="PP2.jpeg"></img>
  <h1>Plastio-Portal</h1></header>



<?php
//Connect To The Database

$db = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");

$availability = pg_query($db,"SELECT * FROM availability") or die("INVALID QUERY");
$payment = pg_query($db,"SELECT * FROM dealer_payment") or die("INVALID QUERY");
?>

<table border=2><tr><th colspan=8>AVAILABILITY DETAILS</th></tr>
<tr>
<th>Availability Date</th>
<th>Availability ID</th>
<th>Payment ID</th>
<th>Dealer Email</th>
<th>Plastic ID</th>
<th>Available Quantity</th>
<th>Total Amount</th>
<th>Status</th>
</tr>
<?php

while(($data = pg_fetch_row($availability)) &&($data1 = pg_fetch_row($payment)))
echo "<tr><td>$data[4]</td><td>$data[0]</td><td>$data1[0]</td><td>$data[2]</td><td>$data[3]</td><td>$data[5]</td><td>$data1[3]</td><td>$data1[4]</td>
</tr>";



?>
</table>
</body>
<footer>
  <br><u> All rights Reserved <u><br>
    <a href="Logout_Admin.php"><h4> Logout </h4> </a>
<a href="Admin.php"><h4>Back</h4> </a>
</footer>
</body>
</html>
