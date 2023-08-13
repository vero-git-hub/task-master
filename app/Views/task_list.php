<!DOCTYPE html>
<html>
<head>
    <title>Task list</title>
</head>
<body>
<h1>Task list</h1>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <strong><?php echo $task['title']; ?></strong><br>
            Description: <?php echo $task['description']; ?><br>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
