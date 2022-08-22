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
            <a class="navbar-brand" href="#">Bloggy Admin</a>
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

                </ul>



            </div>
        </div>
        <!-- Container wrapper -->
    </nav>