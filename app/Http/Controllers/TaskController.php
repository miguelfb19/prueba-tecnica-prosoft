<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks['tasks'] = Task::all();
        return view('tasks.index', $tasks);
    }

    public function inProgress()
    {
        $tasksInProgress = Task::where('status', 'in-progress')->get();
        logger($tasksInProgress); // Verás esto en `storage/logs/laravel.log`
        return view('in-progress.index', compact('tasksInProgress'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = request()->all();
        $alreadyExist = Task::where('name', $request->name)->exists();

        if ($alreadyExist) {
            return redirect()->back()->with('error', 'A task with this name already exists.');
        }

        Task::create($task);
        return redirect('/');
    }


    public function edit(string $id, string $status) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Verificar si existe otra tarea con el mismo nombre
        if (Task::where('name', $request->name)->where('id', '!=', $id)->exists()) {
            return redirect()->back()->with('error', 'A task with this name already exists.');
        }

        // Actualizar los datos de la tarea
        Task::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->delete();
            session()->flash('success', 'Task deleted successfully!');
        } else {
            session()->flash('error', 'Task not found.');
        }

        return redirect('/');
    }
}
