<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('due_date','asc')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
         try {
             $validatedData = $request->validated();
             $task = new Task([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'due_date' => $validatedData['due_date'],
                'category_id' => $validatedData['category_id'],
            ]);
    
            $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tasks created successfully.');

    } catch (\Exception $e) {
        dd($e);
        return redirect()->route('tasks.create')
        ->withInput()
        ->withErrors(['error' => 'An error occurred while creating the task.']);
    }
}
 /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $categories = Category::get();
        return view('tasks.edit', compact('task','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
         try {
       
           $validatedData = $request->validate([
             'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'due_date' => 'required|date|after_or_equal:today',
                
              ]);
         $task->update($validatedData);
        
        return redirect()->route('tasks.index')->with('success', 'task created successfully.');
    } catch (\Exception $e) {
        return redirect()->route('tasks.edit')
        ->withInput()
        ->withErrors(['error' => 'An error occurred while editing the task.']);
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
