<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: auth-login.php");
	exit;
}
if( $_SESSION["isAdmin"] == 0 ) {
	header("Location: ../user/dashboard.php");
	exit;
  }
?>