<!-- CONTENT -->
<!-- List issue book -->
<div class="row justify-content-center">
    <div class="col-9">
        <table class="table table-striped table-bordered table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Book Name</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($issues as $row) {
                    $sql = "SELECT * FROM tbl_user WHERE id = $row->user_id";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $user = $query->fetch(PDO::FETCH_OBJ);
                    $sql = "SELECT * FROM tbl_book WHERE id = $row->book_id";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $book = $query->fetch(PDO::FETCH_OBJ);
                    echo
                    "<tr> 
                        <td>$row->id</td>
                        <td>$user->full_name</td>
                        <td>$book->name</td>
                        <td>$row->issue_date</td>
                        <td>" .
                            ($row->return_date == "" ? "Not return yet" : $row->return_date)
                            . "
                        <td>" .
                        ($row->return_date != "" ? "" : "<a href='list_issue.php?return_id=$row->id' class='btn btn-sm btn-success'>Return</a>")
                        . 
                        "</td>
                    </tr>"; 
                }
                ?>

            </tbody>
        </table>
    </div>
</div>