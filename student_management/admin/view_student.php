<?php
require_once '../db_connection.php'; // Connect sa database

// Kunin lahat ng students sa database
$query = "SELECT * FROM students";
$result = $conn->query($query);

if (!$result) {
    die("Error fetching students: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
</head>

<body>
    <h1>Students List</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?> </td>
                        <td>
                            <a href="edit_students.php?id=<?php echo $row['id']; ?>">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No Students</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>