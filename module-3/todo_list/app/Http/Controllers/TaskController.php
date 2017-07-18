<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task;
use Auth;

class TaskController extends Controller
{
    function showTasks() {
		$pending_tasks = DB::table('tasks')->where('done', 0)->get();
		$completed_tasks = DB::table('tasks')->where('done', 1)->get();
		return view("todo_list", compact("pending_tasks", "completed_tasks"));
	}

	function addTask(Request $request) {
		$name = $request->name;
		$description = $request->description;

		$rules = array(
			"name" => "required",
			"description" => "required"
		);
		$this->validate($request, $rules);

		$new_task = new Task();
		$new_task->name = $name;
		$new_task->description = $description;
		$new_task->done = 0;
		$new_task->save();
		return back();
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

	function edit($id) {
		$task = Task::find($id);
		return view("edit", compact("task"));
	}

	function saveEdit($id, Request $request) {
		$task = Task::find($id);
		$task->name = $request->name;
		$task->description = $request->description;
		$task->save();
		return redirect("/");
	}
}
