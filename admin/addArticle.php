<?php
include('./includes/header.php');

if (isset($_POST['submit'])) {
    $errors = [];
    $message = "";
    $title = mysqli_escape_string($con, $_POST['title']);
    $body = mysqli_escape_string($con, $_POST['body']);
    $image = mysqli_escape_string($con, $_FILES['image']['name']);
    $author = mysqli_escape_string($con, $_POST['author']);
    $category = $_POST['category'];
    $created = date("Y-m-d h:m:s");
    if (empty($title)) {
        $errors = "title is required";
    } else if (empty($body) || strlen($body) < 50) {
        $errors = "Content is required and needs to be at least 50 characters ";
    } else if (empty($image)) {
        $errors = "Please provide an image";
    } else if (empty($author)) {
        $errors = "title is required";
    } else if (empty($category)) {
        $errors = "category is required";
    } else {
        $directory = 'imgs/';
        $file = $directory . basename($_FILES['image']['name']);
        $query = "insert into articles(title,body,image,author,category_id,created) values('$title','$body','$image','$author','$category','$created')";
        if (mysqli_query($con, $query)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
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
    <h3 class="text-center mt-5">Add New Article</h3>
    <div class="container">
        <?php
        if (!empty($errors)) {
            echo '<p class="alert alert-danger">' . $errors . '</p>';
        }
        ?>
        <form class="row g-3" method="POST" enctype="multipart/form-data">
            <div class="col-md-4 mx-auto my-5">

                <div class="col-12 mt-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="<?php echo isset($_POST['title']) ?  $_POST['title'] : '' ?>">
                </div>
                <div class="col-12">
                    <label for="body">Content</label>
                    <textarea class="form-control" id="body" name="body" rows="5" cols="30"><?php echo isset($_POST['body']) ?  $_POST['body'] : '' ?>
                    </textarea>
                </div>
                <div class="col-12">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="col-12">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author"
                        value="<?php echo isset($author) ?  $author : '' ?>">
                </div>
                <div class="col-md-6">
                    <?php
                    $query = "select*from categories";
                    $result = mysqli_query($con, $query);
                    ?>
                    <label for="category" class="form-label">Category</label>
                    <select id="category" class="form-select" name="category">

                        <option disabled selected>
                            select a category
                        </option>
                        <?php
                        while ($categories = $result->fetch_assoc()) :
                        ?>

                        <option value="<?php echo $categories["id"] ?>">
                            <?php echo isset($category) ? $category :  $categories['name'] ?></option>
                        <?php endwhile; ?>
                    </select>

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