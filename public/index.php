<?php
require_once __DIR__ . '/../autoload.php';

use App\Controllers\TaskController;

$controller = new TaskController();
$controller->index();
