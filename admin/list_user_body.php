<!-- CONTENT -->
<div class="row justify-content-center">
    <div class="col-10">
        <table class="table table-striped table-bordered table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Create Date</th>
                    <th>Last Update</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $row) {
                    echo
                    "<tr> 
                        <td>$row->id</td>
                        <td>$row->full_name</td>
                        <td>$row->student_id</td>
                        <td>$row->email</td>
                        <td>$row->phone</td>
                        <td>$row->create_at</td>
                        <td>$row->update_at</td>
                        <td>"
                        . ($row->status == 1
                            ? "<div><span class='badge bg-success'>Active</span></div>"
                            : "<div><span class='badge bg-danger'>Inactive</span></div>"
                        ) .
                        "</td>
                        <td>"
                        . ($row->status == 1
                            ? " <a href='list_user.php?id=$row->id' class='btn btn-sm btn-danger'>Inactive</a>"
                            : "<a href='list_user.php?id=$row->id' class='btn btn-sm btn-success'>Active</a>"
                        ) . "                                           
                            <a href='user_details.php?id=$row->id' class='btn btn-sm btn-success'>Details</a>
                        </td>
                    </tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</div>