<?php
session_start();

?><!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Main Page</title>
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
}h1{
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
  <h1>Plastio-Portal</h1>
<h3> Government Of India <br> Plastic waste management cell <br> All Rights reserved </h3>

</header>


<section>
  <nav>
  <h4>  
    
     <br> <a href="Ack_Dealer_Payment.php">Send Acknowlegement to Dealer</a><br>
     <br> <a href="Ack_Company_Payment.php">Send Acknowlegement to Company</a><br>
     <br> <a href="Availability.php"> Availability</a><br>
     <br> <a href="Requirements.php">Requirements</a><br>
     
     
  </h4>    
    
  </nav>
  
  <article>
<br>
<br>
<br>
<br>
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

$a1=$data1[0] - $data11[0];
$a2=$data2[0] - $data22[0];
$a3=$data3[0] - $data33[0];
$a4=$data4[0] - $data44[0];


echo"
<tr><td> $a1 </td><td> $a2 </td><td> $a3 </td><td> $a4 </td>
</tr>";


?>

</table>   
  </article>
</section>
<body>

</body>
<footer>
  <br><u> All rights Reserved <u><br>
    <a href="AdminLogin.php"><h4> Logout </h4> </a>
</footer>

</body>
</html>
