<?php
session_start();

if (!isset($_SESSION["username"])) {

    echo "Unauthorized access!";
    exit();
}
?>

<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome to Dashboard</h2>

<p>
    Login successful!
</p>

<p>
    Welcome, <?php echo $_SESSION["username"]; ?>
</p>

<a href="logout.php">Logout</a>

</body>
</html>