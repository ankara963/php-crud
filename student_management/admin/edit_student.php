<?php
require_once '../db_connection.php'; // Connect sa database

// Kunin ang ID ng student mula sa URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Walang ID na pinasa.");
}

$student_id = $_GET['id'];

$query = "SELECT * FROM students WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Walang student na may ganyang ID.");
}

$student = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $update_query = "UPDATE students SET name = ?, email = ?, age = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssii", $name, $email, $age, $student_id);

    if ($update_stmt->execute()) {
        echo "Na-update na ang student details!";
        header("Location: view_students.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>

<body>
    <h1>Edit Student</h1>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required><br><br>

        <button type="submit">Update</button>
        <a href="view_students.php">Cancel</a>
    </form>
</body>

</html>