<?php 
session_start();
$emailid1=$_SESSION['d_email'];
$avl_id1=$_SESSION['avl_id'];
$dp_id1=$_SESSION['dp_id'];
$db = pg_connect("host=localhost dbname=plastio_portal user=postgres password=postgres")or die("Couldn't Connect To The Database");


$history = pg_query($db,"SELECT * FROM dealer_payment where dp_id='$dp_id1'") or die("INVALID QUERY");
$history1 = pg_query($db,"SELECT * FROM availability where avl_id='$avl_id1'") or die("INVALID QUERY");
$history2 = pg_query($db,"SELECT * FROM dealer where d_email='$emailid1'") or die("INVALID QUERY");


while($data2 = pg_fetch_row($history2))
{
echo"dealer name= $data2[1]";
}
while($data1 = pg_fetch_row($history1))
{
echo" available id= $data1[0]";
echo" Plastic id= $data1[3]";
echo" Date = $data1[4]";
echo" Quantity = $data1[5]";

}
while($data = pg_fetch_row($history))
{
echo"Payment id= $data[0]";
echo"Amount= $data[3]";
echo"Status= $data[4]";
}
$p=pg_query($db,"select * from availability where avl_id='$avl_id1' ");

$a = pg_fetch_row($p);

$history3 = pg_query($db,"SELECT * FROM plastic where p_id='$a[3]' ") or die("INVALID QUERY");
while($data3 = pg_fetch_row($history3))
{
echo"Plastic Type= $data3[1]";
echo"Rate= $data3[2]";

}

?>
<html>
<body>
<br><br>
<a href="DealerHistory.php">Back</a>
</body>
</html>
