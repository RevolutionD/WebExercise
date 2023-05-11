<?php
session_start();
error_reporting(E_ALL);
include ('includes/config.php');
if (isset($_SESSION['login']) && $_SESSION['login'] != '') {
    $_SESSION['login'] = '';
}

$_SESSION['active'] = 'home';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);        
    $sql = "SELECT US.id AS 'id', AC.username AS 'username', US.status AS 'status' FROM tbl_account AS AC JOIN tbl_user AS US ON AC.id = US.account_id WHERE AC.username LIKE :username AND AC.password = :password";
    $query = $conn->prepare($sql);
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['user_id'] = $result->id;
        if ($result->status == 1) {
            $_SESSION['login'] = 'user';
            echo "<script type='text/javascript'> document.location='user/user_home.php'; </script>";
        } else {
            echo "<script> alert('Your account has been block or not active. Please contact admin');</script>";
        }
    } else {
        echo "<script> alert('Your username or password wrong, please input again!!'); </script>";
    }
}

$title = 'USER LOGIN';
$title_id = 'user-login';
$body_file = 'index_body.php';
$intro_carousel = 'includes/intro.php';

include "includes/layout.php";
?>




