<?php

include "db3.php";

try {

    $id = 1;

    $sql = "SELECT * FROM Students WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    $student = $stmt->fetch();

    echo "<h2>Student Record Using fetch()</h2>";

    if ($student) {

        echo "ID: " . htmlspecialchars($student["id"]) . "<br>";
        echo "Name: " . htmlspecialchars($student["name"]) . "<br>";
        echo "Email: " . htmlspecialchars($student["email"]) . "<br>";
        echo "City: " . htmlspecialchars($student["city"]) . "<br>";

    } else {

        echo "Student record not found.";

    }

} catch (PDOException $e) {

    echo "Query failed: " . htmlspecialchars($e->getMessage());

}

?>