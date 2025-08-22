<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create a database connection
    $conn = db_connect();

    // Prepare the SQL statement to delete the record
    $sql = "DELETE FROM your_table_name WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to index page after deletion
        header("Location: index.php?message=Record deleted successfully");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No ID provided for deletion.";
}
?>