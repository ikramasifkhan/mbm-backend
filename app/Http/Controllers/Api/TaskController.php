<?php

namespace App\Http\Controllers\Api;

use App\Events\AssignUserToTaskEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskAssignRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
use App\Jobs\TaskAssignToUserJob;
use App\Repositories\Interfaces\TaskInterface;
use App\Repositories\Interfaces\UserInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function __construct(public TaskInterface $task, public UserInterface $user)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $tasks =  $this->task->getTaskList([
                'relationships'=>['created_by', 'created_for'],
                'selectedColumns'=> ['id', 'title', 'description', 'created_by', 'created_for', 'status'],
                'queryConditions'=> [],
                'isLatest'=>true,
            ]);
            return response()->successResponse('Tasks List', TaskResource::collection($tasks));
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response()->errorResponse();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        try{
            $data = $request->validated();
            $data['created_by'] = request()->user()->id;
            $task =  $this->task->createTask($data);
            return response()->successResponse('Task info', new TaskResource($task));
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response()->errorResponse();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getUsersForAssignTask(){
        try{
            $users = $this->user->getUsersList([
                'selectedColumns'=> ['id', 'name'],
                'isLatest'=>true,
            ]);
            return response()->successResponse('Users List', UserResource::collection($users->except(request()->user()->id)));
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response()->errorResponse();
        }
    }

    public function assignUser(TaskAssignRequest $request){
        try{
            $task =  $this->task->getInstanceById($request->id);
            $data = $request->only('created_for');
            $data['status'] = 'in-progress';
            if($task->status === 'open'){
                $this->task->updateTask($data, $task);

                //send email to the user
                $user = $this->user->getAnInstance($request->created_for);
                //dispatch(new TaskAssignToUserJob($task, $user));
                event(new AssignUserToTaskEvent($task, $user));
            }


            return response()->successResponse('Used Assigned to task successfully', new TaskResource($task));
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response()->errorResponse();
        }
    }
}
