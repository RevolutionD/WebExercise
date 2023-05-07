<?php
session_start();
error_reporting(E_ALL);
include ('includes/config.php');
if(isset($_SESSION['login']) && $_SESSION['login'] != '') {
    $_SESSION['login'] = '';
}

$_SESSION['active'] = 'admin_login';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT AD.id AS 'id', AC.username AS 'username', AD.full_name FROM tbl_account AS AC JOIN tbl_admin AS AD ON AC.id = AD.account_id WHERE AC.username LIKE :username AND AC.password = :password";
    $query = $conn->prepare($sql);
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) {
        $_SESSION['admin_id'] = $result->id;
        $_SESSION['login'] = 'admin';
        echo '<script type="text/javascript"> document.location = "admin/admin_home.php"; </script>';
    }
    else {
        echo "<script> alert('Your username or password is wrong, please input again!!') </script>";
    }
}

$title = 'ADMIN LOGIN';
$body_file = 'admin_login_body.php';

include "includes/layout.php";
?>
