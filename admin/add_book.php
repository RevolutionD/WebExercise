<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'book';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

$sql = "SELECT * FROM tbl_category WHERE status = 1";
$query = $conn->prepare($sql);
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT * FROM tbl_author";
$query = $conn->prepare($sql);
$query->execute();
$authors = $query->fetchAll(PDO::FETCH_OBJ);

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_book WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
}

if(isset($_POST['btn_add']) && $_POST['btn_add'] != "") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $path = "../assets/data/";
    move_uploaded_file($tmp_image, $path.$image);

    if(isset($_GET['id']) && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql = "UPDATE tbl_book SET name = :name, category_id = :category, author_id = :author, price = :price, image = :image WHERE id = :id";
        $query = $conn->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':category', $category, PDO::PARAM_INT);
        $query->bindParam(':author', $author, PDO::PARAM_INT);
        $query->bindParam(':price', $price, PDO::PARAM_INT);
        $query->bindParam(':image', $image, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        echo "<script>alert('Book updated successfully!')</script>";
        echo "<script>window.location.href='list_book.php'</script>";
    }
    else {
        $sql = "INSERT INTO tbl_book (name, category_id, author_id, price, image) VALUES (:name, :category, :author, :price, :image)";
        $query = $conn->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':category', $category, PDO::PARAM_INT);
        $query->bindParam(':author', $author, PDO::PARAM_INT);
        $query->bindParam(':price', $price, PDO::PARAM_INT);
        $query->bindParam(':image', $image, PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('Book added successfully!')</script>";
        echo "<script>window.location.href='list_book.php'</script>";
    }
}

$title = isset($_GET['id']) && $_GET['id'] != "" ? "UPDATE BOOK" : "ADD BOOK";
$body_file = "add_book_body.php";

include "../includes/layout.php";
?>
