<?php
include('./includes/header.php');
$id = mysqli_escape_string($con, $_GET['id']);
$errors = [];
$message = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['title'])) {
        $errors = "Title is Required";
    } else if (empty($_POST['body']) || mb_strlen($_POST['body']) < 50) {
        $errors = "Content section needs to be filled and has at least 50 characters";
    } else if (empty($_POST['author'])) {
        $errors = "Article needs an author";
    } else if (empty($_POST['category'])) {
        $errors = "Article needs a category";
    } else {
        //duplicated code i know but i felt lazy to redo all things again (bare with me ^_^)
        // in add new artricle page i'll try to write better and clean code :D
        $query = "select*from articles where id='$id'";
        $result = mysqli_query($con, $query);
        $article = $result->fetch_assoc();
        //-------------------------------
        $title = mysqli_escape_string($con, $_POST['title']);
        $body = mysqli_escape_string($con, $_POST['body']);
        $author = mysqli_escape_string($con, $_POST['author']);
        $category = !(empty($_POST['category'])) ? mysqli_escape_string($con, $_POST['category']) : $article['category_id'];
        $image = mysqli_escape_string($con, empty($_FILES['image']['name']) ? $article['image'] : $_FILES['image']['name']);
        $created = date("Y-m-d H:m:s");
        $directory = "imgs/";
        $file = $directory . basename($_FILES['image']['name']);
        $query = "update articles set title='$title',body='$body',image='$image',author='$author',category_id='$category',created='$created' where id='$id'";
        if (mysqli_query($con, $query)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
            $message = "<p class='alert alert-success'>Article Modified successfuly</p>";
            //header('location:dashboard.php');
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
                $query = "select*from articles where id='$id'";
                $result = mysqli_query($con, $query);
                $article = $result->fetch_assoc();
                if ($article !== null) :

                ?>
                <div class="col-12 mt-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="<?php
                                                                                                echo (isset($_POST['title'])) ?  $_POST['title'] : $article['title']; ?>">
                </div>
                <div class="col-12">
                    <label for="body">Content</label>
                    <textarea class="form-control" id="body" name="body" rows="5" cols="30"><?php
                                                                                                echo (isset($_POST['body'])) ? $_POST['body'] : $article['body'];
                                                                                                ?></textarea>
                </div>
                <div class="col-12">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="<?php $file ?>">
                </div>
                <div class="col-12">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author"
                        value="<?php echo isset($_POST['author']) ? $_POST['author'] : $article['author'] ?>">
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
                            while ($category = $result->fetch_assoc()) :
                            ?>

                        <option value="<?php echo $category["id"] ?>"
                            <?php echo $category['id'] === $article['category_id'] ? 'selected' : '' ?>>
                            <?php echo $category["name"] ?></option>
                        <?php endwhile ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Created</label>
                    <input disabled type="datetime" class="form-control" id="inputCity"
                        value="<?php echo $article['created'] ?>">
                </div>
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-info mx-4" name="submit">Update</button>
                    <a href="./dashboard.php" class="btn btn-warning">Cancel?</a>
                </div>
                <?php endif ?>
            </div>

        </form>
    </div>

</body>

</html>