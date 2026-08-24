<?php

$name = "";
$feedback = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $feedback = $_POST["feedback"];

    $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $safeFeedback = htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8');

    $message = "Feedback submitted successfully.";

}

    if ($message != "") {

        echo "<h3>$message</h3>";

        echo "Student Name: " . $safeName . "<br><br>";

        echo "Feedback: " . $safeFeedback;
    }

?>

<html>

<head>

    <title>Student Feedback System</title>

</head>

<body>

    <h2>Student Feedback System</h2>

    <form method="POST" action="">

        <label>Student Name:</label>
        <input type="text" name="name" required>

        <br><br>

        <label>Feedback:</label>
        <br>

        <textarea name="feedback" rows="5" cols="40" required></textarea>

        <br><br>

        <input type="submit" value="Submit Feedback">

    </form>

</body>

</html>