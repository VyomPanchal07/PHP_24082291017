<?php
session_start();

$message = "";

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "12345") {

        session_regenerate_id(true);
        $_SESSION["username"] = $username;

        $message = "Login successful!";
    } 
    else {
        $message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login Page</h2>

<form method="post">

    Username:
    <input type="text" name="username">
    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    <input type="submit" name="login" value="Login">

</form>

<br>

<?php
echo $message;
?>

<?php
if (isset($_SESSION["username"])) {
    echo "<br><br>";
    echo "<a href='dashboard.php'>Go to Dashboard</a>";
}
?>

</body>
</html>