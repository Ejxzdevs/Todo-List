<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    //
    public function index(){
        $tasks = Task::all();
        return view('tasks.index',['tasks' => $tasks]);
    }
    public function create(){
        return view('tasks.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'task_name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
        ]);
        Task::create($data);
        return redirect()->route('index');
    }

    public function viewDetails(Task $task){
        return view('tasks.view',['task' => $task]);
    }
    public function editDetails(Request $request,Task $task) {
        $data = $request->validate([
            'task_name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'status' => 'string|max:50'
        ]);
        $task->update($data);
        return redirect()->route('tasks.details', $task->id);
        
    }
    public function deleteDetails(Task $task){
        $task->delete();
        return redirect()->route('index');
    }
}
