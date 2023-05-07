<div class="row justify-content-center">
    <div class="col-9">
        <div class="row justify-content-between mt-5">
            <a class="col-3 border border-info-subtle rounded text-center text-info-emphasis py-3 text-decoration-none" href="list_book.php">
                <i class="fa fa-book fa-5x"></i>
                <h3><?php echo $books->total_books; ?></h3>
                <p>Books</p>
            </a>
            <a class="col-3 border border-success rounded text-center text-success py-3 text-decoration-none" href="list_issue.php">
                <i class="fa fa-recycle fa-5x"></i>
                <h3><?php echo $issues->total_issues; ?></h3>
                <p>Book not returned</p>
            </a>
            <a class="col-3 border border-primary-subtle rounded text-center text-primary-emphasis py-3 text-decoration-none" href="list_user.php">
                <i class="fa fa-users fa-5x"></i>
                <h3><?php echo $users->total_users; ?></h3>
                <p>User</p>
            </a>
        </div>

        <div class="row justify-content-around mt-5">
            <a class="col-3 border border-success rounded text-center text-success py-3 text-decoration-none" href="list_author.php">
                <i class="fa fa-user fa-5x"></i>
                <h3><?php echo $authors->total_authors; ?></h3>
                <p>Authors</p>
            </a>
            <a class="col-3 border border-danger-subtle rounded text-center text-danger-emphasis py-3 text-decoration-none" href="list_category.php">
                <i class="fa fa-list-alt fa-5x"></i>
                <h3><?php echo $categories->total_categories; ?></h3>
                <p>Categories</p>
            </a>
        </div>
    </div>
</div>