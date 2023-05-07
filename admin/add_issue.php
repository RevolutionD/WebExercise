<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'issue';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

if (isset($_POST['btn_add'])) {
    $book_id = $_POST['book_id'];
    $user_id = $_POST['user_id'];
    $issue_date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO tbl_issue_details (book_id, user_id, issue_date) VALUES (:book_id, :user_id, :issue_date)";
    $query = $conn->prepare($sql);
    $query->bindParam(':book_id', $book_id);
    $query->bindParam(':user_id', $user_id);
    $query->bindParam(':issue_date', $issue_date);
    $query->execute();

    echo "<script>alert('Issue added successfully')</script>";
    header("location: list_issue.php");
}

$title = "ADD ISSUE";
$body_file = "add_issue_body.php";

include "../includes/layout.php";

?>
