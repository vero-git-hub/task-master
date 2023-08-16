<?php
require_once __DIR__ . '/../autoload.php';

use App\Controllers\TaskController;

$controller = new TaskController();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->createTask();
} else {
    $controller->index();
}

