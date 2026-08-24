<?php
session_start();

if (!isset($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["csrf_token"]) &&
        hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])
    ) {
        $message = "Valid CSRF token. Request processed successfully!";
    } else {
        $message = "Invalid CSRF token. Request rejected!";
    }
}
?>

<html>
<head>
    <title>CSRF Protection</title>
</head>
<body>

<h2>CSRF Protected Form</h2>

<?php
if ($message != "") {
    echo "<p>$message</p>";
}
?>

<form method="post">

    Name:
    <input type="text" name="name" required>
    <br><br>

    Email:
    <input type="email" name="email" required>
    <br><br>

    <input type="hidden"
        name="csrf_token"
        value="<?php echo $_SESSION['csrf_token']; ?>">

    <input type="submit" value="Submit">

</form>

</body>
</html>