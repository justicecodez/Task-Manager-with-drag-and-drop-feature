<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\task\task;

class authController extends Controller
{
    function dashboard() {
        $id=auth()->id();
        $c=DB::select(
            "SELECT * FROM(
                (SELECT COUNT('id') as todo FROM tasks where status='todo') todo cross join
                (SELECT COUNT('id') as pending FROM tasks where status='pending') pending cross join
                (SELECT COUNT('id') as done FROM tasks where status='done') done cross join
                (SELECT COUNT('id') as work FROM tasks where category='work') work cross join
                (SELECT COUNT('id') as personal FROM tasks where category='personal') personal cross join
                (SELECT COUNT('id') as shopping FROM tasks where category='shopping') shopping cross join
                (SELECT COUNT('id') as due_today FROM tasks WHERE due_date = CURDATE()) due_today cross join
                (SELECT COUNT('id') as total FROM tasks) total
            )"
        );
        $tasks= task::where('user_id', $id)->paginate(15);
        $data=['count'=>$c[0]];
        return view('auth.dashboard.dashboard', ['data' => $data, 'tasks'=>$tasks]);
    }

    function task() {
        $id=auth()->id();
        $tasks= task::where('user_id', $id)->orderBy('order', 'asc')->paginate(15);
        return view('auth.task.task', ['tasks'=>$tasks]);
    }

    function dragDrop(Request $request) {
        foreach ($request->order as $order) {
           $task=task::find($order['id']);
           $task->order=$order['position'];
           $task->save();
        }
        
        return response()->json(['message' => 'Update Successfully.', 'status'=>true], 200);
    }

    function logout() {
        auth()->logout();
        return redirect()->route('login');
    }

    function deleteTask(Request $request) {
        $id = $request->id;
        $task = task::find($id);
        if (!$task) {
            return back()->with('error', 'Task not found.');
        }
        if ($task->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }
        $task->delete();
        return back()->with('success', 'Task deleted successfully.');
        
    }

    function completedTasks(Request $request) {
        $id = $request->id;
        $task = task::find($id);
        if (!$task) {
            return back()->with('error', 'Task not found.');
        }
        if ($task->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }
        $task->status = 'done';
        $task->save();
        return back()->with('success', 'Task marked as completed.');
        
    }

    function editTask(Request $request) {
        $id = $request->id;
        $task = task::find($id);
        if (!$task) {
            return back()->with('error', 'Task not found.');
        }
        if ($task->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }
        return view('auth.edit.edit', ['task' => $task]);
    }

    function updateTask(Request $request) {
        $request->validate([
            'task_id'=>'required|integer|exists:tasks,id',
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'due_date'=>'required|date',
            'category'=>'required|string|in:work,personal,shopping',
            'status'=>'required|string|in:todo,pending,done',
            'priority'=>'required|string|in:low,medium,high'
        ]);

        $task = task::find($request->task_id);
        if (!$task) {
            return back()->with('error', 'Task not found.');
        }
        if ($task->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->category = $request->category;
        $task->status = $request->status;
        $task->priority = $request->priority;
        $task->save();

        return back()->with('success', 'Task updated successfully.');
    }

    function createTask(Request $request) {
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'due_date'=>'required|date',
            'category'=>'required|string|in:work,personal,shopping',
            'status'=>'required|string|in:todo,pending,done',
            'priority'=>'required|string|in:low,medium,high'
        ]);

        $task = new task();
        $task->user_id = auth()->id();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->category = $request->category ?? 'personal';
        $task->status = $request->status ?? 'todo';
        $task->priority = $request->priority ?? 'low';
        $task->order= time();
        $task->save();

        return response()->json(['message' => 'Task created successfully', 'success' => true], 201);
    }

    
}
