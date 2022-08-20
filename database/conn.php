<?php
session_start();
include_once('./database/consts.php');
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);