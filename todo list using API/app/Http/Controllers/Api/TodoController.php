<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // List all todos
    public function index()
    {
        return response()->json(Todo::all());
    }

    // Store new todo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = Todo::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? '',
        ]);

        return response()->json($todo, 201);
    }

    // Show single todo
    public function show($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        return response()->json($todo);
    }

    // Update todo
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $todo->update($validated);

        return response()->json($todo);
    }

    // Delete todo
    public function destroy($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->delete();

        return response()->json(['message' => 'Todo deleted']);
    }
}