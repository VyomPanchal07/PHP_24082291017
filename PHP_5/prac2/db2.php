<?php

$host = "localhost";
$dbname = "student_db2";
$username = "root";
$password = "";

try {

    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    // PDO settings
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    echo "<h2>Database Connection Successful!</h2>";
    echo "<p>Connected to: <b>$dbname</b></p>";

} catch (PDOException $e) {

    echo "<h2>Database Connection Failed!</h2>";
    echo "<p>Error: " . $e->getMessage() . "</p>";

}

?>