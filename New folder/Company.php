<?php

session_start();


?> 
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
h6
{
color : green;
font-size : 20px;
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
font-size:55px;
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
</style>
</head>
<body>


<header>
<img src="PP2.jpeg"></img>
  <h1 style="color:black";>Plastio-Portal</h1>
<h3>  
<?php if(isset($_SESSION['c_email']))
                         echo" Company ID:-:".$_SESSION['c_email']; ?> </h3>
</header>


<section>
  <nav>
  <h4>  
    <br> <a href="CompanyHistory.php">History</a><br>
    <br> <a href="ComPlaceOrder.php">Place Order</a><br>
  </h4>    
    
  </nav>
  
  <article>
    <center><b><h2>GUIDELINES</h2></b> </center>
<h6>
1.Company is expected to follow all the rules made on usage of plastic.<br/>
2.Once order is placed it cannot be cancelled.<br/>
3.Every payment of plastic ordered must be made within 15 days.<br/>
4.Company can expect all the plastic delivery within 7 days only.<br/>
</h6>
  </article>
</section>
<body>
<table>
<tr style="border-style=dashed";>
<th colspan=3>Plastic Details</th>
</tr>
</tr><tr>
<th>Plastic ID</th>
<th>Plastic Type</th>
<th>Rate</th>
</tr>
<tr><td>P1</td><td>  1 time used polythene</td><td>250</td>
</tr>
<tr><td>P2</td><td>Bulky plastics</td><td>350</td>
</tr>
<tr><td>P3</td><td>Poly-nylon</td><td>1000</td>
</tr>
<tr><td>P4</td><td>Hard plastic</td><td>5000</td>
</tr>
</table>
</body>
<footer>
  <br><u> All rights Reserved <u><br>
    <a href="Logout_Company.php"><h4> Logout </h4> </a>
</footer>

</body>
</html>
