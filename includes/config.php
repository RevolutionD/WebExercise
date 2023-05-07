<?php
    const DB_HOST = 'localhost';
    const DB_NAME = 'library_web';
    const DB_PASS = '';
    const DB_USER = 'root';
//    const DB_OPTIONS = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAME 'utf8'");

    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        exit('Error: ' . $e->getMessage());
    }
