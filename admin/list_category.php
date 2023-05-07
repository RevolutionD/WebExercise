<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'category';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

$sql = "SELECT * FROM tbl_category";
$query = $conn->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

$title = "LIST CATEGORY";
$body_file = "list_category_body.php";

include "../includes/layout.php";

?>
