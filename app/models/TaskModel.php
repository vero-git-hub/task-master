<?php
namespace app\models;

use app\db\Database;
use PDO;

class TaskModel {

    public static function getAllTasks($status = null): array
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM task";

        if ($status) {
            $sql .= " WHERE status = :status";
        }

        $query = $db->prepare($sql);

        if ($status) {
            $query->bindParam(':status', $status);
        }

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
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

    public static function updateTask(int $taskId, array $taskData): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('UPDATE task SET title = :title, description = :description, status = :status WHERE id = :id');

        $stmt->bindParam(':title', $taskData['title']);
        $stmt->bindParam(':description', $taskData['description']);
        $stmt->bindParam(':status', $taskData['status']);
        $stmt->bindParam(':id', $taskId);

        $stmt->execute();
    }

    public static function deleteTask(int $taskId): void
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('DELETE FROM task WHERE id = :id');
        $stmt->bindParam(':id', $taskId);
        $stmt->execute();
    }
}