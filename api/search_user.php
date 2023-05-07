<?php
session_start();
error_reporting(E_ALL);
include "../includes/config.php";

$userInfo = $_POST['userInfo'];

$sql = "SELECT * FROM users WHERE username LIKE '%$userInfo%' OR email LIKE '%$userInfo%' OR phone LIKE '%$userInfo%' OR address LIKE '%$userInfo%' OR name LIKE '%$userInfo%'";
// using pdo method
$query = $conn->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);

?>