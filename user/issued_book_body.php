<!-- TABLE -->
<div class="row justify-content-center">
    <div class="col-9">
        <table class="table table-striped table-bordered table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>Book Name</th>
                    <th>Issued Date</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT tbl_book.name, tbl_issue_details.issue_date, tbl_issue_details.return_date FROM tbl_issue_details INNER JOIN tbl_book ON tbl_issue_details.book_id = tbl_book.id WHERE tbl_issue_details.user_id = :user_id";
                $query = $conn->prepare($sql);
                $query->bindParam(':user_id', $user_id);
                $query->execute();
                $issues = $query->fetchAll(PDO::FETCH_OBJ);

                foreach ($issues as $row) {
                    echo
                    "<tr> 
                        <td>$row->name</td>
                        <td>$row->issue_date</td>
                        <td>" .
                            ($row->return_date == "" ? "Not return yet" : $row->return_date)
                        . "</td>
                    </tr>";
                }
                ?>
        </table>
    </div>
</div>