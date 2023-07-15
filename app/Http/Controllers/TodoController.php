<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = TodoItem::latest()->get();

        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        TodoItem::create($validatedData);

        return redirect()->route('todos.index')->with('success', 'Todo created successfully!');
    }

    public function update(Request $request, TodoItem $todo)
    {
        $todo->completed = $request->has('completed');
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
    }

    public function destroy(TodoItem $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
    }
}
