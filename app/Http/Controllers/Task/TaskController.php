<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // $user = $request->user(); // Ini akan mendapatkan pengguna yang terautentikasi
        // $tasks = Task::where('user_id', $user->id)->get();
        // // return response()->json($tasks);
        // return TaskResource::collection($tasks);
    }



    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'nullable|string|max:255',
        // ]);

        // $task = Task::create([
        //     'user_id' => Auth::id(),
        //     'title' => $request->input('title'),
        //     'description' => $request->input('description'),
        // ]);

        // return response()->json([
        //     'message' => 'Task created successfully',
        //     'task'=>$task], 201);
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string|max:255',
    //     ]);

    //     $task = Task::findOrFail($id);
    //     $task->update($request->all());

    //     // Kirim event broadcast
    // event(new TaskUpdated($task));

    //     return response()->json([
    //         'message' => 'Task updated successfully',
    //         'task' => $task
    //     ]);
    // }

    // public function destroy($id)
    // {
    //     $task = Task::findOrFail($id);
    //     $task->delete();

    //     return response()->json(['success' => true]);
    // }
}
