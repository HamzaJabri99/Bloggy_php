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
        $title = mysqli_escape_string($con, $_POST['title']);
        $body = mysqli_escape_string($con, $_POST['body']);
        $author = mysqli_escape_string($con, $_POST['author']);
        $category = mysqli_escape_string($con, $_POST['category']);
        $created = date("Y-m-d H:m:s");
        $query = "update articles set title='$title',body='$body',author='$author',category_id='$category',created='$created' where id='$id'";
        if (mysqli_query($con, $query)) {
            $message = "Article Modified successfuly";
            header('location:dashboard.php');
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
        <form class="row g-3" method="POST">
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
                    <textarea class="form-control" id="body" name="body"><?php
                                                                                echo (isset($_POST['body'])) ? $_POST['body'] : $article['body'];
                                                                                ?></textarea>
                </div>
                <div class="col-12">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
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
                        <?php
                            include('./utils/utils.php');
                            $category = getCategory($con, $article['category_id']);
                            ?>
                        <option disabled selected value="<?php echo $category['id'] ?>">
                            <?php
                                echo ($category['name'])
                                ?>
                        </option>

                        <?php
                            while ($category = $result->fetch_assoc()) :
                            ?>
                        <option value="<?php echo $category["id"] ?>"><?php echo $category["name"] ?></option>
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