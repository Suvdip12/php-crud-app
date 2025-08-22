<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = getDatabaseConnection();
    $stmt = $db->prepare("DELETE FROM records WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php?message=Record deleted successfully");
        exit();
    } else {
        echo "Error deleting record.";
    }
} else {
    echo "No ID provided.";
}
?>