<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $feedback = $_POST["feedback"];

    echo "<h2>Submitted Feedback</h2>";

    // Direct display - INSECURE
    echo "Student Name: " . $name . "<br><br>";
    echo "Feedback: " . $feedback;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Feedback</title>
</head>

<body>

<h2>Student Feedback System</h2>

<form method="POST">

    Student Name:
    <input type="text" name="name" required>

    <br><br>

    Feedback:
    <br>

    <textarea name="feedback" rows="5" cols="40" required></textarea>

    <br><br>

    <input type="submit" name="submit" value="Submit Feedback">

</form>

</body>

</html>