<?php
require_once __DIR__ . '/../autoload.php';

use App\Controllers\TaskController;

$controller = new TaskController();

$action = $_GET['action'] ?? '';
$taskId = $_GET['taskId'] ?? null;

switch ($action) {
    case 'edit':
        if ($taskId) {
            $controller->editTask($taskId);
        }
        break;
    case 'add':
        $controller->createTask();
        break;
    case 'delete':
        if ($taskId) {
            $controller->deleteTask($taskId);
        }
        break;
    default:
        $controller->index();
}