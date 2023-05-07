<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = '';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

if(isset($_POST['btn_update_password']) && $_POST['btn_update_password'] != '') {
    $sql = "SELECT US.id AS 'id', US.account_id AS 'account_id', AC.username AS 'username', AC.password AS 'password' FROM tbl_account AS AC JOIN tbl_user AS US ON AC.id = US.account_id WHERE US.id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $_SESSION['user_id']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    $id = $result->account_id;
    $new_pass = md5($_POST['new_pass']);

    if(md5($_POST['old_pass']) == $result->password) {
        if($_POST['new_pass'] == $_POST['confirm_pass'] && $_POST['new_pass'] != '') {
            $sql = "UPDATE tbl_account SET password = :password WHERE id = :id";
            $query = $conn->prepare($sql);
            $query->bindParam(':password', $new_pass);
            $query->bindParam(':id', $id);
            $query->execute();
            echo "<script>alert('Password updated successfully!')</script>";
        } else {
            echo "<script>alert('New password and confirm password does not match!')</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect!')</script>";
    }
}

$title = "CHANGE PASSWORD";
$body_file = "change_password_body.php";

include "../includes/layout.php";

?>
