<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'issue';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";


if (isset($_POST['submit'])) {
    $book_id = $_POST['book_id'];
    $user_id = $_POST['user_id'];
    $issue_date = $_POST['issue_date'];
    $return_date = $_POST['return_date'];

    $sql = "INSERT INTO tbl_issue (book_id, user_id, issue_date, return_date) VALUES (:book_id, :user_id, :issue_date, :return_date)";
    $query = $conn->prepare($sql);
    $query->bindParam(':book_id', $book_id);
    $query->bindParam(':user_id', $user_id);
    $query->bindParam(':issue_date', $issue_date);
    $query->bindParam(':return_date', $return_date);
    $query->execute();

    header("location: list_issue.php");
}

$sql = "SELECT * FROM tbl_book";
$query = $conn->prepare($sql);
$query->execute();
$books = $query->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT * FROM tbl_user";
$query = $conn->prepare($sql);
$query->execute();
$users = $query->fetchAll(PDO::FETCH_OBJ);


$title = "ADD ISSUE";
$body_file = "add_issue_body.php";

include "../includes/layout.php";

?>
