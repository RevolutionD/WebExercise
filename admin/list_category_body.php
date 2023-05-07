<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-8">
        <table class="table table-striped table-bordered table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Creation Date</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row) {
                    echo
                    "<tr> 
                        <td>$row->id</td>
                        <td>$row->name</td>
                        <td>"
                        . ($row->status == 1
                            ? "<div><span class='badge bg-success'>Active</span></div>"
                            : "<div><span class='badge bg-danger'>Inactive</span></div>"
                        ) .
                        "</td>
                        <td>$row->create_at</td>
                        <td>$row->update_at</td>
                        <td>
                            <a href='add_category.php?id=$row->id' class='btn btn-sm bg-info text-white'>Edit</a>
                            <a href='delete_category.php?id=$row->id' class='btn btn-sm btn-danger'>Delete</a>
                        </td>
                    </tr>";
                } ?>

            </tbody>
        </table>
    </div>
</div>