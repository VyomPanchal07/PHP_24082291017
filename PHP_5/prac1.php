<?php

$host = "localhost";
$dbname = "student_db";
$username = "root";
$password = "";

try {
    
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    echo "Database connection established successfully.";

} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}

?>