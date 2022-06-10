<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function users($role) {
        if (!array_key_exists($role, User::$ROLE_MAPPING)) {
            abort(404);
        }

        $data['role'] = User::$ROLE_MAPPING[$role];
        $data['users'] = User::where('role', $role)->get();

        return view('admin.management.users.all', $data);
    }

    public function approvalQueue() {
        $status = Task::$STATUS;
        $tasks = Task::where('status', 0)->with('user', 'building')->get();
        return view('admin.management.approval.index', compact('tasks', 'status'));
    }

    public function approvalShow($task) {
        $status = Task::$STATUS;
        $task = Task::where('id', $task)->with('user', 'building')->first();
        dd($task);
        return view('admin.management.approval.show', compact('task', 'status'));
    }

    public function approveTask(Request $request, $task) {
        $task = Task::find($task);
        $task->status = $request->status;
        $task->save();

        return redirect()->route('approval.queue');
    }
}
