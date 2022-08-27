<?php
include('./includes/header.php');
$errors = [];
$message = "";
if (isset($_POST['submit'])) {
    $name = mysqli_escape_string($con, $_POST['name']);
    $addedBy = mysqli_escape_string($con, $_POST['added_by']);
    if (empty($name)) {
        $errors = "name is required";
    } else if (empty($addedBy)) {
        $errors = "added by who?";
    } else {

        $query = "insert into categories(name,added_by) values('$name','$addedBy')";
        if (mysqli_query($con, $query)) {
            $_POST = "";
            $message = '<p class="alert alert-success">inserted successfuly</p>';
        } else {
            echo mysqli_error($con);
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
    <h3 class="text-center mt-5">Add New Category</h3>

    <div class="container">
        <?php
        if (!empty($errors)) {
            echo '<div class="alert alert-danger">' . $errors . '</div>';
        } else {
            echo $message;
        }
        ?>
        <form class="row g-3" method="POST" enctype="multipart/form-data">
            <div class="col-md-4 mx-auto my-5">

                <div class="col-12 mt-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo (isset($_POST['name'])) ?  $_POST['name'] : '' ?>">
                </div>
                <div class="col-12">
                    <label for="added_by" class="form-label mt-4">added By</label>
                    <input type="text" class="form-control" id="added_by" name="added_by"
                        value="<?php echo (isset($_POST['added_by'])) ? $_POST['added_by'] : $_SESSION['username'] ?>">
                </div>


                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-info mx-4" name="submit">Add</button>
                    <a href="./dashboard.php" class="btn btn-warning">Cancel?</a>
                </div>

            </div>

        </form>
    </div>

</body>

</html>