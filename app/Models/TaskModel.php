<?php
namespace App\Models;

class TaskModel {

    private static array $tasks = [
        [
            'id' => 1,
            'title' => 'Task 1',
            'description' => 'Description of task 1',
            'status' => 'in progress',
            'created_at' => '2023-08-09',
        ],
        [
            'id' => 2,
            'title' => 'Task 2',
            'description' => 'Description of task 2',
            'status' => 'completed',
            'created_at' => '2023-08-10',
        ]
    ];

    public static function getAllTasks(): array
    {
        return self::$tasks;
    }

    public static function addTask($task): void
    {
        $task['id'] = count(self::$tasks) + 1;
        $task['created_at'] = date('Y-m-d');
        self::$tasks[] = $task;
    }

    public static function getTaskById($id) {
        foreach (self::$tasks as $task) {
            if ($task['id'] == $id) {
                return $task;
            }
        }
        return null;
    }

}