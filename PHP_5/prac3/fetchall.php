<?php

include "db3.php";

try {

    $city = "Kadi";

    $sql = "SELECT * FROM Students WHERE city = :city";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(":city", $city, PDO::PARAM_STR);

    $stmt->execute();

    $students = $stmt->fetchAll();

    echo "<h2>Student Records Using fetchAll()</h2>";

    if ($students) {

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

    } else {

        echo "No student records found.";

    }

} catch (PDOException $e) {

    echo "Query failed: " . htmlspecialchars($e->getMessage());

}

?>