<?php include '../db_connection.php'; ?>
<h2>View Subjects</h2>

<?php
$student_id = 1; // Replace with logged-in student ID
$sql = "SELECT subjects.subject_name FROM grades
        JOIN subjects ON grades.subject_id = subjects.id
        WHERE grades.student_id = $student_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Subject: " . $row['subject_name'] . "<br>";
    }
} else {
    echo "No subjects assigned.";
}
?>