<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Building;

class OwnerController extends Controller
{
    public function dashboard() {
        return view('owner.dashboard');
    }

    public function approval() {
        $buildingStatus = Building::$STATUS;
        $status = Task::$STATUS;
        $tasks = Task::where('user_id', Auth::id())->with('building')->get();
        return view('owner.approval.index', compact('tasks', 'status', 'buildingStatus'));
    }

    public function approvalApply() {
        $buildings = Building::where('user_id', Auth::id())->where('status', 0)->get();
        return view('owner.approval.apply', compact('buildings'));
    }

    public function approvalStore(Request $request) {
        try {
            $request->validate([
                'building_id' => ['required', 'exists:buildings,id']
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $message = '';
            foreach ($e->errors() as $key => $error) {
                $message = $message . $key . ': ' . $error[0];
            }

            session()->flash('error', $message);
            return redirect()->route('owner.approval.apply');
        }

        $task = new Task;
        $task->building_id = $request->building_id;
        $task->user_id = Auth::id();
        $task->save();

        $building = Building::where('id', $request->building_id)->first();
        $building->status = 1;
        $building->save();

        return redirect()->route('owner.approval');
    }
}
