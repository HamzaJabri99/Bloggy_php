<?php
include('./includes/header.php');
$errors = [];
$message = "";
if (isset($_POST['submit'])) {
    $name = mysqli_escape_string($con, $_POST['username']);
    $email = mysqli_escape_string($con, $_POST['email']);
    $password = mysqli_escape_string($con, $_POST['pass']);
    $created = date('Y-m-d H:m:s');
    if (empty($name)) {
        $errors = "name field is required";
    } else if (empty($email)) {
        $errors = "email field is required";
    } else if (empty($password) || strlen($password) < 3) {
        $errors = "password field is required";
    } else {
        //$pass = sha1($password);
        $query = "insert into users(name,email,password,created) values('$name','$email',sha1('$password'),'$created')";
        $execute = mysqli_query($con, $query);
        if ($execute) {
            $message = "<div class='alert alert-success'>Signed successfuly</div>";
            $name = "";
            $email = "";
        } else {
            $message = '<div class="alert alert-danger">"' . mysqli_error($con) . '"</div>';
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-5 ">
            <div class="card mt-5">
                <div class="d-flex align-items-center  mt-5">
                    <img class="img-fluid w-50" src="./includes/img/download.svg" alt="">

                    <form action="" method="POST" class="w-75 p-5 d-flex flex-column justify-content-center">
                        <h3 class="card-header">Sign<span class="text-secondary">Up
                            </span>
                        </h3>
                        <?php
                        if (!empty($errors)) {
                            echo "<div class='alert alert-danger'>$errors</div>";
                        } else {
                            echo $message;
                        }
                        ?>
                        <div class="form-outline form-group mt-5">
                            <input class="form-control" type="text" id="name" value="<?php if (isset($name))
                                                                                            echo $name;
                                                                                        ?>" name="username">
                            <label class="form-label" for="name">name</label>
                        </div>
                        <div class="form-outline mt-4">
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php if (isset($email)) echo $email; ?>">
                            <label class="form-label" for="email">email address</label>
                        </div>
                        <div class="form-outline mt-4">
                            <input type="password" class="form-control" id="pass" name="pass">
                            <label class="form-label" for="pass">password</label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary mt-4 w-50" type="submit" name="submit">SignUp </button>
                            <a href="login.php" class="btn btn-outline mx-4 mt-4 " type="submit">login</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center p-3 fixed-bottom bg-dark" style="background-color: rgba(0, 0, 0, 0.2);">
    ?? 2022 Copyright:
    <a class="text-white" href="index.php">Bloggy.com</a>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
<script src="includes/js/addComment.js"></script>
</body>

</html>
</body>

</html>