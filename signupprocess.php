<?php
include_once("Connection.php");
include_once("SMS_OK_sms.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$mobile=$_GET["mobile"];
$type=$_GET["type"];
$query="insert into users values('$uid','$pwd','$mobile', current_date(),'$type')";
mysqli_query($conn,$query);

		$msg=mysqli_error($conn);

		if($msg=="")
        { 
                $resp=SendSMS($mobile,"User id:".$uid." and password:".$pwd);
				echo "SIGNED UP SUCCESSFULLY";
        }
        
		else
        {
			echo $msg;
        }
?>
