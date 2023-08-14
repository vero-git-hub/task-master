<!DOCTYPE html>
<html>
<head>
    <title>Task list</title>
</head>
<body>
<h1>Task list</h1>
<ul>
    <?php foreach ($tasks as $task): ?>
        <strong><?php echo $task['title']; ?></strong><br>
        Description: <?php echo $task['description']; ?><br>
        Status: <?php echo $task['status']; ?><br>
        Date of creation: <?php echo $task['created_at']; ?><br>
    <?php endforeach; ?>
</ul>
<form method="post" action="/public/index.php">
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="description" placeholder="Description">
    <input type="text" name="status" placeholder="Status">
    <input type="text" name="created_at" placeholder="Date of creation">
    <button type="submit">Add task</button>
</form>
</body>
</html>
