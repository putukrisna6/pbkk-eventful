<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Building;

class AdminController extends Controller
{
    public function dashboard() {
        $tenants = User::where('role', 'tenant')->count();
        $owners = User::where('role', 'owner')->count();
        $buildings = Building::count();
        return view('admin.dashboard', compact('tenants', 'owners', 'buildings'));
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
        $task->status = 1;
        $task->save();

        $building = Building::find($task->building->id);
        $building->status = $request->approval_status;
        $building->save();

        session()->flash('success', 'Approval for ' . $building->name . ' successful');
        return redirect()->route('approval.queue');
    }
}
