<?php
session_start();
unset($_SESSION['logged']);
unset($_SESSION['userid']);
unset($_SESSION['username']);
unset($_SESSION['email']);
$_SESSION['logged'] = false;
session_destroy();
header('location:index.php');