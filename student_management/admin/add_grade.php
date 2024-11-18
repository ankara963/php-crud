<?php include '../db_connection.php'; ?>
<h2>Add Grade</h2>
<form method="POST">
    <input type="number" name="student_id" placeholder="Student ID" required>
    <input type="number" name="subject_id" placeholder="Subject ID" required>
    <input type="text" name="grade" placeholder="Grade" required>
    <button type="submit" name="add_grade">Add Grade</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_grade'])) {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $grade = $_POST['grade'];

    $sql = "UPDATE grades SET grade='$grade' WHERE student_id='$student_id' AND subject_id='$subject_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Grade added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>