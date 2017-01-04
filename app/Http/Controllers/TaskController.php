<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Task;


class TaskController extends Controller
{
    public function show() {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('task', [
            'tasks' => $tasks // このデータがtask.blade.phpで使えるようになる
        ]);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task();
        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();

        return redirect('/');
    }

    public function delete(Task $task)
    {
        $task->delete();
        return redirect('/');
    }

    public function apiList() {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return $tasks->toJson();
    }

    public function apiCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if (!$validator->fails()) {
            $task = new Task();
            $task->title = $request->title;
            $task->body = $request->body;
            $task->save();
        }

        return $this->apiList();
    }
}
