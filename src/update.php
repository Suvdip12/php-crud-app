<?php
require_once 'config.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $imagePath = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $targetDir = 'uploads/';
        $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    $db = getDatabaseConnection();
    $stmt = $db->prepare("UPDATE records SET name = ?, description = ?, image = ? WHERE id = ?");
    $stmt->execute([$name, $description, $imagePath, $id]);

    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$db = getDatabaseConnection();
$stmt = $db->prepare("SELECT * FROM records WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>
<body>
    <h1>Update Record</h1>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $record['name']; ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $record['description']; ?></textarea>
        <br>
        <label for="image">Image:</label>
        <input type="file" name="image">
        <br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>