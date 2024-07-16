<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $todo =  Todo::get();
        return response()->json([
            'message' => 'Data fetched Successfully!',
            'status' => '1',
            'result'=> $todo,
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request, [
            'title' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
          return response()->json($validator->messages(), 200);
        }


        $todo = new Todo();
        $todo->title = $request->title;
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->status = 1;
        $todo->is_delete = 'N';
        $todo->save();

        return response()->json([
            'message' => 'Data Added Successfully!',
            'status' => '1',
        ]);
    }
    public function update( Request $request ,$id)
    {
        $validator = Validator::make($request, [
            'title' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
          return response()->json($validator->messages(), 200);
        }

        $todo = Todo::where('id',$id)->first();
        $todo->title = $request->title;
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->is_delete = 'N';
        $todo->status = 1;
        $todo->save();

        return response()->json([
            'message' => 'Data Updated Successfully!',
            'status' => '1',
            'result' => $todo,
        ]);
    }
    public function deleted($id)
    {
        $todo = Todo::where('id',$id)->first();
         if($todo->is_delete == 'N'){
            $todo->is_delete = 'Y';
         }

        $todo->save();
        return response()->json([
            'message' => 'Data Deleted Successfully!',
            'status' => '1',
            'result' => $todo,
        ]);
    }
}
