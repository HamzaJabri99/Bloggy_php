<?php
include('./includes/header.php');
$errors = [];
$message = "";
if (isset($_POST['submit'])) {
    $email = mysqli_escape_string($con, $_POST['email']);
    $password = mysqli_escape_string($con, $_POST['pass']);
    if (empty($email)) {
        $errors = "email field is required";
    } else if (empty($password) || strlen($password) < 3) {
        $errors = "password field is required";
    } else {
        //$pass = sha1($password);
        $query = "select*from users where email='$email' and password=sha1('$password')";
        if ($data = mysqli_query($con, $query)) {
            if ($data->num_rows > 0) {
                $user = $data->fetch_assoc();
                $_SESSION['logged'] = true;
                $_SESSION['userid'] = $user['id'];
                $_SESSION['username'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                header('location:index.php');
            } else {
                $message = "<div class='alert alert-danger'>Wrong Email or Password</div>";
            }
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
                        <h3 class="card-header">Log<span class="text-secondary">In
                            </span>
                        </h3>
                        <?php
                        if (!empty($errors)) {
                            echo "<div class='alert alert-danger'>$errors</div>";
                        } else {
                            echo $message;
                        }
                        ?>

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
                            <button class="btn btn-secondary mt-4 w-50" type="submit" name="submit">Login </button>
                            <a href="signUp.php" class="btn btn-outline mx-4 mt-4 " type="submit">SignUp</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('./includes/footer.php')
?>