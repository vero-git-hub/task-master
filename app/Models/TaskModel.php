<?php
namespace App\Models;

class TaskModel {

    private static array $tasks = [
        [
            'title' => 'Task 1',
            'description' => 'Description of task 1',
            'status' => 'in progress',
            'created_at' => '2023-08-09',
        ],
        [
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
        self::$tasks[] = $task;
    }

}
