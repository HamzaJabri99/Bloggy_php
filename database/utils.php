<?php
function getCategories($con, $id)
{
    $query = "select*from categories where id='$id'";
    $result  = mysqli_query($con, $query);
    return $category = $result->fetch_assoc();
}