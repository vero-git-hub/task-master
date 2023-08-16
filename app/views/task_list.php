<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Master</title>
</head>
<body>
    <h1>Task list</h1>

    <form action="/public/index.php" method="POST">
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description">
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="in progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>

    <hr>

    <h2>Tasks</h2>
    <ul>
        <?php if (empty($tasks)): ?>
            <li>The task list is empty.</li>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <strong>ID: <?= $task['id']; ?></strong><br>
                    <p>Title: <?= htmlspecialchars($task['title']) ?></p>
                    <p>Description: <?= htmlspecialchars($task['description']) ?></p>
                    <p>Status: <?= htmlspecialchars($task['status']) ?></p>
                    <p>Date of creation: <?= htmlspecialchars($task['created_at']) ?></p>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</body>
</html>