<?php
	$servername = 'localhost';
	$user = 'id15068905_task_2';
	$pass = 'HarshadPatoliya@143';
	$dbname = 'id15068905_tsf';

	$conn = mysqli_connect($servername,$user,$pass,$dbname);

	if(!$conn){
		die("Could Not Connect to the database".mysqli_connect_error());
	}

	$sql = "INSERT INTO users(id,name,email,credits)
			VALUES('1','Harshad','harshadpatoliya14@gmail.com','5000'),
				  ('2','Ankita','ankita@gmail.com','6000'),
			  	  ('3','Vrushik','vrushik0312.com','1000'),
				  ('4','Yash','yashshiyani800@gmail.com','3500'),
				  ('5','Saumya','rsaumya123@gmail.com','4500'),
				  ('6','Shaunak','patelshaunak88@gmail.com','6200'),
				  ('7','Parthiv','parthivpatel004@gmail.com','3000'),
				  ('8','Mihir','mihirvaishnav165@gmail.com','1200'),
				  ('9','Kashyap','kashyapshah9100@gmail.com','1700'),
				  ('10','Hiral','hiralsata387@gmail.com','1900')";
		
	if($conn->query($sql) === TRUE){
		echo "New Record Create Successfully.";
	}
	else{
		echo "Error!!!".$sql."<br>".$conn->error;
	}
	$conn->close();
?>