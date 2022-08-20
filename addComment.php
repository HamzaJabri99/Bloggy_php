<?php
include('database/conn.php');
$errors = [];
$message = "";

$name = mysqli_escape_string($con, $_POST['name']);
$email = mysqli_escape_string($con, $_POST['email']);
$articleId = mysqli_escape_string($con, $_POST['article_id']);
$comment = mysqli_escape_string($con, $_POST['comment']);
$created = date('Y-m-d H:m:s');

if (empty($name)) {
    $errors = "name required";
} else if (empty($email)) {
    $errors = "email required";
} else if (empty($comment)) {
    $errors = "provide a comment";
}
if (!empty($errors)) {
    echo '<div class="alert alert-info">' . $errors . '</div>';
} else {
    $query = "insert into comments(name,email,comment,created,post_id) values('$name','$email','$comment','$created','$articleId')";
    if (mysqli_query($con, $query)) {
        $message = "<div class='alert alert-success'>
comment added successfully
</div>";
        echo $message;
    } else {
        $message = '<div class="alert alert-danger">
Something went Wrong ' . mysqli_error($con) . '
</div>';
        echo $message;
    }
}