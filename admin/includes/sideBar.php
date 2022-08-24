    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom">
            <i class="fas fa-user me-2"></i>Admin
        </div>
        <div class="list-group list-group-flush my-3">
            <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent  second-text active"><i
                    class="fas fa-tachometer-alt me-2"></i>
                dashboard</a>
            <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                    class="fa-solid fa-file-circle-plus me-2"></i>
                Add An Article</a>
            <a href="articles.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                    class="fa-solid fa-newspaper me-2"></i>
                Articles</a>
            <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                    class="fa-solid fa-calendar-plus me-2"></i>
                Add a Category</a>
            <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                    class="fa-solid fa-layer-group me-2"></i>
                Categories</a>

            <a href=""
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold w-auto px-3 fs-6"><i
                    class="fas fa-comment-dots me-2 "></i>
                Manage Comments
                <?php echo '<span class="text-warning">(' . ($unpublishedComments) . ')</span>'  ?>
            </a>


            <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                    class="fa-solid fa-right-from-bracket me-2 text-danger w-auto p-3"></i>
                logout</a>
        </div>
    </div>