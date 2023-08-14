<?php
namespace App\Controllers;

use App\Models\TaskModel;

class TaskController {
    public function index(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newTask = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'status' => $_POST['status'],
            ];
            TaskModel::addTask($newTask);
        }

        $tasks = TaskModel::getAllTasks();
        include(__DIR__ . '/../Views/task_list.php');
    }

}