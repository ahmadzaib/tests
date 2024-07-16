<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Todo;


class TodoController extends Controller
{


    public function index(Request $request){
        $data=$request->all();

        $validator=Validator::make($data,[
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()],400);
        }
        else{
            $todo=Todo::create([
                'name' => $data['name'],
                'due'=> now(),
                'assigned_to'=>1
             ]
            );
            return response()->json(['success'=>"Todo created successfully",'data'=>$todo],201);
        }

    }

    public function delete(Request $request){
        $data=$request->all();

        $validator=Validator::make($data,[
            'id' => 'required|exists:todos,id',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()],400);
        }
        else{
           Todo::find($request->id)->delete();
            return response()->json(['success'=>"Todo deleted successfully"],201);
        }

    }
    public function update(Request $request){
        $data=$request->all();

        $validator=Validator::make($data,[
            'id' => 'required|exists:todos,id',
            'name'=>'required'
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()],400);
        }
        else{
            Todo::find($request->id)->update($data);
            return response()->json(['success'=>"Todo updated successfully"],201);
        }

    }

    public function get(){
            return response()->json(['success'=>"Todo fethed successfully",'todos'=>
            Todo::where('assigned_to',1)->get()],201);
    }

}
