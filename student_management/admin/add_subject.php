<?php include '../db_connection.php'; ?>
<h2>Add Subject</h2>
<form method="POST">
    <input type="text" name="subject_name" placeholder="Subject Name" required>
    <button type="submit" name="add_subject">Add Subject</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_subject'])) {
    $subject_name = $_POST['subject_name'];

    $sql = "INSERT INTO subjects (subject_name) VALUES ('$subject_name')";
    if ($conn->query($sql) === TRUE) {
        echo "New subject added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>