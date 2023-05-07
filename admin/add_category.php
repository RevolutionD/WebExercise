<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'category';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

if(isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_category WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
}

if(isset($_POST['btn_add']) && $_POST['btn_add'] != '') {
    $category = $_POST['category'];
    $active = $_POST['status'];
    if(isset($_GET['id']) && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql = "UPDATE tbl_category SET name = :category, status = :active, update_at = date('Y-m-d H:i:s') WHERE id = :id"; 
        $query = $conn->prepare($sql);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':active', $active, PDO::PARAM_INT);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        echo "<script>alert('Category updated successfully!')</script>";
        echo "<script>window.location.href='list_category.php'</script>";
    }
    else {
        $sql = "INSERT INTO tbl_category (name, status) VALUES (:category, :active)";
        $query = $conn->prepare($sql);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':active', $active, PDO::PARAM_INT);
        $query->execute();
        echo "<script>alert('Category added successfully!')</script>";
        echo "<script>window.location.href='list_category.php'</script>";
    }
}

$title = isset($_GET['id']) && $_GET['id'] != "" ? "UPDATE CATEGORY" : "ADD CATEGORY";
$body_file = "add_category_body.php";

include "../includes/layout.php";

?>
