<?php
include('database/conn.php');
include('database/utils.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet" />

    <title>Bloggy</title>
</head>

<body class="bg-light">
    <nav class="navbar sticky-top  navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid mx-5">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">Bloggy</a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Link -->
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Articles</a></li>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) : ?>
                            <li><a class="dropdown-item" href="profile.php">Hi <?php echo ($_SESSION['username']) ?></a>
                            </li>
                            <li><a href="logout.php" class="dropdown-item">LogOut</a></li>
                            <?php elseif (!isset($_SESSION['logged'])) : ?>
                            <li><a class="dropdown-item" href="signUp.php">Sign up</a></li>
                            <li><a class="dropdown-item" href="login.php">Login</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact us</a></li>
                </ul>


                <!-- Search -->
                <form style="position: relative;" class="w-auto d-flex" action="searchPost.php" method="GET">
                    <input type="search" class="form-control " placeholder="Type Something..." aria-label="Search"
                        name="search" />
                    <button type="submit" class="border-0 bg-light">
                        <i style=" position: absolute; top:10px; right:45px;" class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>