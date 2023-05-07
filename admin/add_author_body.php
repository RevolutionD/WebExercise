<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-info-subtle">
                <?php echo isset($_GET['id']) && $_GET['id'] != "" ? "Update Author Form" : "Add Author Form"; ?>
            </div>
            <div class="card-body">
                <form action="" method="post" role="form">
                    <div class="my-3">
                        <label for="author" class="form-label">Author Name:</label>
                        <input type="text" class="form-control shadow-sm" name="author" id="author" placeholder="Enter author name" value="<?php echo isset($_GET['id']) && $_GET['id'] != "" ? "$result->name" : ""; ?>" required>
                    </div>
                    <button type="submit" name="btn_add" value="add" class="btn btn-info text-white">
                        <?php echo isset($_GET['id']) && $_GET['id'] != "" ? "Update Author" : "Add Author"; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>