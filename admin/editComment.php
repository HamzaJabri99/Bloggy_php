<?php
include('./includes/header.php');
$id = mysqli_escape_string($con, $_GET['id']);
$query = "update comments set status=1 where id='$id'";
if (mysqli_query($con, $query)) {
    header('location:comments.php');
} else {
    echo "error" . mysqli_error($con);
}