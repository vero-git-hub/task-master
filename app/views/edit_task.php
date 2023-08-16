<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
<h1>Edit Task</h1>

<form action="/public/index.php?action=edit&taskId=<?= $task['id'] ?>" method="POST">
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($task['title']) ?>" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?= htmlspecialchars($task['description']) ?>">
    </div>
    <div>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="in progress" <?= $task['status'] === 'in progress' ? 'selected' : '' ?>>in progress</option>
            <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>completed</option>
        </select>
    </div>
    <div>
        <button type="submit">Save Changes</button>
    </div>
</form>

<hr>

<a href="/public/index.php">Back to Task List</a>
</body>
</html>
