<?php include '../db_connection.php'; ?>
<h2>Assign Subject to Student</h2>
<form method="POST">
    <input type="number" name="student_id" placeholder="Student ID" required>
    <input type="number" name="subject_id" placeholder="Subject ID" required>
    <button type="submit" name="assign_subject">Assign Subject</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['assign_subject'])) {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];

    $sql = "INSERT INTO grades (student_id, subject_id) VALUES ('$student_id', '$subject_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Subject assigned successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>