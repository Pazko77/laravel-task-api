<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return Task::all();
    }

    public function store(Request $request){
        $task = Task::create($request->validate(['title' => 'required|string|max:255']));
        return response()->json($task,201);
    }

    public function completed(Task $task){
        $task->update(['is_completed' => true]);
        return response()->json($task);
    }

    public function incompleted(Task $task){
        $task->update(['is_completed' => false]);
        return response()->json($task);
    }


}
