<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'author';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

if (isset($_GET['id']) && $_GET['id'] != "") {
    $sql = "SELECT * FROM tbl_author WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $_GET['id']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
}

if (isset($_POST['btn_add']) && $_POST['btn_add'] == "add") {
    if (isset($_GET['id']) && $_GET['id'] != "") {
        $sql = "UPDATE tbl_author SET name = :name, update_at = date('Y-m-d H:i:s') WHERE id = :id";
        $query = $conn->prepare($sql);
        $query->bindParam(':name', $_POST['author']);
        $query->bindParam(':id', $_GET['id']);
        $query->execute();
        echo "<script>alert('Author updated successfully!')</script>";
        echo "<script>window.location.href='list_author.php'</script>";
    } else {
        $sql = "INSERT INTO tbl_author (name) VALUES (:name)";
        $query = $conn->prepare($sql);
        $query->bindParam(':name', $_POST['author']);
        $query->execute();
        echo "<script>alert('Author added successfully!')</script>";
        echo "<script>window.location.href='list_author.php'</script>";
    }
}

$title = isset($_GET['id']) && $_GET['id'] != "" ? "Update Author" : "Add Author";
$body_file = "add_author_body.php";

include "../includes/layout.php";

?>
