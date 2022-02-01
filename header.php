<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css/header.css" type="text/css">
<style type="text/css">
	li {
		font-family: sans-serif;
		font-size:18px;
	}
</style>
<script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
              $("#Logout").hide();
            };
            $(document).ready(function(){
                $("#user").hover(function(){
                    $("#Logout").toggle("slow");
                });
            });
        </script>
</head>
<body link="white" alink="white" vlink="white">
     <div class="container-fluid dark">
     <br>
        <div class="">
          <div class="Menu">
            <ul id="navmenu">
            <li><A HREF="index.php">Home</A></li>
            <li><A HREF="traindetails.php">Train Details</A></li>

            <li><A HREF="addpassenger.html">Add Passenger</A></li>
            <li><A HREF="passengerdetails.php">Passengers</A></li>

            <li><a href="bookticket.php">Book a ticket</a></li>
            <li><A HREF="ticketdetails.php">Ticket Status</A></li>

            <li><?php  
				if(isset($_SESSION['user_info'])){
					echo '<div id="dropdown">'.$_SESSION['user_info'].'<div id="Logout" style="display:none">Logout</div>';
        }
				else
					echo '<A HREF="login.html">Login/Register</A>';
				?>
			</li>
      <li><a href="logout.php">Log Out</a></li>
            </ul>
          </div>
        </div>
        <br>
      </div>
</body>
</html>