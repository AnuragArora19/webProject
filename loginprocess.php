<?php
session_start();
include_once ("Connection.php");
$uidlog=$_GET["uidlog"];
$pwdlog=$_GET["pwdlog"];
$query="select * from users where uid='$uidlog' AND pwd='$pwdlog'";
$table=mysqli_query($conn,$query);
if(mysqli_num_rows($table)==0)
{
    echo"PLEASE ENTER CORRECT USER ID AND PASSWORD";
        
}
else{
    $_SESSION["active_user"]=$uidlog;
    while($row= mysqli_fetch_array($table))
    {
        echo $row['type'];
    }
}
?>