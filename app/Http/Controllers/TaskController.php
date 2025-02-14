<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Mail\TaskDueReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TaskController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetchAllTasks(){
        $tasks = Tasks::all();
        return view('tasks.index', compact('tasks'));
    }

    public function createTask(){
        return view('tasks.create');
    }

    public function index(Request $request)
    {
        $query = Tasks::where('user_id', Auth::id())->whereNull('deleted_at');

        // 搜索功能
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // 分类筛选
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // 优先级筛选
        if ($request->has('priority')) {
            $query->where('priority', $request->priority);
        }

        // 获取快到期的任务（7天内）
        $upcomingTasks = $query->clone()
            ->where('due_date', '>=', now())
            ->where('due_date', '<=', now()->addDays(7))
            ->where('isCompleted', false)
            ->get();

        $tasks = $query->orderBy('priority', 'desc')
                       ->orderBy('due_date', 'asc')
                       ->get();

        return view('tasks.index', compact('tasks', 'upcomingTasks'));
    }

    public function addTask(Request $request)
    {
        // 验证请求数据
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:high,medium,low',
            'due_date' => 'required|date|after:today',
        ]);

        // 创建新任务
        Tasks::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
            'user_id' => Auth::id(),
            'isCompleted' => false,
        ]);

        // 重定向回任务列表
        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }
    
    public function edit($id)
    {
        $task = Tasks::findOrFail($id);
        // Add ownership check
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')
                ->with('error', 'Unauthorized access.');
        }
        return view('tasks.edit', compact('task'));
    }

    // Update the task in the database
    public function update(Request $request, Tasks $task)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required|in:high,medium,low',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }  

        public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        // Add ownership check
        if ($task->user_id !== Auth::id()) {
            return redirect()->route('tasks.index')
                ->with('error', 'Unauthorized access.');
        }
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function complete(Tasks $task)
{
    if ($task->user_id !== Auth::id()) {
        return redirect()->route('tasks.index')
            ->with('error', 'Unauthorized access.');
    }

    $task->update([
        'isCompleted' => !$task->isCompleted
    ]);

    return redirect()->back()->with('success', 
        $task->isCompleted ? 'Task marked as complete!' : 'Task marked as incomplete!'
        );
    }
}