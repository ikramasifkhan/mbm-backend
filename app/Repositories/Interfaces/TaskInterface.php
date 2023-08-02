<?php

namespace App\Repositories\Interfaces;

interface TaskInterface
{
    public function getTaskList($conditions);
    public function createTask($requestData);
    public function getInstanceById($id);
    public function updateTask($requestData, $taskData);
}
