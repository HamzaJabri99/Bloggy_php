<?php
include('./includes/header.php');
$id = mysqli_escape_string($con, $_GET["id"]);
if (isset($id)) {
    $deleted = "deleted successfully";
    $query = "delete from articles where id='$id'";
    if (mysqli_query($con, $query)) {
        header('location:articles.php?deleted=' . $deleted);
    } else {
        echo 'error has occured' . mysqli_error($con);
    }
}