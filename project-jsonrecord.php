<?php
$uid=$_GET["uid"];
include_once("Connection.php");
$query="select * from doctors where uid='$uid'";
$table=mysqli_query($conn,$query);
$ary=array();
while($record=mysqli_fetch_array($table))
{
	$ary[]=$record;
}
echo json_encode($ary);
?>




