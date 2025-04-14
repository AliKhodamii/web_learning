<?php
require 'db.php';

// گرفتن تسک‌ها از دیتابیس
$stmt = $pdo->query("SELECT * FROM todos ORDER BY created_at DESC");
$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>📝 To-Do List</h1>

    <!-- فرم افزودن تسک جدید -->
    <form action="add.php" method="POST">
        <input type="text" name="title" placeholder="کار جدید..." required>
        <button type="submit">➕ Add</button>
    </form>

    <!-- لیست تسک‌ها -->
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <form action="update.php" method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                    <input type="checkbox" name="is_done" onchange="this.form.submit()" <?= $todo['is_done'] ? 'checked' : '' ?>>
                </form>

                <span style="<?= $todo['is_done'] ? 'text-decoration: line-through;' : '' ?>">
                    <?= htmlspecialchars($todo['title']) ?>
                </span>

                <a href="delete.php?id=<?= $todo['id'] ?>" onclick="return confirm('Delete?')">🗑️</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>