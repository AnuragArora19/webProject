<?php
	
include_once("Connection.php");
$btn=$_POST["btn"];
if($btn=="save")
doSave($conn);
else
	doUpdate($conn);

function dosave($conn)
{
		$uid=$_POST["uid"];
		$fname=$_POST["fname"];
		$mob=$_POST["mob"];
		$address=$_POST["address"];
		$city=$_POST["city"];
		$licence=$_POST["licence"];
		$orgname=$_FILES["qrpic"]["name"];
        $orgname=$uid."-".$orgname;
		$tmpname=$_FILES["qrpic"]["tmp_name"];
		
		move_uploaded_file($tmpname,"uploads/".$orgname);
		$query="insert into pharmacy values('$uid','$fname','$mob','$address','$city','$licence','$orgname',current_date() )";

		mysqli_query($conn,$query);//query fired in datbase table

		$msg=mysqli_error($conn);

		if($msg=="")
				echo "Record Inserted Successfullyyyyy";
		else
			echo $msg;
}
function doUpdate($conn)
{
        $uid=$_POST["uid"];
		$fname=$_POST["fname"];
		$mob=$_POST["mob"];
		$address=$_POST["address"];
		$city=$_POST["city"];
		$licence=$_POST["licence"];
		$oldPicName=$_POST["hdnBox"];
		$orgname=$_FILES["qrpic"]["name"];
		$tmpname=$_FILES["qrpic"]["tmp_name"];
    
		
	if($orgname=="")
    {
		$finalPicName=$oldPicName;
    }
	else
	{
		$finalPicName=$uid."-".$orgname;
        move_uploaded_file($tmpname,"uploads/".$finalPicName);
	}
		$query="update pharmacy set fname='$fname',mobile='$mob',address='$address',city='$city',licence='$licence', qrpic='$finalPicName',dos=current_date() where uid='$uid'";
		mysqli_query($conn,$query);

		$msg=mysqli_error($conn);

		if($msg=="")
				echo "Record Updated Successfullyyyyy";
		else
			echo $msg;
}
