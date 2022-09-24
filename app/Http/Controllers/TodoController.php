<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('ajax.todo');
    }

    public function addTodo(Request $request)
    {
        try {
            $data = $request->all();
            print_r($data);
            response()->json([
                "success" => true,
                "msg" => "Todo added successfully"
            ]);
        } catch (\Throwable $th) {
            response()->json([
                "success" => true,
                "msg" => $th->getMessage()
            ]);
        }
    }
}
