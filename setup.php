<?php
include 'database.php';

$sql = "CREATE TABLE IF NOT EXISTS tasks (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT,
status ENUM('pending', 'completed') DEFAULT 'pending',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($sql);
echo "Table 'tasks' created successfully!";
?>