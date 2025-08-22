<?php
require_once 'config.php';
require_once 'db.php';

$db = getDatabaseConnection();

$query = "SELECT * FROM records";
$stmt = $db->prepare($query);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD App</title>
</head>
<body>
    <h1>PHP CRUD Application</h1>
    <a href="create.php">Create New Record</a>
    <h2>Records List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($records as $record): ?>
        <tr>
            <td><?php echo htmlspecialchars($record['id']); ?></td>
            <td><?php echo htmlspecialchars($record['name']); ?></td>
            <td><img src="uploads/<?php echo htmlspecialchars($record['image']); ?>" alt="Image" width="100"></td>
            <td>
                <a href="read.php?id=<?php echo htmlspecialchars($record['id']); ?>">View</a>
                <a href="update.php?id=<?php echo htmlspecialchars($record['id']); ?>">Edit</a>
                <a href="delete.php?id=<?php echo htmlspecialchars($record['id']); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>