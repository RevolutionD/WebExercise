<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-10">
        <table class="table table-striped table-bordered table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($books as $row) {
                    echo
                    "<tr> 
                        <td>$row->id</td>
                        <td>$row->name</td>
                        <td><img src='../assets/data/$row->image' width='100px' height='100px'></td>
                        <td>$row->category</td>
                        <td>$row->author</td>
                        <td>$row->price</td>
                        <td>
                            <a href='add_book.php?id=$row->id' class='btn btn-sm btn-info text-white'>Edit</a>
                            <a href='delete_book.php?id=$row->id' class='btn btn-sm btn-danger'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</div>