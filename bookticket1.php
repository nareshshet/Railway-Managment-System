<?php
session_start();
$conn = mysqli_connect("localhost","root","","reservation");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
    $trainname =$_POST['trains'];
    // echo $trainname;
    $email =$_SESSION['user_info'] ;
	// echo $email;
    $sql = "select train_no from train where name = '$trainname'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $query="insert into ticket(user_id,train_num)values('$email','".$row["train_no"] ."')";
    // $seat = "select * from passenger where email ='$email'";
    // $seatresult = mysqli_query($conn,$seat);
    // $rows=mysql_num_rows($seatresult);
    // echo "total " .$rows;
    if(mysqli_query($conn, $query))
    {  
        $message = "Ticket booked successfully";
        header("location:index.php");
    }
    else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";



    // echo $row['train_no'];

    }
?>
    




