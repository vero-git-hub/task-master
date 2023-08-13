<?php
namespace App\Controllers;

use App\Models\TaskModel;

class TaskController {
    public function index() {
        $tasks = TaskModel::getAllTasks();
        include(__DIR__ . '/../Views/task_list.php');
    }

}
