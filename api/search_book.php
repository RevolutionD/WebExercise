<?php
session_start();
error_reporting(E_ALL);
include "../includes/config.php";

if (isset($_GET['book_info']) && $_GET['book_info'] != "") {
    $bookInfo = $_GET['book_info'];
    $sql = "SELECT * FROM tbl_book WHERE name LIKE '%$bookInfo%'";
    $query = $conn->prepare($sql);
    $query->execute();
    $books = $query->fetchAll(PDO::FETCH_OBJ);
    // show table of books
    
}
?>

<?php if(count($books) == 0): ?>
<div class='alert alert-danger'>No book found</div>
<?php else:; ?>
<table class="table table-striped table-bordered table-responsive">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Image</th>
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
                <td>
                    <input type='checkbox' name='book_id' value='$row->id'>
                </td>
            </tr>";
        }
        ?>

    </tbody>
</table>
<?php endif; ?>