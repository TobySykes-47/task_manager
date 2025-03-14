<?php 

include 'database.php';
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task Manager</title>
</head>
<body>
    <h2>Task List</h2>
    <a href="add_task.php">+ Add Task</a>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?= htmlspecialchars($task['description']) ?>
                (<?= $task['status'] ?>)
                <a href="edit_task.php?id=<?= $task['id'] ?>">Edit</a>

                <a href="delete_task.php?id=<?= $task['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
        </ul>
</body>
</html>