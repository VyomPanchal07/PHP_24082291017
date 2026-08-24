<?php

include "db2.php";

try {

    $sql = "INSERT INTO students (name, email, city)
            VALUES (:name, :email, :city)";

    $stmt = $conn->prepare($sql);

    $name = "Vyom";
    $email = "vyom@gmail.com";
    $city = "Kadi";

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":city", $city);

    $stmt->execute();

    echo "Student inserted successfully.";

} catch (PDOException $e) {

    echo "Insert failed: " . $e->getMessage();

}

?>