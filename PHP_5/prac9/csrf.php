<?php
session_start();

if (!isset($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

$message = "";
$name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["csrf_token"]) &&
        hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])
    ) {
        $name = htmlspecialchars($_POST["name"]);
        $message = "Valid CSRF Token! Request processed.";
    } else {
        $message = "Invalid CSRF Token! Request rejected.";
    }
}
?>

<html>
<head>
    <title>CSRF Protection</title>
</head>
<body>

<h2>CSRF Protection</h2>

<p><?php echo $message; ?></p>

<?php
if ($name != "") {
    echo "<p>Student Name: $name</p>";
}
?>

<form method="post">

    Name:
    <input type="text" name="name" required>

    <br><br>

    <!-- CSRF Token -->
    <input type="hidden"
        name="csrf_token"
        value="<?php echo $_SESSION["csrf_token"]; ?>">

    <input type="submit" value="Submit">

</form>

</body>
</html>