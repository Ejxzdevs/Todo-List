<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    // DISPLAY TASKS
    public function index(){
        $tasks = Task::all();
        return view('tasks.index',['tasks' => $tasks]);
    }

    // CREATE TASK
    public function store(Request $request){
        $data = $request->validate([
            'task_name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
        ]);
        Task::create($data);
        return redirect()->route('index');
    }

    // UPDATE TASK
    public function updateDetails(Request $request) {
        $data = $request->validate([
            'task_id' => 'required|int',
            'task_name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'status' => 'required|in:Completed,Pending',
        ]);
        
        Task::where('id', $data['task_id'])->update([
            'task_name' => $data['task_name'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
        return redirect()->route('index')->with('success', 'Task updated successfully!');
    }
    
    // DELETE TASK
    public function deleteDetails($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('index');
    }
   
}
