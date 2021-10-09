<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Validator, DB;

class TodoControllers extends Controller
{
    //
    public function iItem(Request $request){
        $validation = Validator::make($request->all(),[
            'todo'          => 'required|string',
            'subtitle'      => 'required|string'
        ]);

        if($validation->fails()){
            return response()->json([
                'response'  => false,
                'message'   => $validation->messages()->first()
            ], 422);
        }

        // pumasa
        Todo::create([
            'startdate'     => DB::raw("NOW()"),
            'deadline'      => DB::raw("NOW()"),
            'todo'          => $request->todo,
            'subtitle'      => $request->subtitle
        ]);

        return response()->json([
            'response'  => true,
            'data'      => Todo::get(),
            'message'   => "Success"
        ], 200);
    }

    public function getTodos(){
        return response()->json([
            'response'  => true,
            'data'      => Todo::get()
        ], 200);
    }

    public function deleteTodo($id = null){
        Todo::where('id', $id)->delete();
        return response()->json([
            'response'  => true,
            'data'      => Todo::get()
        ], 200);
    }

    public function editTodo(Request $request){
        Todo::where('id', $request->id)
        ->update([
            'todo'  => $request->todo
        ]);

        return response()->json([
            'response'  => true,
            'data'      => Todo::get()
        ], 200);
    }
}
