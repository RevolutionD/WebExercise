<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-info-subtle">
                <?php echo isset($_GET['id']) && $_GET['id'] != "" ? "Update Book Form" : "Add Book Form"; ?>
            </div>
            <div class="card-body">
                <form action="" method="post" role="form" enctype="multipart/form-data">
                    <div class="my-3">
                        <label for="name" class="form-label">Book Name:</label>
                        <input type="text" class="form-control shadow-sm" name="name" id="book" placeholder="Enter book name" value="<?php echo isset($_GET['id']) && $_GET['id'] != "" ? "$result->name" : ""; ?>" required>
                    </div>
                    <div>
                        <label for="category" class="form-label">Category Name:</label>
                        <select name="category" id="category" class="form-select shadow-sm my-3" required>
                            <option value="">-- Select Category --</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category->id; ?>" <?php echo isset($_GET['id']) && $_GET['id'] != "" && $result->category_id == $category->id ? "selected" : ""; ?>>
                                    <?php echo $category->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label for="author" class="form-label">Author Name:</label>
                        <select name="author" id="author" class="form-select shadow-sm my-3" required>
                            <option value="">-- Select Author --</option>
                            <?php foreach ($authors as $author) { ?>
                                <option value="<?php echo $author->id; ?>" <?php echo isset($_GET['id']) && $_GET['id'] != "" && $result->author_id == $author->id ? "selected" : ""; ?>>
                                    <?php echo $author->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="my-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" class="form-control shadow-sm" name="price" id="price" placeholder="Enter price" value="<?php echo isset($_GET['id']) && $_GET['id'] != "" ? "$result->price" : ""; ?>" required>
                    </div>

                    <div class="my-3">
                        <label for="image">Choose Image:</label>
                        <input type="file" name="image" id="image" class="form-control shadow-sm" required>
                    </div>

                    <button type="submit" name="btn_add" value="add" class="btn btn-info text-white">
                        <?php echo isset($_GET['id']) && $_GET['id'] != "" ? "Update Book" : "Add Book"; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>