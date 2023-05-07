<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'issue';

if (!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tbl_issue_details WHERE user_id = :user_id";
$query = $conn->prepare($sql);
$query->bindParam(':user_id', $user_id);
$query->execute();
$issues = $query->fetchAll(PDO::FETCH_OBJ);

$title = "ISSUED BOOKS";
$body_file = "issued_book_body.php";

include "../includes/layout.php";
?>
