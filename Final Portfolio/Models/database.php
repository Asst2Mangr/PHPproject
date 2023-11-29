<?php
    try {
        $userName = $_SESSION['userName'];
        $password = $_SESSION['password'];
        $dsn = 'mysql:host=localhost;dbname=characters';

        $db = new PDO($dsn, $userName, $password);
    } catch (PDOException $e) {
        $db= $e;
    }
?>