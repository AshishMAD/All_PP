
<!DOCTYPE html>
<html lang="en">
<head>
<title>Company Main Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  background: white;
}

/* Style the header */
header {
   padding: 10px;
  
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
h1{
color:black;
text-align:center;
font-size:40px;
font-family: Sans-serif;
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

width:12%;
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
</style>
</head>
<body>


<header>
<h1 style="color:black";>Plastio-Portal</h1>
<center><img src="PP2.jpeg"/></center>


</header>

<fieldset>

<br><br>

<?php 
session_start();
$emailid1=$_SESSION['c_email'];
$req_id1=$_SESSION['req_id'];
$cp_id1=$_SESSION['cp_id'];
$db = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");

$history = pg_query($db,"SELECT * FROM company_payment where cp_id='$cp_id1'") or die("INVALID QUERY");
$history1 = pg_query($db,"SELECT * FROM requirements where req_id='$req_id1'") or die("INVALID QUERY");
$history2 = pg_query($db,"SELECT * FROM company where c_email='$emailid1'") or die("INVALID QUERY");



while($data = pg_fetch_row($history))
{
echo"Payment id= $data[0] <br>";
echo"Amount= $data[3] <br>";
echo"Status= $data[4] <br>";
}

while($data2 = pg_fetch_row($history2))
{
echo"company name= $data2[1]";
}
while($data1 = pg_fetch_row($history1))
{
echo" requirement id= $data1[0] <br>";
echo" Plastic id= $data1[3] <br>";
echo" Date = $data1[4] <br>";
echo" Quantity = $data1[5] <br>";
}


$p=pg_query($db,"select * from requirements where req_id='$req_id1' ");

$a = pg_fetch_row($p);

$history3 = pg_query($db,"SELECT * FROM plastic where p_id='$a[3]' ") or die("INVALID QUERY");
while($data3 = pg_fetch_row($history3))
{
echo"Plastic Type= $data3[1] <br>";
echo"Rate= $data3[2] <br>";

}

?>




</fieldset>
</body>

</html>
