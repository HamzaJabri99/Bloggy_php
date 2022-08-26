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
                        <img src="admin/imgs/<?php echo $article['image'] ?>" alt="Trendy Pants and Shoes"
                            class="card-img img-fluid rounded" />
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
            <hr>
            <div class="col-md-6 ">
                <h3 class="card-header my-3">Add Your Opinion</h3>
                <div id="results"></div>
                <form method="POST" id="addComment">
                    <div class="form-outline">
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?php if (isset($_SESSION['username'])) echo $_SESSION['username'] ?>">
                        <label class="form-label" for="name">name</label>
                    </div>
                    <input id="article_id" type="hidden" name="article_id" value="<?php echo $id ?>">
                    <div class="form-outline mt-3">

                        <input type="text" name="email" id="email" class="form-control"
                            value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'] ?>">
                        <label for="email" class="form-label">email</label>
                    </div>
                    <div class="form-outline mt-3">
                        <textarea class="form-control" name="comment" id="comment" cols="30" rows="5"></textarea>
                        <label class="form-label" for="comment">comment</label>
                    </div>
                    <button class="mt-2 btn btn-secondary" type="submit">Comment</button>
                </form>
            </div>

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
                        <div class="card-header d-flex justify-content-between"> <a
                                href="articlePosts.php?id=<?php echo $article['id'] ?>"><img
                                    src="admin/imgs/<?php echo $article['image'] ?>" alt="Trendy Pants and Shoes"
                                    class="card-img img-fluid rounded" style="height:100%" /></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo ($article['title']) ?></h5>
                            <p class="card-text">
                                <?php echo (substr($article['body'], 0, 150)) . '...'; ?>
                                <a href="articlePosts.php?id=<?php echo ($article["id"]) ?>"
                                    class="btn btn-primary">Read More</a>
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