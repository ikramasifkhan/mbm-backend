<?php

namespace App\Repositories\Repos;

use App\Models\Task;
use App\Repositories\Interfaces\TaskInterface;

class TaskRepo implements TaskInterface
{
    protected $query;

    public function getTaskList($condition){
        $this->query =  Task::query();

        if(array_key_exists('relationships', $condition)){
            $this->query = $this->query->with($condition['relationships']);
        }
        if(array_key_exists('selectedColumns', $condition)){
            $this->query = $this->query->select($condition['selectedColumns']);
        }
        if(array_key_exists('queryConditions', $condition)){
            $this->query = $this->query->where($condition['queryConditions']);
        }
        if(array_key_exists('isLatest', $condition) && $condition['isLatest'] === true){
            $this->query = $this->query->latest();
        }
        
        return $this->query->get();
    }
    public function createTask($requestData){
        return Task::create($requestData);
    }

    public function getInstanceById($id){
        return Task::findOrFail($id);
    }
    public function updateTask($requestData, $taskData){
        return $taskData->update($requestData);
    }
}
