<?
session_start();
unset($_SESSION['user_info']);
header("location:header.php");
exit();
?>
