<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = '';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

$id = $_SESSION['user_id'];

$sql = "SELECT `student_id`, `full_name`, `email`, `phone`,`create_at`, `update_at` FROM tbl_user WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindParam(':id', $id);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);

if(isset($_POST['btn_update'])){
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];

    $sql = "UPDATE tbl_user SET full_name = :full_name, phone = :phone WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':full_name', $full_name);
    $query->bindParam(':phone', $phone);
    $query->bindParam(':id', $id);
    $query->execute();

    header("location: profile.php");
    // show notification
    echo "<script>alert('Update successfully!')</script>";
}

$title = "YOUR PROFILE";
$body_file = "profile_body.php";

include "../includes/layout.php";

?>
