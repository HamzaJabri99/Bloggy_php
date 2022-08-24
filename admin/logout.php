<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['userId']);
unset($_SESSION['username']);
unset($_SESSION['email']);
session_destroy();
header('location:../index.php');