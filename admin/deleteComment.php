<?php
include('./includes/header.php');

$id = mysqli_escape_string($con, $_GET['id']);
$query = "delete from comments where id='$id'";
if (mysqli_query($con, $query)) {
    $deleted = "deleted successfully";
    header("location:comments.php?deleted=$deleted");
} else {
    echo 'error' . mysqli_error($con);
}