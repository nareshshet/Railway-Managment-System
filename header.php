<!DOCTYPE html>
<html>
<head>
<title></title>
<<<<<<< HEAD
<<<<<<< Updated upstream
<link rel="stylesheet" href="s1.css" type="text/css">
=======
<link rel="stylesheet" href="style.css" type="text/css">
>>>>>>> Stashed changes
=======
<link rel="stylesheet" href="css/header.css" type="text/css">
>>>>>>> c80267672edb21893ceecdfaade746eb6cfc452c
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
      <li><a href="logout.php">LOG OUT</a></li>
            </ul>
          </div>
        </div>
        <br>
      </div>
</body>
</html>