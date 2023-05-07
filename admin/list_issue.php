<?php
session_start();
error_reporting(E_ALL);
$_SESSION['active'] = 'issue';

if(!isset($_SESSION['login']) || $_SESSION['login'] == "") {
    header("location: ../index.php");
}

include "../includes/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<?php include "../includes/head.php"; ?>
<body>
    <?php include "../includes/header.php"; ?>
        

</body>
</html>l