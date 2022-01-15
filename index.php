<HTML>
<HEAD>
<TITLE>Indian Railways</TITLE>
<style type="text/css">
@import url(style.css);
#logo	{ 
	border-radius: 25px;
    border: 1px solid blue; 
    width: 100px;
    height: 100px; 
}
*	{
	color: white;
}
html { 
  background: url(https://cdn.pixabay.com/photo/2017/06/24/23/03/railway-2439189_960_720.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
#main	{
		width:700px;
		height: 400px;
		margin: 0 auto;
		margin-top: 30px;
		color:white;
		border-radius: 25px;
  		padding-top: 10px;
    	padding-right: 10px;
    	padding-bottom: 10px;
    	padding-left: 10px;
    	background-color: rgba(0,0,0,0.3);
	}
</style>
</HEAD>
<BODY>
<?php 
session_start();
include("header.php"); ?>
<br><br><br><br><br><br><br><br>
<div id="main"><div id="logo">
<A HREF="index.php">
<IMG SRC="img/logo.png" alt="Home" id="logo" width="150" height="150"></IMG>
</A></div>
<h1 align="center" style="color:#ffb3b3">WELCOME TO INDIAN RAILWAYS</h1><br/>
<h4 align="center">Have a safe journey with us</h4>
<br/><br/><br/>
<?php
if(isset($_SESSION['user_info']))
  echo '<h3 align="center"><a href="booktkt.php">Book here</a></h3>';
else
  echo '<h3  align="center" style="color:blue" ><a href="register.php">Please  REGISTER/LOGIN  before booking</a></h3>';
?>
</div>
</BODY>
</HTML>