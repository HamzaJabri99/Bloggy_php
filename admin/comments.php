<?php
include "./includes/header.php";
//#3F1143w//#17EC8E
if (!isset($_SESSION['admin'])) {
    header('location:../index.php');
}
$unpublished = "select*from comments where status=0";
if ($result = mysqli_query($con, $unpublished)) {
    $unpublishedComments = $result->num_rows;
}

?>
<!--takes whole width of the page-->
<div class="d-flex" id="wrapper">
    <?php
    include('./includes/sideBar.php')
    ?>
    <!--Sidebar end-->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard</h2>
            </div>
            <button class="navbar-toggler" type="button" data-b s-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon" value="azdazd"></span></button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i><?php echo $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid px-4">
            <div class="row g-3 my-2 mx-auto">
                <div class="col-md-3 mx-auto">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo ($unpublishedComments) ?></h3>
                            <p class="fs-5">Unpulished Comments</p>
                        </div>
                        <i class="fas fa-comment-dots fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>


            </div>

            <div class="row my-5">
                <h3 class="fs-4 mb-3">List of Comments</h3>
                <?php
                if (isset($_GET['deleted'])) {
                    echo ' <div class="w-25 mx-auto alert alert-warning alert-dismissible fade show" role="alert">
   ' . $_GET['deleted'] . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                }
                ?>
                <div class="col-sm-12">
                    <table
                        class="table bg-white rounded shadow-sm w-100 mx-auto table-hover text-center table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col" width="50">#</th>
                                <th scope="col">username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Comment</th>
                                <th scope="col">posted</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $query = "select*from comments where status=0";
                            $result = mysqli_query($con, $query);
                            while ($comments = $result->fetch_assoc()) :
                            ?>
                            <tr>
                                <th scope="row"><?php echo ($comments["id"]) ?></th>
                                <td><?php echo ($comments["name"]) ?></td>
                                <td class="col-sm-1"><?php echo ($comments['email']) ?>
                                </td>
                                <td><?php
                                        $commentBody = substr($comments["comment"], 0, -1);
                                        echo $commentBody . '....' ?></td>

                                <td><?php $cleantime = substr($comments["created"], 0, -8);
                                        echo  $cleantime ?></td>

                                <td>
                                    <a href="editComment.php?id=<?php echo ($comments["id"]) ?>"
                                        class="btn btn-sm btn-success ms-2 me-2"><i class="fas fa-check"></i>
                                    </a>


                                    <a class="btn btn-sm btn-danger"
                                        href="deleteComment.php?id=<?php echo $comments['id'] ?>"> <i
                                            class="fas fa-trash"></i></a>
                                    </button>



                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
<script src="./js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>