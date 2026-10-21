
<?php
$conn = new mysqli("localhost", "root", "", "student_db10");

if ($conn->connect_error) {
    die("Database connection failed!");
}

if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = (int) $_POST["age"];

    $stmt = $conn->prepare(
        "INSERT INTO students10 (name, email, age) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("ssi", $name, $email, $age);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

if (isset($_GET["delete"])) {
    $id = (int) $_GET["delete"];

    $stmt = $conn->prepare("DELETE FROM students10 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$students = $conn->query("SELECT * FROM students10 ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
</head>
<body>
    <h2>Student Management System</h2>

    <form method="POST">
        <input type="text" name="name"
            placeholder="Student Name" required>

        <input type="email" name="email"
            placeholder="Email" required>

        <input type="number" name="age"
            placeholder="Age" min="1" max="120" required>

        <button type="submit" name="add">Add Student</button>
    </form>

    <h3>Student Records</h3>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $students->fetch_assoc()) { ?>
        <tr>
            <td><?= (int)$row["id"] ?></td>
            <td><?= htmlspecialchars($row["name"]) ?></td>
            <td><?= htmlspecialchars($row["email"]) ?></td>
            <td><?= (int)$row["age"] ?></td>
            <td>
                <a href="?delete=<?= (int)$row["id"] ?>"
                onclick="return confirm('Delete this student?')">
                Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
