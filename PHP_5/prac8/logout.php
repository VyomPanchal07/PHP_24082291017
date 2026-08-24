<?php
session_start();

session_unset();

session_destroy();

echo "<h3>Logout successful!</h3>";
echo "<a href='login.php'>Login Again</a>";
?>