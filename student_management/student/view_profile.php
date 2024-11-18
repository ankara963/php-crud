<?php include '../db_connection.php'; ?>
<h2>View Profile</h2>

<?php
$student_id = 1; // Replace with logged-in student ID
$sql = "SELECT * FROM students WHERE id='$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
    echo "Name: " . $student['name'] . "<br>";
    echo "Email: " . $student['email'] . "<br>";
} else {
    echo "Profile not found.";
}
?>