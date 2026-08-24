<?php

include "db4.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $course = $_POST["course"];
        $city = $_POST["city"];

        $sql = "INSERT INTO Stud_info
                (name, email, phone, course, city)
                VALUES
                (:name, :email, :phone, :course, :city)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":course", $course);
        $stmt->bindParam(":city", $city);

        $stmt->execute();

        $message = "Student registered successfully.";

    } catch (PDOException $e) {

        $message = "Registration failed: " . $e->getMessage();

    }
}

?>


<html>

<head>

    <title>Student Registration</title>

</head>

<body>

    <h2>Student Registration Form</h2>

    <?php

    if ($message != "") {
        echo "<p><b>$message</b></p>";
    }

    ?>

    <form method="POST" action="">

        <label>Student Name:</label>
        <input type="text" name="name" required>

        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required>

        <br><br>

        <label>Phone:</label>
        <input type="text" name="phone" required>

        <br><br>

        <label>Course:</label>
        <input type="text" name="course" required>

        <br><br>

        <label>City:</label>
        <input type="text" name="city" required>

        <br><br>

        <input type="submit" value="Register">

    </form>

</body>

</html>