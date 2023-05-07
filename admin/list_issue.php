<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'issue';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

// return book
if(isset($_GET['return_id']) && $_GET['return_id'] != "") {
    $return_id = $_GET['return_id'];
    $return_date = date("Y-m-d H:i:s");
    $sql = "UPDATE tbl_issue_details SET return_date = :return_date WHERE id = :return_id";
    $query = $conn->prepare($sql);
    $query->bindParam(':return_date', $return_date);
    $query->bindParam(':return_id', $return_id);
    $query->execute();
    header("location: list_issue.php");
}

$sql = "SELECT * FROM tbl_issue_details";
$query = $conn->prepare($sql);
$query->execute();
$issues = $query->fetchAll(PDO::FETCH_OBJ);

$title = "LIST ISSUE";
$body_file = "list_issue_body.php";

include "../includes/layout.php";

?>
