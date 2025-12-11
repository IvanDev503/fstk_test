<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::query()
            ->when($request->query('status'), function ($query, $status) {
                return $query->where('status', $status);
            })
            ->get();

        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:pendiente,completado'],
        ]);

        $task = Task::create($data);

        return response()->json($task, 201);
    }
}
