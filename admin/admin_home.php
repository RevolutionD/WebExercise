<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'home';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

$sql = "SELECT COUNT(*) AS total_books FROM tbl_book";
$query = $conn->prepare($sql);
$query->execute();
$books = $query->fetch(PDO::FETCH_OBJ);

$sql = "SELECT COUNT(*) AS total_users FROM tbl_user";
$query = $conn->prepare($sql);
$query->execute();
$users = $query->fetch(PDO::FETCH_OBJ);

$sql = "SELECT COUNT(*) AS total_authors FROM tbl_author";
$query = $conn->prepare($sql);
$query->execute();
$authors = $query->fetch(PDO::FETCH_OBJ);

$sql = "SELECT COUNT(*) AS total_categories FROM tbl_category";
$query = $conn->prepare($sql);
$query->execute();
$categories = $query->fetch(PDO::FETCH_OBJ);

$sql = "SELECT COUNT(*) AS total_issues FROM tbl_issue_details WHERE return_date IS NULL";
$query = $conn->prepare($sql);
$query->execute();
$issues = $query->fetch(PDO::FETCH_OBJ);


$title = "ADMIN HOME";
$body_file = "admin_home_body.php";

include "../includes/layout.php";

?>
