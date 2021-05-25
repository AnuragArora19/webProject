<?php

include_once("Connection.php");
$uidValue=$_GET["uidName"];

$query="select * from pharmacy where uid='$uidValue'";

$table=mysqli_query($conn,$query);



$count=mysqli_num_rows($table);
if($count==0)
	echo "Uid Available, you can proceed";

else
	echo "Uid Not Available";



?>