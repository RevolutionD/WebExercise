<?php
session_start();
error_reporting(E_ALL);
include "includes/config.php";
$_SESSION['active'] = 'user_register';


if(isset($_POST['register'])) {

    if($_POST['full_name'] == '') {
        echo "<script> alert('Please input your name!!') </script>";
    }
    else if($_POST['email'] == '') {
        echo "<script> alert('Please input your email!!') </script>";
    }
    else if($_POST['phone'] == '') {
        echo "<script> alert('Please input your phone!!') </script>";
    }
    else if($_POST['username'] == '') {
        echo "<script> alert('Please input your username!!') </script>";
    }
    else if($_POST['password'] == '') {
        echo "<script> alert('Please input your password!!') </script>";
    }
    else {
        $full_name = $_POST['full_name'];
        $student_id = $_POST['student_id'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO `tbl_account`( `username`, `password` ) VALUES( :username, :password )";
        $query = $conn->prepare($sql);
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->execute();

        $account_id = $conn->lastInsertId();
        if($account_id) {
            $sql = $student_id != ''
                ? "INSERT INTO `tbl_user`( `student_id`, `full_name`, `email`, `phone`, `account_id`) VALUES ( :student_id, :full_name, :email, :phone, :account_id )"
                : "INSERT INTO `tbl_user`( `full_name`, `email`, `phone`, `account_id`) VALUES ( :full_name, :email, :phone, :account_id )";
            $query = $conn->prepare($sql);
            if($student_id != '') $query->bindParam(':student:id', $student_id);
            $query->bindParam(':full_name', $full_name);
            $query->bindParam(':email', $email);
            $query->bindParam(':phone', $phone);
            $query->bindParam(':account_id', $account_id);
            $query->execute();

            $last_id = $conn->lastInsertId();
            if($last_id) {
                echo "<script> alert('Successful register, please input!!') </script>";
                echo '<script type="text/javascript"> document.location = "index.php"; </script>';
            }
            else {
                echo "<script> alert('Something is wrong, please try again!!') </script>";
            }
        }
    }
}

$title = 'USER REGISTER';
$body_file = 'user_register_body.php';

include "includes/layout.php";

?>

