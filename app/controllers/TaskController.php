<?php
namespace app\controllers;

use App\Models\TaskModel;
use JetBrains\PhpStorm\NoReturn;

class TaskController {
    public function index(): void
    {
        $tasks = TaskModel::getAllTasks();
        include(__DIR__ . '/../views/task_list.php');
    }

    public function createTask(): void
    {
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $status = $_POST['status'] ?? 'in progress';

        if (empty($title) || empty($status)) {
            return;
        }

        TaskModel::addTask([
            'title' => $title,
            'description' => $description,
            'status' => $status,
        ]);

        header('Location: /public/index.php');
        exit;
    }

    public function editTask(int $taskId): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            TaskModel::updateTask($taskId, $_POST);
            header('Location: /public/index.php');
            exit;
        }
    }

    #[NoReturn] public function deleteTask(int $taskId): void
    {
        TaskModel::deleteTask($taskId);
        header('Location: /public/index.php');
        exit;
    }
}