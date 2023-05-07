<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'home';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

$user_id = $_SESSION['user_id'];

$sql = "SELECT COUNT(*) AS total_books FROM tbl_book";
$query = $conn->prepare($sql);
$query->execute();
$books = $query->fetch(PDO::FETCH_OBJ);

$sql = "SELECT COUNT(*) AS total_not_return FROM tbl_issue_details WHERE user_id = :user_id AND return_date IS NULL";
$query = $conn->prepare($sql);
$query->bindParam(':user_id', $user_id);
$query->execute();
$issues = $query->fetch(PDO::FETCH_OBJ);

$sql = "SELECT COUNT(*) AS total_issued FROM tbl_issue_details WHERE user_id = :user_id AND return_date IS NOT NULL";
$query = $conn->prepare($sql);
$query->bindParam(':user_id', $user_id);
$query->execute();
$issued = $query->fetch(PDO::FETCH_OBJ);

$title = "USER HOME";
$body_file = "user_home_body.php";

include "../includes/layout.php";

?>


