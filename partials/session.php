<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: auth-login.php");
	exit;
}

if( $_SESSION["isAdmin"] == 1 ) {
  header("Location: ../admin/dashboard.php");
  exit;
}
?>