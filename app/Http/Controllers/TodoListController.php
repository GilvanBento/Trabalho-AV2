<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    
    public function index()
    {
        //
        try {
            $toDoLists = TodoList::all();
            return response()->json($toDoLists, 200);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 500);
        }

    }
    
    public function store(Request $request)
    {
        //
        try {
            TodoList::create($request->all());
            return response()->json('To Do List created successfuly', 201);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 500);
        }
    }
    
    public function update(Request $request, int $id)
    {
        //
        try {
            $toDoList = TodoList::find($id);
            $toDoList->update($request->all());
            return response()->json('To Do List updated successfuly', 201);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        //
        try {
            $toDoList = TodoList::find($id);
            $toDoList->delete();
            return response()->json('To Do List deleted successfuly', 201);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 500);
        }
    }
}
