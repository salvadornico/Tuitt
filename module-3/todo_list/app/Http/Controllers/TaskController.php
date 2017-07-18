<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task;

class TaskController extends Controller
{
    function showTasks() {
		// $all_tasks = Task::all();
		$pending_tasks = DB::table('tasks')->where('done', 0)->get();
		$completed_tasks = DB::table('tasks')->where('done', 1)->get();
		return view("todo_list", compact("pending_tasks", "completed_tasks"));
	}

	function addTask(Request $request) {
		$new_task = new Task();
		$new_task->name = $request->name;
		$new_task->description = $request->description;
		$new_task->done = 0;
		$new_task->save();

		return redirect("/");
	}

	function delete($id) {
		$task = Task::find($id);
		$task->delete();
		return back();
	}

	function markDone($id) {
		DB::table('tasks')->where('id', $id)->update(['done' => 1]);
		return back();
	}

	function markUndone($id) {
		DB::table('tasks')->where('id', $id)->update(['done' => 0]);
		return back();
	}
}
