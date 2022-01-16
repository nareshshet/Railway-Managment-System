
<?php
session_start();
$conn = mysqli_connect("localhost","root","","reservation");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$email =$_SESSION['user_info'] ;
$sql = "select count(1) from passenger where email_id='$email'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$total = $row[0];
echo "$total <br>" ;
$query = "select train_num from ticket where user_id='$email'";
$result1=mysqli_query($conn,$query);
$row1=mysqli_fetch_array($result1);
$train =$row1[0];
echo "<br>$train";
$query1 = "update train set avb_seats= avb_seats-'$total' where train_no='$train'";
// $result2=mysqli_query($conn,$query1);
if(mysqli_query($conn, $query1))
{  
	$message = "Ticket booked successfully";
	header("location:index.php");
}
else {
	$message="Transaction failed";
}
echo "<script type='text/javascript'>alert('$message');</script>";
?>
