<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: auth-login.php");
	exit;
}

if( $_SESSION["role"] == "admin" ) {
  header("Location: ../admin/dashboard.php");
  exit;
}
?>