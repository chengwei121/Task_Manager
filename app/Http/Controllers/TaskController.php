<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskController extends Controller
{
    public function fetchAllTasks(){
        $tasks = Tasks::all();
        return view('tasks.index', compact('tasks'));
    }

    public function createTask(){
        return view('tasks.create');
    }

    public function index(){
        $tasks = Tasks::all();
        return view('tasks.index', compact('tasks'));
    }

    public function addTask(Request $request){
        $request->validate([
            'title' =>'required|max:255',
            'description' =>'required',
            'due_date' =>'required|date'
        ]);

        Tasks::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task added successfully');
    }
    
    public function doneTask($id)
    {
        $task = Tasks::find($id);
    
        // Check if the task is already completed
        if ($task->isCompleted) {
            return redirect()->route('tasks.index')->with('error', 'You have already completed this task.');
        }
    
        // Mark the task as completed
        $task->isCompleted = true; // or 1
        $task->save();
    
        return redirect()->route('tasks.index')->with('success', 'Task marked as done successfully');
    }
    

    // Display the task edit form
    public function edit($id)
    {
        // Fetch the task by its ID
        $task = Tasks::findOrFail($id);

        // Pass the task to the 'edit' view
        return view('tasks.edit', compact('task'));
    }

    // Update the task in the database
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);

        // Find the task and update it
        $task = Tasks::findOrFail($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->save();

        // Redirect back to the task list with success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }  

        public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

}