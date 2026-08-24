<?php

include "db2.php";

try {

    $sql = "UPDATE students
            SET city = :city
            WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $id = 1;
    $city = "Ahmedabad";

    $stmt->bindParam(":city", $city);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        echo "Student updated successfully.";

    } else {

        echo "No student record was updated.";

    }

} catch (PDOException $e) {

    echo "Update failed: " . $e->getMessage();

}

?>