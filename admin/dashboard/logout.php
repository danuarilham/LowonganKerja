<?php 
session_start();
$_SESSION['login_users'] = NULL;

header("Location: ../index.php");
exit;
?>