<?php
session_start();
include('consts.php');
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);