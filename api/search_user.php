<?php
session_start();
error_reporting(E_ALL);
include "../includes/config.php";

if (isset($_GET['user_info']) && $_GET['user_info'] != "") {
    $userInfo = $_GET['user_info'];
    $sql = "SELECT * FROM tbl_user WHERE id LIKE '%$userInfo%' OR student_id LIKE '%$userInfo%' OR full_name LIKE '%$userInfo%'";
    $query = $conn->prepare($sql);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_OBJ);
    // show table of users
    
}

?>

<?php if(count($users) == 0): ?>
<div class='alert alert-danger'>No user found</div>

<?php else:; ?>
<table class="table table-striped table-bordered table-responsive">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $row) {
            echo
            "<tr> 
                <td>$row->id</td>
                <td>$row->full_name</td>
                <td>$row->student_id</td>
                <td>$row->email</td>
                <td>$row->phone</td>
                <td>"
                . ($row->status == 1
                    ? "<div><span class='badge bg-success'>Active</span></div>"
                    : "<div><span class='badge bg-danger'>Inactive</span></div>"
                ) .
                "</td>
                <td>
                    <input type='checkbox' name='user_id' value='$row->id'>
                </td>
            </tr>";
        }
        ?>

    </tbody>
</table>

<?php endif; ?>