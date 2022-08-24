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
$articles = "select*from articles";
if ($result = mysqli_query($con, $articles)) {
    $articlesNum = $result->num_rows;
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
                            <i class="fas fa-user me-2"></i>Jabri Hamza
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
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
                            <h3 class="fs-2"><?php echo ($articlesNum) ?></h3>
                            <p class="fs-5">Articles</p>
                        </div>
                        <i class="fa-solid fa-newspaper fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>


            </div>

            <div class="row my-5">
                <h3 class="fs-4 mb-3">List of Articles</h3>
                <div class="col">
                    <table
                        class="table bg-white rounded shadow-sm w-100 mx-auto table-hover text-center table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="50">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Author</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created</th>
                                <th scope="col">View</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $query = "select*from articles";
                            $result = mysqli_query($con, $query);
                            while ($articles = $result->fetch_assoc()) :
                            ?>
                            <tr>
                                <th scope="row"><?php echo ($articles["id"]) ?></th>
                                <td><?php echo ($articles["title"]) ?></td>
                                <td><?php
                                        $articleBody = substr($articles["body"], 0, 60);
                                        echo $articleBody . '....' ?></td>
                                <td><?php echo ($articles["author"]) ?></td>
                                <td class="col-sm-1"><img class="img-fluid"
                                        src="https://images3.alphacoders.com/606/thumb-1920-606036.jpg" alt=""></td>
                                <td><?php $cleantime = substr($articles["created"], 0, -8);
                                        echo  $cleantime ?></td>
                                <td>
                                    <a href="../articlePosts.php?id=<?php echo ($articles['id']) ?>"
                                        class="btn btn-sm btn-info ms-2 me-2"> <i class="fas fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="editArticle.php?id=<?php echo ($articles["id"]) ?>"
                                        class="btn btn-sm btn-warning ms-2 me-2"><i class="fas fa-edit"></i>
                                    </a>
                                    <a href="deleteArticle.php?id=<?php echo ($articles["id"]) ?>"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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