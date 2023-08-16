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

    public static function addTask(array $taskData): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('INSERT INTO task (title, description, status, created_at) VALUES (:title, :description, :status, CURDATE())');

        $stmt->bindParam(':title', $taskData['title']);
        $stmt->bindParam(':description', $taskData['description']);
        $stmt->bindParam(':status', $taskData['status']);

        $stmt->execute();
    }
}