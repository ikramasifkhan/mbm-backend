<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
use App\Repositories\Interfaces\TaskInterface;
use App\Repositories\Interfaces\UserInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct(public UserInterface $user, public TaskInterface $task)
    {

    }
    public function authUserTask(){
        try{
            $tasks =  $this->task->getTaskList([
                'selectedColumns'=> ['id', 'title', 'description', 'created_by', 'status'],
                'queryConditions'=> ['created_for'=>request()->user()->id],
				'relationships'=>['created_by'],
                'isLatest'=>true,
            ]);
            return response()->successResponse('Tasks List', TaskResource::collection($tasks));
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response()->errorResponse();
        }
    }
}
