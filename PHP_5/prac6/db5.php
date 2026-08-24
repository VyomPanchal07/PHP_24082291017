<?php

$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "";

try {

    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $username,
        $password
    );

    echo "Database connected successfully.";

} catch (PDOException $e) {

    echo "Database connection failed.";

}

?>