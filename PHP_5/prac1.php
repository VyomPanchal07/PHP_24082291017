Create a PHP program to establish a secure connection with a MySQL
database using PDO. Configure the connection by enabling exception-based
error handling, setting the default fetch mode, and disabling emulated
prepared statements. Display an appropriate message indicating whether the
connection was established successfully.

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