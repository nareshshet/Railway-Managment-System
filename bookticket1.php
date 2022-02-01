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
    // echo $row["train_no"];


    $trainno =$row["train_no"];
    echo "$trainno <br>";


    $sql = "select count(1) from passenger where email_id='$email'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $total = $row[0];
    echo "$total <br>" ;

    // $seat = "select * from passenger where email ='$email'";
    // $seatresult = mysqli_query($conn,$seat);
    // $rows=mysql_num_rows($seatresult);
    // echo "total " .$rows;
    $query1 = "update train set avb_seats= avb_seats-'$total' where train_no='$trainno'";

    
    $query="insert into ticket(user_id,train_num)values('$email','$trainno')";
    


    if(mysqli_query($conn, $query) and mysqli_query($conn, $query1))
    {  
        $message = "Ticket booked successfully";
        header("location:index.php");
    }
    else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";



    echo $row['train_no'];

    }
?>
    




