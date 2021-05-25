<?php
include_once("Connection.php");
$uid=$_GET["uid"];
$name=$_GET["name"];
$mobile=$_GET["mobile"];
$address=$_GET["address"];
$pet=$_GET["pet"];
$info=$_GET["info"];
$query="insert into posts values('$uid','$name','$mobile', '$address','$pet','$info')";
mysqli_query($conn,$query);

		$msg=mysqli_error($conn);

		if($msg=="")
        { 
        
				echo "ADD POSTED SUCCESSFULLY";
        }
        
		else
        {
			echo $msg;
        }
?>
