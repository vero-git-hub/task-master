<?php
namespace app\controllers;

use App\Models\TaskModel;

class TaskController {
    public function index(): void
    {
        $tasks = TaskModel::getAllTasks();
        include(__DIR__ . '/../views/task_list.php');
    }
}