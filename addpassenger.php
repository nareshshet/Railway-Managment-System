<?php
session_start();
$conn = mysqli_connect("localhost","root","","reservation");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}

if (isset($_POST['submit']))
{
	$email =$_SESSION['user_info'] ;
	echo $email;
    $name = $_POST['name'];

	// echo $name;
    $gender = $_POST['gender'];
    $age = $_POST['age'];
	// echo $age;
	// echo $gender;
	$phoneno = $_POST['number'];
	// echo $phoneno;
	$addrs =$_POST['addrs'];
	// echo $addrs;
	$sql = "insert into passenger(email_id,p_name,p_age,p_gender,p_number,p_address) values ('$email', '$name', '$age', '$gender', '$phoneno', '$addrs');";
	if(mysqli_query($conn,$sql))
	{
		$message = "You succesfully Passenger Added";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Location:passengerdetails.php");


	}
	else{
		$message ="Could not insert record";
		echo "<script type='text/javascript'>alert('$message');</script>";


	}
	


}
?>