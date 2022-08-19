<?php
include('./includes/header.php');
?>
<div class="container ">
    <div class="row d-flex justify-content-around">
        <div class="col-md-7 mt-5">
            <?php
            $id = mysqli_escape_string($con, $_GET['id']);
            $query = "select*from articles where id ='$id'";
            $results = mysqli_query($con, $query);
            $article = $results->fetch_assoc();
            if ($article !== null) :
            ?>
            <div class="card mb-3">
                <div class=" row g-0">
                    <div class="col-md-12">
                        <img src="https://images3.alphacoders.com/606/thumb-1920-606036.jpg"
                            alt="Trendy Pants and Shoes" class="card-img img-fluid rounded" />
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">

                            <div class="card-title d-flex justify-content-between">
                                <h5 class=""><?php echo ($article['title']) ?></h5>
                                <p class="text-muted fw-lighter"><span class="badge badge-success">
                                        <?php echo ($article['created']) ?>

                                    </span><span class="badge badge-info mx-4"><?php $cat = getCategories($con, $article['category_id']);
                                                                                    echo ($cat['name']) ?></span>
                                </p>
                            </div>
                            <p class="card-text">
                                <?php
                                    $string = $article['body'];
                                    echo ($string);
                                    ?>

                            </p>


                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if (!$article) {
                echo ('<p>no article was found</p> ');

                echo ('<p><a href="index.php"><i class="fas fa-angle-left"> </i> back?</a></p>');
            } ?>
        </div>
        <div class="col-md-3 mt-5 text-center ">
            <ul class="list-group list-group-light border-dark card  d-flex flex-column align-items-center">
                <li class="list-group-item border-bottom border-dark  disabled">
                    <h5>Categories</h5>
                </li>
                <div class="d-flex flex-wrap justify-content-between">
                    <?php
                    $query = 'select*from categories';
                    $categories = mysqli_query($con, $query);
                    while ($category = $categories->fetch_assoc()) :
                    ?>
                    <li class="list-group-item border-0 mx-3 mt-3"><a
                            class="text-white badge badge-dark hover-shadow fs-5"
                            href="categoryPosts.php?id=<?php echo $category['id'] ?>"><?php echo ($category['name']) ?></a>
                    </li>

                    <?php endwhile; ?>
                </div>
            </ul>
            <ul class="list-group list-group-light border-dark card mt-5 d-flex flex-column align-items-center">
                <li class="list-group-item border-dark disabled">
                    <h5>Latest Articles</h5>
                </li>
                <hr>
                <?php
                $query = 'select*from articles order by created DESC LIMIT 3';
                $articles = mysqli_query($con, $query);
                while ($article = $articles->fetch_assoc()) :
                ?>
                <li class="list-group-item">
                    <div class="card bg-light text-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header d-flex justify-content-between"> <a href=""><img
                                    src="https://images3.alphacoders.com/606/thumb-1920-606036.jpg"
                                    alt="Trendy Pants and Shoes" class="card-img img-fluid rounded"
                                    style="height:100%" /></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo ($article['title']) ?></h5>
                            <p class="card-text">
                                <?php echo (substr($article['body'], 0, 150)) . '...';
                                    echo ('<a href="" class="btn btn-primary">Read More</a>') ?>

                            </p>
                        </div>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>

    </div>
</div>
<?php
include('./includes/footer.php')

?>