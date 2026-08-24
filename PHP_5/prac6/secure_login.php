<?php

include "db5.php";

if (isset($_POST["login"])) {

    $user = $_POST["username"];
    $pass = $_POST["password"];

    try {

        $sql = "SELECT * FROM users
                WHERE username = :username
                AND password = :password";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":username", $user);
        $stmt->bindParam(":password", $pass);

        $stmt->execute();

        if ($stmt->fetch()) {

            echo "<h3>Login Successful</h3>";

        } else {

            echo "<h3>Invalid Username or Password</h3>";

        }

    } catch (PDOException $e) {

        echo "Login failed.";

    }
}

?>

<html>

<head>
    <title>Secure Login</title>
</head>

<body>

<h2>Secure Login System</h2>

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