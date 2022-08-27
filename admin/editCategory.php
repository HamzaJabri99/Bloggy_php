<?php
include('./includes/header.php');
$id = mysqli_escape_string($con, $_GET['id']);
$errors = [];
$message = "";

if (isset($_POST['submit'])) {
    $name = mysqli_escape_string($con, $_POST['name']);
    $addedBy = mysqli_escape_string($con, $_POST['added_by']);
    if (empty($_POST['name'])) {
        $errors = "Name is Required";
    } else if (empty($_POST['added_by'])) {
        $errors = "who added this?";
    } else {
        $query = "update categories set name='$name',added_by='$addedBy' where id='$id'";
        if (mysqli_query($con, $query)) {
            $message = '<p class="alert alert-success">updated successfully</p>';
        } else {
            echo 'error' . mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form class="row g-3" method="POST" enctype="multipart/form-data">
            <div class="col-md-4 mx-auto my-5">
                <?php
                if (!empty($errors)) {
                    echo '<div class="alert alert-danger">' . $errors . '</div>';
                } else {
                    echo $message;
                }
                ?>
                <?php
                $query = "select*from categories where id='$id'";
                $result = mysqli_query($con, $query);
                $category = $result->fetch_assoc();
                if ($category !== null) :

                ?>
                <div class="col-12 mt-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo (isset($_POST['name'])) ?  $_POST['name'] : $category['name']; ?>">
                </div>
                <div class="col-12 mt-4">
                    <label for="added_by" class="form-label">Added By</label>
                    <input type="text" class="form-control" name="added_by" id="added_by"
                        value="<?php echo (isset($_POST['added_by'])) ? $_POST['added_by'] : $_SESSION['username'] ?>">
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-info mx-4" name="submit">Update</button>
                    <a href="./dashboard.php" class="btn btn-warning">Cancel?</a>
                </div>
            </div>
            <?php endif ?>
    </div>

    </form>
    </div>

</body>

</html>