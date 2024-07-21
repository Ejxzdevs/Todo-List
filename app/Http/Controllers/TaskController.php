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
    public function editDetails(Request $request, Task $task) {
        $data = $request->validate([
            'task_name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'status' => 'required|in:Completed,Pending', // Added required rule
        ]);
        
        $task->update($data);
        return redirect()->route('tasks.details', $task->id)->with('success', 'Task updated successfully!');
    }
    public function deleteDetails($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('index');
    }
    public function doneT($id){
        $task = Task::findOrFail($id);
        if ($task) {
            $task->status = 'Done';
            $task->save();
        }
        return redirect()->route('index');
    }
}
