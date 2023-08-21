<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Master</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Tasks</h2>
            <button type="button" data-toggle="modal" data-target="#addTaskModal" class="add-task-btn">
                <i class="fas fa-plus-circle plus-icon"></i>
            </button>
        </div>

        <form action="/public/index.php" method="get" class="mb-4" id="filterForm">
            <div class="d-flex">
                <select name="status" class="form-control w-auto d-inline-block">
                    <?php $currentStatus = $_GET['status'] ?? ''; ?>
                    <option value="" <?= $currentStatus === '' ? 'selected' : ''; ?>>All tasks</option>
                    <option value="in progress" <?= $currentStatus === 'in progress' ? 'selected' : ''; ?>>In progress</option>
                    <option value="completed" <?= $currentStatus === 'completed' ? 'selected' : ''; ?>>Completed</option>
                </select>
                <input type="text" name="search" class="form-control ml-2" placeholder="Search..." value="<?= $_GET['search'] ?? '' ?>">
                <button type="submit" class="btn btn-primary ml-2">Search</button>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date
                        <span id="dateSort" style="cursor: pointer;">
                            &#8597;
                        </span>
                    </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= htmlspecialchars($task['id']) ?></td>
                        <td><?= htmlspecialchars($task['title']) ?></td>
                        <td><?= htmlspecialchars($task['description']) ?></td>
                        <td><?= htmlspecialchars($task['status']) ?></td>
                        <td><?= htmlspecialchars($task['created_at']) ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTaskModal<?= $task['id'] ?>">Edit</button>
                            <a href="/public/index.php?action=delete&taskId=<?= $task['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/public/index.php?action=add" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" rows="4" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="in progress">in progress</option>
                                    <option value="completed">completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach ($tasks as $task): ?>
            <div class="modal fade" id="editTaskModal<?= $task['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel<?= $task['id'] ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editTaskModalLabel<?= $task['id'] ?>">Edit Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/public/index.php?action=edit&taskId=<?= $task['id'] ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title" id="title" class="form-control" required value="<?= htmlspecialchars($task['title']) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" id="description" rows="4" class="form-control" required><?= htmlspecialchars($task['description']) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="in progress" <?= $task['status'] === 'in-progress' ? 'selected' : '' ?>>in progress</option>
                                        <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('dateSort').addEventListener('click', function() {
            let currentUrl = new URL(window.location.href);
            let currentSortOrder = currentUrl.searchParams.get('sortOrder');

            if (!currentSortOrder || currentSortOrder === 'asc') {
                currentUrl.searchParams.set('sortOrder', 'desc');
            } else {
                currentUrl.searchParams.set('sortOrder', 'asc');
            }

            window.location.href = currentUrl.toString();
        });
    </script>
</body>
</html>