<?php

include "db2.php";

try {

    $sql = "DELETE FROM students
            WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $id = 1;

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        echo "Student deleted successfully.";

    } else {

        echo "Student record not found.";

    }

} catch (PDOException $e) {

    echo "Delete failed: " . $e->getMessage();

}

?>