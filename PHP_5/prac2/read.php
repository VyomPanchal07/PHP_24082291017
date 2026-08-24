<?php

include "db2.php";

try {

    $sql = "SELECT * FROM students";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $students = $stmt->fetchAll();

    echo "<h2>Student Records</h2>";

    echo "<table border='1' cellpadding='10'>";

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>City</th>";
    echo "</tr>";

    foreach ($students as $student) {

        echo "<tr>";

        echo "<td>" . htmlspecialchars($student["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($student["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($student["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($student["city"]) . "</td>";

        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {

    echo "Display failed: " . $e->getMessage();

}

?>