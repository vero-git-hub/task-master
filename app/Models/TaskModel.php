<?php
namespace App\Models;

class TaskModel {
    public static function getAllTasks() {
        return [
            [
                'title' => 'Task 1',
                'description' => 'Description of task 1',
            ],
            [
                'title' => 'Task 2',
                'description' => 'Description of task 2',
            ]
        ];
    }
}
