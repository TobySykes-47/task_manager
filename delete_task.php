<?php
include 'database.php';

if(!isset($_GET['id'])) {
    die("invalid request.");
}

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: index.php");
exit;
?>