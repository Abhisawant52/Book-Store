<?php 
session_start();

unset($_SESSION['CustId']);
header("location:../profile.php");

?>