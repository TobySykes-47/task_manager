<?php
include 'database.php';

if (!isset($_GET['id'])) {
    die("Invalid request.");
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
$stmt ->execute(['id' => $id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$task) {
    die("Task not found.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE tasks SET title = :title, description = :description, status = :status WHERE id = :id");
    $stmt->execute(['title' => $title, 'description' => $description, 'status' => $status, 'id' => $id]);

    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Task</title>
</head>
<body>
    <h2>Edit Task</h2>
    <form method="POST">
        <input type="text" name="title" value="<?=htmlspecialchars($task['title']) ?>" required>
        <textarea name="description"><?= htmlspecialchars ($task['description']) ?></textarea>
        <select name="status">
            <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : ""?>>Pending</option>
            <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : ""?>>Completed</option>
        </select>
        <button type="submit">Update Task</button>
    </form>
</body>
</html>