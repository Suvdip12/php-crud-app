<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($image['name']);

    if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare("INSERT INTO records (title, description, image) VALUES (:title, :description, :image)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $uploadFile);

        if ($stmt->execute()) {
            echo "Record created successfully.";
        } else {
            echo "Error creating record.";
        }
    } else {
        echo "Error uploading image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Record</title>
</head>
<body>
    <h1>Create Record</h1>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <br>
        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*" required>
        <br>
        <input type="submit" value="Create">
    </form>
</body>
</html>