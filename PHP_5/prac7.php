<?php

$name = "";
$email = "";
$age = "";

$nameError = "";
$emailError = "";
$ageError = "";
$success = "";

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    // Name validation
    if ($name == "") {
        $nameError = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $nameError = "Name should contain only letters.";
    }

    // Email validation
    if ($email == "") {
        $emailError = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email.";
    }

    // Age validation
    if ($age == "") {
        $ageError = "Age is required.";
    } elseif (!filter_var($age, FILTER_VALIDATE_INT)) {
        $ageError = "Age must be a number.";
    } elseif ($age < 18 || $age > 60) {
        $ageError = "Age must be between 18 and 60.";
    }

    // Process if all valid
    if ($nameError == "" && $emailError == "" && $ageError == "") {
        $success = "Student information submitted successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Validation</title>
</head>
<body>

<h2>Student Information Form</h2>

<form method="post">

    Name:
    <input type="text" name="name">
    <span style="color:red;"><?php echo $nameError; ?></span>

    <br><br>

    Email:
    <input type="text" name="email">
    <span style="color:red;"><?php echo $emailError; ?></span>

    <br><br>

    Age:
    <input type="text" name="age">
    <span style="color:red;"><?php echo $ageError; ?></span>

    <br><br>

    <input type="submit" name="submit" value="Submit">

</form>

<?php
if ($success != "") {
    echo "<h3 style='color:green;'>$success</h3>";

    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Age: " . htmlspecialchars($age);
}
?>

</body>
</html>