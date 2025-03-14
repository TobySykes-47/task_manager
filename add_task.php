<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "post") {
    $title = $_POST['title'];
    $description = $POST['description'];

    $stmt = $pdo->prepare("INSERT INTO tasks (title, description
    )VALUES (:title, :description)");
    $stmt->excecute(['title' => $title, 'description' => $description]);

    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Task</title>
</head>
<body>
      <h2>Add Task</h2>
      <form method="POST">
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description" placeholder="Task Description"></textarea>
        <button type="submit">Add Task</button> 
      </form>  
</body>
</html>