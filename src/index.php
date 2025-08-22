<?php
// This is the main entry point for the application.
// It can display a welcome message or a list of records.

require_once 'config.php';
require_once 'db.php';

// Fetch records from the database if needed
// $records = fetchRecords(); // Uncomment and implement this function in db.php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD App</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file if needed -->
</head>
<body>
    <header>
        <h1>Welcome to the PHP CRUD Application</h1>
    </header>
    <main>
        <p>This application allows you to create, read, update, and delete records.</p>
        <!-- Display records if available -->
        <!-- Example: 
        if (!empty($records)) {
            foreach ($records as $record) {
                echo "<div>{$record['name']}</div>"; // Adjust according to your record structure
            }
        }
        -->
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> PHP CRUD App</p>
    </footer>
</body>
</html>