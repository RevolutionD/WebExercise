<?php
session_start();
error_reporting(E_ALL);

$_SESSION['active'] = 'author';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

$sql = "SELECT * FROM tbl_author";
$query = $conn->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

$title = "LIST AUTHOR";
$body_file = "list_author_body.php";

include "../includes/layout.php";

?>
    