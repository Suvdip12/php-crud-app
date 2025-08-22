<?php
// home.php

include 'src/config.php'; // Include configuration settings
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - PHP CRUD App</title>
    <link rel="stylesheet" href="public/styles.css"> <!-- Link to a CSS file for styling -->
</head>
<body>
    <header>
        <h1>Welcome to the PHP CRUD Application</h1>
        <nav>
            <ul>
                <li><a href="src/index.php">Home</a></li>
                <li><a href="src/create.php">Create Record</a></li>
                <li><a href="src/read.php">View Records</a></li>
                <li><a href="src/update.php">Update Record</a></li>
                <li><a href="src/delete.php">Delete Record</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Overview</h2>
            <p>This application allows you to create, read, update, and delete records in a database.</p>
            <p>Use the navigation links above to get started.</p>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> PHP CRUD Application</p>
    </footer>
</body>
</html>