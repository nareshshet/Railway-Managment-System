<?php
session_start();
$conn = mysqli_connect("localhost","root","","reservation");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pw'];
    $sql = "insert into user(name,email_id,password) values ('$name','$email','$password');";
    if(mysqli_query($conn,$sql))
{
    $message = "You succesfully registered";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:login.html");

}
else{
    $message ="Could not insert record";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location:register.html");
}



}



?>









?>