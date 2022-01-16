<?php 
session_start();
$conn = mysqli_connect("localhost","root","","reservation");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$email =$_SESSION['user_info'] ;
// echo "Session ".$email;
$sql = "SELECT * FROM passenger where email_id='$email'";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passengers Details</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: blue;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: white;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th{
            background-color:#E4F5D4;

        }
  
        td {
            font-weight: lighter;
        }
        html {
        background: url(https://cdn.pixabay.com/photo/2016/07/19/08/42/central-station-1527780_960_720.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    </style>
</head>
<body>
<?php
include("header.php"); ?>
<section>
<br><br><br>
        <h1>Passenger  Details</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>Id</th>

                <th>Passenger Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Address</th>

            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
               
                <td><?php echo $rows['p_id'];?></td>
                <td><?php echo $rows['p_name'];?></td>
                <td><?php echo $rows['p_age'];?></td>
                <td><?php echo $rows['p_gender'];?></td>
                <td><?php echo $rows['p_number'];?></td>
                <td><?php echo $rows['p_address'];?></td>

            </tr>
            <?php
                }
             ?>
        </table>
    </section>
    
</body>
</html>