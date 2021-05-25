<?php
session_start();
include_once("Connection.php");
include_once("SMS_OK_sms.php");
$uidlog=$_GET["uidlog"];
$query="select * from users where uid='$uidlog'";
$table=mysqli_query($conn,$query);
$count=mysqli_num_rows($table);
if($count==0)
{
    echo"ENTER CORRECT UID";
        
}
else{
    
     $_SESSION["active_user"]=$uidlog;
    while($row= mysqli_fetch_array($table)) {
        $resp=SendSMS($row['mobile'],"Password:".$row['pwd']);
        echo $resp;
    }
    
}
?>