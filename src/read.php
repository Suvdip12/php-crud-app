<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM records WHERE id = ?");
    $stmt->execute([$id]);
    $record = $stmt->fetch();

    if ($record) {
        echo "<h1>Record Details</h1>";
        echo "<p>ID: " . htmlspecialchars($record['id']) . "</p>";
        echo "<p>Name: " . htmlspecialchars($record['name']) . "</p>";
        echo "<p>Description: " . htmlspecialchars($record['description']) . "</p>";
    } else {
        echo "<p>No record found with ID: " . htmlspecialchars($id) . "</p>";
    }
} else {
    echo "<p>No ID provided. Please specify a record ID in the URL.</p>";
}
?>