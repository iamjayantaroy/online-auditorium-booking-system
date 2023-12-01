<?php 
session_start();
session_destroy();
header("location:http://127.0.0.1/Project/User/login.php");
?>