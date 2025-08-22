<?php
require_once 'config.php';
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM records WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($record) {
        echo "<h1>Record Details</h1>";
        echo "<p>ID: " . htmlspecialchars($record['id']) . "</p>";
        echo "<p>Name: " . htmlspecialchars($record['name']) . "</p>";
        echo "<p>Description: " . htmlspecialchars($record['description']) . "</p>";
        if ($record['image']) {
            echo "<img src='uploads/" . htmlspecialchars($record['image']) . "' alt='Image' />";
        }
        echo "<a href='update.php?id=" . htmlspecialchars($record['id']) . "'>Edit</a> | ";
        echo "<a href='delete.php?id=" . htmlspecialchars($record['id']) . "'>Delete</a> | ";
        echo "<a href='index.php'>Back to List</a>";
    } else {
        echo "<p>Record not found.</p>";
        echo "<a href='index.php'>Back to List</a>";
    }
} else {
    echo "<p>No ID provided.</p>";
    echo "<a href='index.php'>Back to List</a>";
}
?>