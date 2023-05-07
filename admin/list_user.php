<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'user';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_user WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    $status = $result->status;
    $status = ($status == 1) ? 0 : 1;

    $sql = "UPDATE tbl_user SET status = :status WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':status', $status);
    $query->bindParam(':id', $id);
    $query->execute();

    header("location: list_user.php");
}

$sql = "SELECT * FROM tbl_user";
$query = $conn->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

$title = "LIST USER";
$body_file = "list_user_body.php";

include "../includes/layout.php";
?>
