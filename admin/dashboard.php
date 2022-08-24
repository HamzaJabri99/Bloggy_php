<?php
include "./includes/header.php";
//#3F1143w//#17EC8E
$unpublished = "select*from comments where status=0";
if ($result = mysqli_query($con, $unpublished)) {
    $unpublishedComments = $result->num_rows;
}
?>
<!--takes whole width of the page-->
<div class="d-flex" id="wrapper">
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom">
            <i class="fas fa-user me-2"></i>Admin
        </div>
        <div class="list-group list-group-flush my-3">
            <a href="" class="list-group-item list-group-item-action bg-transparent  second-text active"><i
                    class="fas fa-tachometer-alt me-2"></i>
                dashboard</a>
            <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                    class="fa-solid fa-file-circle-plus me-2"></i>
                Add An Article</a>
            <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                    class="fa-solid fa-newspaper me-2"></i>
                Articles</a>
            <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                    class="fa-solid fa-calendar-plus me-2"></i>
                Add a Category</a>
            <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                    class="fa-solid fa-layer-group me-2"></i>
                Categories</a>
            <div class="d-flex justify-content-center align-items-center">
                <a href=""
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold w-auto p-3 "><i
                        class="fas fa-comment-dots me-2"></i>
                    Manage Comments
                </a>
                <p class="fw-bold"><?php echo '<span class="text-info">(' . ($unpublishedComments) . ')</span>'  ?></p>
            </div>

            <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fa-solid fa-right-from-bracket me-2 text-danger w-auto p-3"></i>
                logout</a>
        </div>
    </div>
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
            <div class="row g-3 my-2">
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">200</h3>
                            <p class="fs-5">Articles</p>
                        </div>
                        <i class="fa-solid fa-newspaper fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">33</h3>
                            <p class="fs-5">Categories</p>
                        </div>
                        <i class="fa-solid fa-layer-group fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">3899</h3>
                            <p class="fs-5">Comments</p>
                        </div>
                        <i class="fa-solid fa-comment  fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">%25</h3>
                            <p class="fs-5">Visitors </p>
                        </div>
                        <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <h3 class="fs-4 mb-3">Recent Comments</h3>
                <div class="col">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="50">#</th>
                                <th scope="col">user</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Article</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Television</td>
                                <td>Jonny</td>
                                <td>$1200</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Laptop</td>
                                <td>Kenny</td>
                                <td>$750</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Cell Phone</td>
                                <td>Jenny</td>
                                <td>$600</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Fridge</td>
                                <td>Killy</td>
                                <td>$300</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Books</td>
                                <td>Filly</td>
                                <td>$120</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Gold</td>
                                <td>Bumbo</td>
                                <td>$1800</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Pen</td>
                                <td>Bilbo</td>
                                <td>$75</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Notebook</td>
                                <td>Frodo</td>
                                <td>$36</td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>Dress</td>
                                <td>Kimo</td>
                                <td>$255</td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>Paint</td>
                                <td>Zico</td>
                                <td>$434</td>
                            </tr>
                            <tr>
                                <th scope="row">11</th>
                                <td>Carpet</td>
                                <td>Jeco</td>
                                <td>$1236</td>
                            </tr>
                            <tr>
                                <th scope="row">12</th>
                                <td>Food</td>
                                <td>Haso</td>
                                <td>$422</td>
                            </tr>
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