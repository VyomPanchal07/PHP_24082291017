<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["csrf_token"]) &&
        hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])
    ) {
        echo "Valid CSRF token!";
    } else {
        echo "Invalid CSRF token. Request rejected!";
    }
}
?>

<form method="post">

    <input type="text" name="name">

    <!-- Wrong token -->
    <input type="hidden" name="csrf_token" value="wrong_token">

    <input type="submit" value="Test Invalid Token">

</form>