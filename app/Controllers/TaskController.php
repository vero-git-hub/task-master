<?php
namespace App\Controllers;

use App\Models\TaskModel;

class TaskController {
    public function index(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newTask = [
                'id' => null,
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'status' => $_POST['status'],
                'created_at' => $_POST['created_at'],
            ];
            TaskModel::addTask($newTask);
        }

        $tasks = TaskModel::getAllTasks();
        include(__DIR__ . '/../Views/task_list.php');
    }

}
