<?php

include "db5.php";

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->fetch()) {
        echo "<h3>Login Successful</h3>";
    } else {
        echo "<h3>Invalid Username or Password</h3>";
    }
}

?>

<html>

<head>
    <title>Vulnerable Login</title>
</head>

<body>

<h2>Vulnerable Login System</h2>

<form method="POST">

    Username:
    <input type="text" name="username" required>

    <br><br>

    Password:
    <input type="password" name="password" required>

    <br><br>

    <input type="submit" name="login" value="Login">

</form>

</body>

</html>