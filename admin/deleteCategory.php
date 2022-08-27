<?php
include('./includes/header.php');
$id = mysqli_escape_string($con, $_GET['id']);
$query = "delete from categories where id='$id'";
$deleted = "deleted successfuly";
if (mysqli_query($con, $query)) {
    header("location:categories.php?deleted=$deleted");
} else {
    echo mysqli_error($con);
}