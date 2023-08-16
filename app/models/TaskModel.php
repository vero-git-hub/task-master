<?php
namespace app\models;

use App\Database;
use PDO;

class TaskModel {

    public static function getAllTasks(): array
    {
        $stmt = Database::getConnection()->prepare("SELECT * FROM task");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}