<?php
include('./includes/header.php');
?>
<div class="container ">
    <div class="row d-flex justify-content-around">
        <div class="col-md-7 mt-5">
            <div class="card mb-3">
                <div class=" row g-0">
                    <div class="col-md-4">
                        <a href=""><img src="https://images3.alphacoders.com/606/thumb-1920-606036.jpg"
                                alt="Trendy Pants and Shoes" class="card-img img-fluid rounded"
                                style="height:100%" /></a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">

                            <div class="card-title d-flex justify-content-between">
                                <h5 class="">Card title</h5>
                                <p class="text-muted fw-lighter"><span
                                        class="badge badge-success">11-04-2022</span><span
                                        class="badge badge-info mx-4">Anime</span></p>
                            </div>
                            <p class="card-text">
                                This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-5 text-center">
            <ul class="list-group list-group-light card">
                <li class="list-group-item border-0 disabled">Categories</li>
                <hr>
                <li class="list-group-item border-0">Anime</li>
                <li class="list-group-item border-0">Technologies</li>
                <li class="list-group-item border-0">Web developement</li>
                <li class="list-group-item border-0">Design</li>
            </ul>
            <ul class="list-group list-group-light card mt-5 d-flex flex-column align-items-center">
                <li class="list-group-item border-0 disabled">Latest Updates</li>
                <hr>
                <li class="list-group-item  border-dark">
                    <div class="card bg-light text-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header d-flex justify-content-between"> <a href=""><img
                                    src="https://images3.alphacoders.com/606/thumb-1920-606036.jpg"
                                    alt="Trendy Pants and Shoes" class="card-img img-fluid rounded"
                                    style="height:100%" /></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Light card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

    </div>
</div>
<?php
include('./includes/footer.php')

?>