<?php
	
include_once("Connection.php");
$btn=$_POST["btn"];
if($btn=="save")
doSave($conn);
else
	doupdate($conn);

function doSave($conn)
{

		$uid=$_POST["uid"];
		$name=$_POST["name"];
		$mob=$_POST["mob"];
		$email=$_POST["email"];
		$address=$_POST["address"];
		$state=$_POST["state"];
		$city=$_POST["city"];
		$qualification=$_POST["qualification"];
		$exp=$_POST["exp"];
		$spl=$_POST["spl"];
		$orgname1=$_FILES["ppic"]["name"];
        $orgname1=$uid."-".$orgname1;
		$tmpname1=$_FILES["ppic"]["tmp_name"];
		
		move_uploaded_file($tmpname1,"uploads/".$orgname1);
        $orgname2=$_FILES["certpic"]["name"];
        $orgname2=$uid."-".$orgname2;
		$tmpname2=$_FILES["certpic"]["tmp_name"];
		
		move_uploaded_file($tmpname2,"uploads/".$orgname2);

		$query="insert into doctors values('$uid','$name','$mob','$email','$address','$state','$city','$qualification','$exp','$spl','$orgname1','$orgname2',current_date() )";

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
		$name=$_POST["name"];
		$mob=$_POST["mob"];
		$email=$_POST["email"];
		$address=$_POST["address"];
		$state=$_POST["state"];
		$city=$_POST["city"];
		$qualification=$_POST["qualification"];
		$exp=$_POST["exp"];
		$spl=$_POST["spl"];
		$oldPicName1=$_POST["hdnBox1"];
		$orgname1=$_FILES["ppic"]["name"];
		$tmpname1=$_FILES["ppic"]["tmp_name"];
    
          $oldPicName2=$_POST["hdnBox2"];
		$orgname2=$_FILES["certpic"]["name"];
		$tmpname2=$_FILES["certpic"]["tmp_name"];
		
		
	if($orgname1=="")
    {
		$finalPicName1=$oldPicName1;
      
    }
	else
	{
		$finalPicName1=$uid."-".$orgname1;
        
        move_uploaded_file($tmpname1,"uploads/".$orgname1);
		
	}
    if($orgname2=="")
    {
         $finalPicName2=$oldPicName2;
    }
    else
    {
        $finalPicName2=$orgname2;
        move_uploaded_file($tmpname2,"uploads/".$orgname2);
    }
       
	
		$query="update doctors set name='$name',mobile='$mob',email='$email',address='$address',state='$state',city='$city',qualification= '$qualification',exp='$exp',spl='$spl',ppic='$finalPicName1',certpic='$finalPicName2', dos=current_date() where uid='$uid'";

		mysqli_query($conn,$query);//query fired in datbase table

		$msg=mysqli_error($conn);

		if($msg=="")
				echo "Record Updated Successfullyyyyy";
		else
			echo $msg;
	}
