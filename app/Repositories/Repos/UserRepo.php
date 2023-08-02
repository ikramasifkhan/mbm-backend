<?php

namespace App\Repositories\Repos;

use App\Models\User;
use App\Repositories\Interfaces\UserInterface;

class UserRepo implements UserInterface
{
    protected $query;
    public function getUsersList($condition){
        $this->query =  User::query();

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

    public function getAnInstance($id){
        return User::findOrFail($id);
    }
}
