<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'book';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

if (isset($_GET['id']) && $_GET['id'] != "") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_book WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
}

$sql = "SELECT BK.id AS 'id', BK.name AS 'name', BK.image AS 'image', CT.name AS 'category', AU.name as 'author', BK.price as 'price' FROM tbl_book AS BK
        JOIN tbl_category AS CT ON BK.category_id = CT.id
        JOIN tbl_author AS AU ON BK.author_id = AU.id";

$query = $conn->prepare($sql);
$query->execute();
$books = $query->fetchAll(PDO::FETCH_OBJ);

$title = "LIST BOOK";
$body_file = "list_book_body.php";

include "../includes/layout.php";
?>
