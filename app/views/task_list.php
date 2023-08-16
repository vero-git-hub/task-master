<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task Master</title>
</head>
<body>
<h1>Task list</h1>
<ul>
    <?php if (empty($tasks)): ?>
        <li>The task list is empty.</li>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong>ID: <?= $task['id']; ?></strong><br>
                Title: <?= $task['title']; ?><br>
                Description: <?= $task['description']; ?><br>
                Status: <?= $task['status']; ?><br>
                Date of creation: <?= $task['created_at']; ?><br>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
</body>
</html>