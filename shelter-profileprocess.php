<?php
include_once("Connection.php");
        $uid=$_POST["uid"];
		$name=$_POST["name"];
		$contact=$_POST["contact"];
		$address=$_POST["address"];
		$city=$_POST["city"];
		$days=$_POST["days"];
		$selpets=$_POST["selpets"];
		$info=$_POST["info"];
		$orgname1=$_FILES["pic1"]["name"];
        $orgname1=$uid."-".$orgname1;
		$tmpname1=$_FILES["pic1"]["tmp_name"];
		move_uploaded_file($tmpname1,"uploads/".$orgname1);

        $orgname2=$_FILES["pic2"]["name"];
        $orgname2=$uid."-".$orgname2;
		$tmpname2=$_FILES["pic2"]["tmp_name"];
		move_uploaded_file($tmpname2,"uploads/".$orgname2);

        $orgname3=$_FILES["pic3"]["name"];
        $orgname3=$uid."-".$orgname3;
		$tmpname3=$_FILES["pic3"]["tmp_name"];
		move_uploaded_file($tmpname3,"uploads/".$orgname3);

		$query="insert into shelter values('$uid','$name','$contact','$address','$city','$days','$selpets','$info','$orgname1','$orgname2','$orgname3',current_date() )";

		mysqli_query($conn,$query);//query fired in datbase table

		$msg=mysqli_error($conn);

		if($msg=="")
				echo "Record Inserted Successfullyyyyy";
		else
			echo $msg;
