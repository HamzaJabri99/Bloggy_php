<?php
include "../database/conn.php";
include "../database/utils.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="./css/admin.css">
    <title>Bloggy</title>
</head>

<body class="bg-light">
    <nav class="navbar sticky-top  navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid mx-5">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">Bloggy Admin</a>

            <ul class="navbar-nav mx-auto fw-4 fs-4">
                <li class="nav-item"><a class="nav-link" href="../index.php">Website</a></li>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>